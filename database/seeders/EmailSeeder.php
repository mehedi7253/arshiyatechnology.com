<?php

namespace Database\Seeders;

use App\Models\EmailSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = new EmailSetting();
        $email->mail_host = 'smtp.mailtrap.io';
        $email->mail_port = '2525';
        $email->mail_username = 'your_username';
        $email->mail_password = 'your_password';
        $email->mail_encryption = 'tls';
        $email->mail_from_address = 'your_email';
        $email->mail_from_name = 'your_name';
        $email->save();
    }
}
