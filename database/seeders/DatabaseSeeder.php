<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// php artisan db:seed --class=DatabaseSeeder


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('books')->truncate();
        DB::table('user-book')->truncate();
        DB::table('userStats')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            [
                'firstName' => 'Bethelhem',
                'lastName' => 'Tesfaye',
                // 'username' => 'JustBeth',
                'email' => 'BethelhemTesfaye95@gmail.com',
                'password' => Hash::make('21132113'),
                'created_at' => now()
            ],
        ]);

        DB::table('books')->insert([
            [
                'title' => 'Madonna in a Fur Coat',
                'author' => 'Sabahattin Ali',
                'pages' => 137,
                'publisher' => 'Penguin Classic',
                'synopsis' => 
                    'A shy young man leaves his home in rural Turkey to learn a trade and discover life in 1920s Berlin. There, amidst the city\'s bustling streets, elegant museums, passionate politics, and infamous cabarets, a chance meeting with a beautiful half-Jewish artist transforms him forever. Caught between his desire for freedom from tradition and his yearning to belong, he struggles to hold on to the new life he has found with the woman he loves.
                                
                      Emotionally powerful, intensely atmospheric, and touchingly profound, Madonna in a Fur Coat is an unforgettable novel about new beginnings, the relentless pull of family ties, and the unfathomable nature of the human soul. First published in 1943, this novel, with its quiet yet insistent defiance of social norms, has been topping best-seller lists in Turkey since 2013.',
                'publishedDate' => '1943-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'How to Raise your Self-Esteem',
                'author' => ' Nathaniel Branden',
                'pages' => 92,
                'publisher' => 'Bantam Books',
                'synopsis' => 
                    'Of all the judgments you make in life, none is as  important as the one you make about yourself. The  difference between low self-esteem and high  self-esteem is the difference between passivity and  action, between failure and success.
                                
                     Now, one of  America\'s foremost psychologists and a pioneer in  self-esteem development offers a step-by-step guide to  strengthening your sense of self-worth. Here are  simple, straightforward and  effective techniques that will dramatically improve  the way you think and feel about yourself.',
                'publishedDate' => '1987-12-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('user-book')->insert([
            [
                'user_id'=> 1,
                'book_id'=> 1,
                'pagesRead'=> 86,
                'readingStatus'=> 'Currently Reading',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'user_id'=> 1,
                'book_id'=> 2,
                'pagesRead'=> 13,
                'readingStatus'=> 'Not Reading',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
        ]);

        DB::table('userStats')->insert([
            [
                'user_id'=> 1,
                'finishedReading'=> 0,
                'currentlyReading'=> 1,
                'notReading'=> 1,
            ]
        ]);
    }
}
