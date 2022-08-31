<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Info extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $randomPass=   rand(2500,5555);
        $randomString = Str::random(10);
        $users= new User();
        $name = 'Name';
        $password = Hash::make($randomPass);
        $email = $randomString.'@gmail.com';

        $users->name=$name;
        $users->email=$email;
        $users->password=$password;
        $users->save();

    }
}
