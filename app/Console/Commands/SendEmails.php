<?php

namespace App\Console\Commands;

use App\Jobs\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send queue emails to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = Auth::user();
        Log::info('Emails queued successfully');
    }
}
