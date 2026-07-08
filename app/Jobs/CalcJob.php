<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;

class CalcJob extends BaseJob
{
    use Queueable;

    protected function getName(): string
    {
        return 'calc';
    }
}
