<?php

use App\Campaign;
use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'title' => 'Business-support campaign',
                'description' => 'A great campaign to collect a lot of information and a lor of money as well!',
                'status' => 1,
                'client_id' => 1,
            ],
            [
                'title' => 'Developers campaign',
                'description' => 'A great campaign to collect a lot of information and a lor of money as well!',
                'status' => 2,
                'client_id' => 1,
            ]

        ])->each(function ($item) {
            Campaign::create($item);
        });
    }
}