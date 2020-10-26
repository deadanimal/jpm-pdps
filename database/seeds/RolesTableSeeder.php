<?php

use Illuminate\Database\Seeder;

class perananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peranan')->insert([
            'id' => 1,
            'name' => 'Admin',
            'description' => 'This is the administration role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('peranan')->insert([
            'id' => 2,
            'name' => 'Creator',
            'description' => 'This is the creator role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('peranan')->insert([
            'id' => 3,
            'name' => 'Member',
            'description' => 'This is the member role',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
