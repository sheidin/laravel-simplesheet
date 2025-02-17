<?php

namespace Nikazooz\Simplesheet\Tests;

use Illuminate\Http\Testing\File;
use Box\Spout\Reader\ReaderFactory;
use Illuminate\Contracts\Queue\Job;
use Box\Spout\Reader\ReaderInterface;
use Orchestra\Database\ConsoleServiceProvider;
use Nikazooz\Simplesheet\SimplesheetServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * @param  string  $filePath
     * @param  string  $writerType
     * @return \Box\Spout\Reader\ReaderInterface
     */
    public function read(string $filePath, string $writerType): ReaderInterface
    {
        $reader = ReaderFactory::create($writerType);

        $reader->open($filePath);

        return $reader;
    }

    /**
     * @param  string  $filePath
     * @param  string  $writerType
     * @param  int|null  $sheetIndex
     * @return array
     */
    protected function readAsArray(string $filePath, string $writerType, int $sheetIndex = null): array
    {
        $reader = $this->read($filePath, $writerType);

        $sheet = $this->getSheetByIndex($reader, $sheetIndex);

        return array_values(iterator_to_array($sheet->getRowIterator()));
    }

    /**
     * @param  \Box\Spout\Reader\ReaderInterface  $reader
     * @param  int|null  $sheetIndex
     * @return \Iterator
     */
    protected function getSheetByIndex(ReaderInterface $reader, int $sheetIndex = null)
    {
        foreach ($reader->getSheetIterator() as $sheet) {
            if (null === $sheetIndex || $sheet->getIndex() === $sheetIndex) {
                return $sheet;
            }
        }

        // Default to "NullSheet"
        return new class {
            public function getRowIterator()
            {
                return new \ArrayIterator([]);
            }
        };
    }

    /**
     * @param  string  $filePath
     * @param  string|null  $filename
     * @return \Illuminate\Http\Testing\File
     */
    public function givenUploadedFile(string $filePath, string $filename = null): File
    {
        $filename = $filename ?? basename($filePath);

        // Create temporary file.
        $newFilePath = tempnam(sys_get_temp_dir(), 'import-');

        // Copy the existing file to a temporary file.
        copy($filePath, $newFilePath);

        return new File($filename, fopen($newFilePath, 'r'));
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ConsoleServiceProvider::class,
            SimplesheetServiceProvider::class,
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('filesystems.disks.local.root', __DIR__.'/Data/Disks/Local');
        $app['config']->set('filesystems.disks.test', [
            'driver' => 'local',
            'root' => __DIR__.'/Data/Disks/Test',
        ]);

        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
    }

    /**
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  string  $property
     * @return mixed
     */
    protected function inspectJobProperty(Job $job, string $property)
    {
        $dict = (array) unserialize($job->payload()['data']['command']);

        $class = $job->resolveName();

        return $dict[$property] ?? $dict["\0*\0$property"] ?? $dict["\0$class\0$property"];
    }
}
