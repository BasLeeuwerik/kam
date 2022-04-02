<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                'user_id'       => 1,
                'title'         => 'first post',
                'category_id'   => 1,
                'body'          => 'lorem ipsum',
            ]
            );

        Post::factory(1000)->create();
    }
}
