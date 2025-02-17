<?php

namespace Nikazooz\Simplesheet\Tests\Concerns;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Nikazooz\Simplesheet\Tests\TestCase;
use Nikazooz\Simplesheet\Concerns\ToModel;
use Nikazooz\Simplesheet\Concerns\Importable;
use Nikazooz\Simplesheet\Concerns\WithBatchInserts;
use Nikazooz\Simplesheet\Tests\Data\Stubs\Database\User;
use Nikazooz\Simplesheet\Tests\Data\Stubs\Database\Group;

class WithBatchInsertsTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->loadMigrationsFrom(dirname(__DIR__).'/Data/Stubs/Database/Migrations');
    }

    /**
     * @test
     */
    public function can_import_to_model_in_batches()
    {
        DB::connection()->enableQueryLog();

        $import = new class implements ToModel, WithBatchInserts {
            use Importable;

            /**
             * @param  array  $row
             * @return \Illuminate\Database\Eloquent\Model|null
             */
            public function model(array $row)
            {
                return new User([
                    'name' => $row[0],
                    'email' => $row[1],
                    'password' => 'secret',
                ]);
            }

            /**
             * @return int
             */
            public function batchSize(): int
            {
                return 2;
            }
        };

        $import->import('import-users.xlsx');

        $this->assertCount(1, DB::getQueryLog());
        DB::connection()->disableQueryLog();

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);
    }

    /**
     * @test
     */
    public function can_import_to_model_in_batches_bigger_file()
    {
        DB::connection()->enableQueryLog();

        $import = new class implements ToModel, WithBatchInserts {
            use Importable;

            /**
             * @param  array  $row
             * @return \Illuminate\Database\Eloquent\Model|null
             */
            public function model(array $row)
            {
                return new Group([
                    'name' => $row[0],
                ]);
            }

            /**
             * @return int
             */
            public function batchSize(): int
            {
                return 300;
            }
        };

        $import->import('import-batches.xlsx');
        $count = (int) ceil(5000 / $import->batchSize());

        $this->assertCount($count, DB::getQueryLog());
        DB::connection()->disableQueryLog();
    }

    /**
     * @test
     */
    public function can_import_multiple_different_types_of_models_in_single_to_model()
    {
        DB::connection()->enableQueryLog();

        $import = new class implements ToModel, WithBatchInserts {
            use Importable;

            /**
             * @param  array  $row
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
             */
            public function model(array $row)
            {
                $user = new User([
                    'name' => $row[0],
                    'email' => $row[1],
                    'password' => 'secret',
                ]);

                $group = new Group([
                    'name' => $row[0],
                ]);

                return [$user, $group];
            }

            /**
             * @return int
             */
            public function batchSize(): int
            {
                return 2;
            }
        };

        $import->import('import-users.xlsx');

        // Expected 2 batch queries, 1 for users, 1 for groups
        $this->assertCount(2, DB::getQueryLog());

        $this->assertEquals(2, User::count());
        $this->assertEquals(2, Group::count());

        DB::connection()->disableQueryLog();
    }

    /**
     * @test
     */
    public function has_timestamps_when_imported_in_batches()
    {
        $import = new class implements ToModel, WithBatchInserts {
            use Importable;

            /**
             * @param array $row
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
             */
            public function model(array $row)
            {
                return new User([
                    'name' => $row[0],
                    'email' => $row[1],
                    'password' => 'secret',
                ]);
            }

            /**
             * @return int
             */
            public function batchSize(): int
            {
                return 2;
            }
        };

        $import->import('import-users.xlsx');

        $user = User::first();

        $this->assertNotNull($user->created_at);
        $this->assertNotNull($user->updated_at);
    }
}
