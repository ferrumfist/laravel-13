<?php

namespace App\Console\Commands;

use App\Jobs\StressTestJob;
use Illuminate\Console\Command;

class StressTestCommand extends Command
{
    protected $signature = 'stress:test
                            {--jobs=1 : Number of jobs}
                            {--seconds=30 : Job duration in seconds}';

    protected $description = 'Dispatch stress test jobs';

    public function handle(): int
    {
        $jobs = (int) $this->option('jobs');
        $seconds = (int) $this->option('seconds');

        $this->info("Dispatching {$jobs} stress jobs ({$seconds}s each)...");

        for ($i = 1; $i <= $jobs; $i++) {
            StressTestJob::dispatch($seconds)
                ->onQueue('stress');

            $this->line("Job {$i} dispatched");
        }

        $this->info('Stress test started');

        return self::SUCCESS;
    }
}
