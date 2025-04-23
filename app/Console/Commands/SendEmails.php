<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $user = User::all();
        Mail::to("mehedihasanshanto368@gmail.com")->send(new TestMail($user));
        info('Email sent successfully to');
        Log::info('Email sent successfully to:');
    }
}
