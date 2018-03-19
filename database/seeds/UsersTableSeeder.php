<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Célien',
            'email' => 'celien@pixlforge.ch',
            'role' => 'dev'
        ]);

        factory(\App\User::class)->create([
            'name' => 'Radu',
            'email' => 'radu@bebold.ch',
            'role' => 'dev'
        ]);

        factory(\App\User::class)->create([
            'name' => 'La Prairie',
            'email' => 'admin@laprairie.ch',
            'role' => 'admin'
        ]);
    }
}
