<?php

namespace App\Jobs;

use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateWorkDescriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $user_without_work_description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_without_work_description)
    {
        $this->user_without_work_description = $user_without_work_description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $faker = Factory::create();
        $user_without_work_description->work_description = $faker->jobTitle();
        $user_without_work_description->save();
    }
}
