<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StressTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 600;

    public function __construct(
        private int $seconds = 300
    ) {
    }

    public function handle(): void
    {
        $start = time();
        $result = 0;

        while (time() - $start < $this->seconds) {
            for ($i = 1; $i < 100000; $i++) {
                $result += sqrt($i);
                $result = sin($result);
                $result = pow($result, 2);
            }

            if ($result > PHP_FLOAT_MAX) {
                $result = 0;
            }
        }

        logger()->info([
            'pid' => getmypid(),
            'result' => $result,
        ]);
    }
}
