<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::factory()
            ->has(
                Floor::factory()
                    ->has(
                        Room::factory()
                            ->count(10)
                    )
                    ->count(10)
                )
            ->count(10)
            ->create();
    }
}
