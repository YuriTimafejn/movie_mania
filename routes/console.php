<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('log:clear', function () {
    exec('rm -f ' . storage_path('logs/*.log'));
    exec('rm -f ' . base_path('*.log'));
    $this->comment('Log files have been cleared');
})->describe('Clear log files');

