<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\SimpleJob;
use App\Jobs\MailJob;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(new SimpleJob(), 'simple')
    ->everyMinute();

Schedule::job(new MailJob(), 'mail')
    ->everyMinute();
