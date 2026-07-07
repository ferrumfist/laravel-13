<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;

class MailJob extends BaseJob
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
        return 'mail';
    }
}
