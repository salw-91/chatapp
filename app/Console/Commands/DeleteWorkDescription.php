<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Jobs\DeleteWorkDescriptionJob;

class DeleteWorkDescription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DeleteWorkDescription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $users_without_work_description = User::whereNotNull('work_description')->get();

        foreach ($users_without_work_description as $key => $user_without_work_description) {
            dispatch(new DeleteWorkDescriptionJob($user_without_work_description));
        }
        return 0;
    }
}
