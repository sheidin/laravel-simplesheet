<?php

namespace Nikazooz\Simplesheet\Tests\Data\Stubs;

use Illuminate\Bus\Queueable;
use Nikazooz\Simplesheet\Tests\TestCase;
use Illuminate\Contracts\Queue\ShouldQueue;

class AfterQueueExportJob implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    private $filePath;

    /**
     * @param  string  $filePath
     * @return void
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function handle()
    {
        TestCase::assertFileExists($this->filePath);
    }
}
