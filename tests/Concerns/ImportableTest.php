<?php

namespace Nikazooz\Simplesheet\Tests\Concerns;

use PHPUnit\Framework\Assert;
use Nikazooz\Simplesheet\Importer;
use Nikazooz\Simplesheet\Simplesheet;
use Nikazooz\Simplesheet\Tests\TestCase;
use Nikazooz\Simplesheet\Concerns\ToArray;
use Nikazooz\Simplesheet\Concerns\Importable;

class ImportableTest extends TestCase
{
    /**
     * @test
     */
    public function can_import_a_simple_xlsx_file()
    {
        $import = new class implements ToArray {
            use Importable;

            /**
             * @param array $array
             */
            public function array(array $array)
            {
                Assert::assertEquals([
                    ['test', 'test'],
                    ['test', 'test'],
                ], $array);
            }
        };

        $imported = $import->import('import.xlsx');

        $this->assertInstanceOf(Importer::class, $imported);
    }

    /**
     * @test
     */
    public function can_import_a_simple_xlsx_file_from_uploaded_file()
    {
        $import = new class implements ToArray {
            use Importable;

            /**
             * @param array $array
             */
            public function array(array $array)
            {
                Assert::assertEquals([
                    ['test', 'test'],
                    ['test', 'test'],
                ], $array);
            }
        };

        $import->import($this->givenUploadedFile(__DIR__.'/../Data/Disks/Local/import.xlsx'));
    }

    /**
     * @test
     * @expectedException \Nikazooz\Simplesheet\Exceptions\NoFilePathGivenException
     * @expectedExceptionMessage A filepath needs to be passed in order to perform the import.
     */
    public function throws_exception_when_no_file_path_is_passed()
    {
        $import = new class {
            use Importable;
        };

        $import->import();
    }

    /**
     * @test
     */
    public function can_import_a_simple_csv_file_with_html_tags_inside()
    {
        $import = new class implements ToArray {
            use Importable;

            /**
             * @param  array  $array
             * @return void
             */
            public function array(array $array)
            {
                Assert::assertEquals([
                    ['key1', 'A', 'row1'],
                    ['key2', 'B', '<p>row2</p>'],
                    ['key3', 'C', 'row3'],
                    ['key4', 'D', 'row4'],
                    ['key5', 'E', 'row5'],
                    ['key6', 'F', '<a href=/url-example">link</a>"'],
                ], $array);
            }
        };

        $import->import('csv-with-html-tags.csv', 'local', Simplesheet::CSV);
    }
}
