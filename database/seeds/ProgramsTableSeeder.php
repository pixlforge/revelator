<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Program::class)->create([
            'title' => 'Revitalisation',
            'code' => 'Rev'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Master Detox',
            'code' => 'MDtx'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Sleep',
            'code' => 'BSleep'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Medical Check-Up',
            'code' => 'CheckU'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Beauty',
            'code' => 'Beauty'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Mobility',
            'code' => 'Bmob'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Weight Management',
            'code' => 'Wloss'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Rebalancing',
            'code' => 'Rebal'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Weekend Escape',
            'code' => 'WKND'
        ]);
    }
}
