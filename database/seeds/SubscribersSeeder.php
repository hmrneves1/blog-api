<?php

use App\Models\Api\v1\Subscribers\Subscribers;
use Illuminate\Database\Seeder;

class SubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subscribers::class, 5)->create();
    }
}
