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
            'slogan' => 'Rebuild your power of regeneration',
            'code' => 'Rev',
            'url' => 'http://laprairie.ch/medical-programs/revitalisation'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Master Detox',
            'slogan' => 'Stimulate your longevity',
            'code' => 'MDtx',
            'url' => 'http://laprairie.ch/medical-programs/master-detox'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Sleep',
            'slogan' => 'Sleep is the ultimate luxury',
            'code' => 'BSleep',
            'url' => 'http://laprairie.ch/medical-programs/better-sleep-old'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Medical Check-Up',
            'slogan' => 'Complete evaluation of your health',
            'code' => 'CheckU',
            'url' => 'http://laprairie.ch/medical-programs/medical-check'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Beauty',
            'slogan' => 'A veritable heaven of peace',
            'code' => 'Beauty',
            'url' => 'http://laprairie.ch/medical-programs/beauty'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Better Mobility',
            'slogan' => 'Intense physical healing program',
            'code' => 'Bmob',
            'url' => 'http://laprairie.ch/medical-programs/better-mobility'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Weight Management',
            'slogan' => 'Healthy active living',
            'code' => 'Wloss',
            'url' => 'http://laprairie.ch/medical-programs/weight-management'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Rebalancing',
            'slogan' => 'Bring balance to your being',
            'code' => 'Rebal',
            'url' => 'http://laprairie.ch/medical-programs/rebalancing'
        ]);

        factory(\App\Program::class)->create([
            'title' => 'Revitalisation Premium',
            'slogan' => 'The ultimate power regeneration',
            'code' => 'Rev++',
            'url' => 'http://laprairie.ch/medical-programs/revitalisation'
        ]);
    }
}
