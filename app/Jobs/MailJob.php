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

    public function handle(): void
    {
        sleep(1);
        parent::handle();
    }

    protected function getName(): string
    {
        return 'mail';
    }
}
