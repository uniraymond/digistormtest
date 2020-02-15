<?php

namespace App\Console\Commands;

use App\Mail\BirthdayEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BirthdayMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users a birthday Reminder message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $i = 0;
        $users = User::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get();

        foreach($users as $user)
        {
            $email="ifengraymond@gmial.com";
            Mail::to($email)->send(new BirthdayEmail($user));
            $i++;
        }

    }
}
