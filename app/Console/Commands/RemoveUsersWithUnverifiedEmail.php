<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;

class RemoveUsersWithUnverifiedEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:unverified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If email is not verified within 24 hours of registering, delete user.';

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
        $users = User::where(Carbon::parse('created_at')->diffInDays(Carbon::now()), '>', 1)
            ->where('email_verified_at', null)
            ->get();

        $bar = $this->output->createProgressBar(count($users));

        $bar->start();

        foreach ($user as $u) {
            $u->delete();
            
            $bar->advance();
        }

        $bar->finish();
    }
}
