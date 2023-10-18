<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\UserAlert;
use Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('santo@gmail.com')->send(new UserAlert);
    }
}
