<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class EveryMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:logout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logout User If User Logged In';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Request $request)
    {
        $users = Customer::where('access_token', '!==', null)->get();
        foreach ($users as $user) {
            $user->update([
                'access_token' => null,
            ]);
        }
        echo 'operation done';
    }
}
