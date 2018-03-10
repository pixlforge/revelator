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
            'code' => 'Rev',
            'url' => 'http://laprairie.ch/medical-programs/revitalisation'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Master Detox',
            'code' => 'MDtx',
            'url' => 'http://laprairie.ch/medical-programs/master-detox'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Sleep',
            'code' => 'BSleep',
            'url' => 'http://laprairie.ch/medical-programs/better-sleep-old'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Medical Check-Up',
            'code' => 'CheckU',
            'url' => 'http://laprairie.ch/medical-programs/medical-check'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Beauty',
            'code' => 'Beauty',
            'url' => 'http://laprairie.ch/medical-programs/beauty'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Mobility',
            'code' => 'Bmob',
            'url' => 'http://laprairie.ch/medical-programs/better-mobility'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Weight Management',
            'code' => 'Wloss',
            'url' => 'http://laprairie.ch/medical-programs/weight-management'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Rebalancing',
            'code' => 'Rebal',
            'url' => 'http://laprairie.ch/medical-programs/rebalancing'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Weekend Escape',
            'code' => 'WKND',
            'url' => 'http://laprairie.ch/medical-programs/weekend-escape'
        ]);
    }
}
