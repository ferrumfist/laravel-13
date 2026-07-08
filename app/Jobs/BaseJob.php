<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;

abstract class BaseJob implements ShouldQueue
{
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pid = getmypid();
        $time = date('Y-m-d H:i:s');

        $name = $this->getName();
        $line = "PID: {$pid} | JOB: {$name} | TIME: {$time}" . PHP_EOL;

        file_put_contents(
            storage_path('logs/job.log'),
            $line,
            FILE_APPEND
        );
    }

    abstract protected function getName(): string;
}
