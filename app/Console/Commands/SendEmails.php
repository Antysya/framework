<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users= User::where('email_sent', false)->get();
        foreach ($users as $user){
          echo "Send mail to {$user->email};
          $user->email_sent=true;
          $user->save();
        }
    }
}
