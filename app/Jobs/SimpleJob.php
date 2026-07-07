<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;

class SimpleJob extends BaseJob
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    protected function getName(): string
    {
        return 'simple';
    }
}
