<?php

namespace Nikazooz\Simplesheet\Tests\Concerns;

use PHPUnit\Framework\Assert;
use Illuminate\Database\Eloquent\Model;
use Nikazooz\Simplesheet\Tests\TestCase;
use Nikazooz\Simplesheet\Concerns\ToArray;
use Nikazooz\Simplesheet\Concerns\ToModel;
use Nikazooz\Simplesheet\Concerns\Importable;
use Nikazooz\Simplesheet\Concerns\WithStartRow;
use Nikazooz\Simplesheet\Tests\Data\Stubs\Database\User;

class WithStartRowTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testing']);
    }

    /**
     * @test
     */
    public function can_import_each_row_to_model_with_different_start_row()
    {
        $import = new class implements ToModel, WithStartRow {
            use Importable;

            /**
             * @param  array  $row
             * @return \Illuminate\Database\Eloquent\Model
             */
            public function model(array $row): Model
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
            public function startRow(): int
            {
                return 5;
            }
        };

        $import->import('import-users-with-different-heading-row.xlsx');

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
    public function can_import_to_array_with_start_row()
    {
        $import = new class implements ToArray, WithStartRow {
            use Importable;

            /**
             * @param  array  $array
             */
            public function array(array $array)
            {
                Assert::assertEquals([
                    [
                        'John Doe',
                        'john@example.com',
                    ],
                    [
                        'Jane Smith',
                        'jane@example.com',
                    ],
                ], $array);
            }

            /**
             * @return int
             */
            public function startRow(): int
            {
                return 5;
            }
        };

        $import->import('import-users-with-different-heading-row.xlsx');
    }
}
