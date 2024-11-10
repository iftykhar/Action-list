<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            "name"=> "iftykhar alam",
            "email"=> "iftykhar@example.com",
            'is_admin'=> true,

        ]);

        for($i=0;$i<10;$i++){
            DB::table('actions')->insert([
                'user_id'=> DB::table('users')->first()->id,
                'content'=> fake()->realText(50),
                'status'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
