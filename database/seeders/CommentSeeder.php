<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment1 = new Comment();
        $comment1->content = 'Bravo na hrabrosti!!';
        $comment1->likes = 3;
        $comment1->dislikes = 1;
        $comment1->parent_id = null;
        $comment1->post_id = 1;
        $comment1->ip_id = 1;
        $comment1->user_id = 3;
        $comment1->save();

        $comment2 = new Comment();
        $comment2->content = 'Slazem se';
        $comment2->likes = 2;
        $comment2->dislikes = 0;
        $comment2->parent_id = 1;
        $comment2->post_id = 1;
        $comment2->ip_id = 2;
        $comment2->user_id = 2;
        $comment2->save();

        $comment3 = new Comment();
        $comment3->content = 'U pravu si u potpunosti';
        $comment3->likes = 4;
        $comment3->dislikes = 2;
        $comment3->parent_id = null;
        $comment3->post_id = 2;
        $comment3->ip_id = 1;
        $comment3->user_id = 3;
        $comment3->save();

        $comment2 = new Comment();
        $comment2->content = 'Svu moj podrsku imas';
        $comment2->likes = 2;
        $comment2->dislikes = 0;
        $comment2->parent_id = 2;
        $comment2->post_id = 2;
        $comment2->ip_id = 1;
        $comment2->user_id = 2;
        $comment2->save();
    }
}
