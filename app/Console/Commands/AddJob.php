<?php

namespace App\Console\Commands;

use App\Jobs\MailJob;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:add-job')]
#[Description('Command description')]
class AddJob extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < 10; $i++) {
            MailJob::dispatch()
                ->onQueue('mail');
        }
    }
}
