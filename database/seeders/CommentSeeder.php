<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(
            [
                'user_id'       => 1,
                'body'          => 'first comment',
                'post_id'       => 1,
            ]
            );
        
        Comment::factory(1000)->create();
    }
}
