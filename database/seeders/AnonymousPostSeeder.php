<?php

namespace Database\Seeders;

use App\Models\AnonymousPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnonymousPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = new AnonymousPost();
        $post1->title = 'Podrška ženama';
        $post1->content = 'Ohrabrujem sve žene da ne trpe nasilje i da potraže pomoć. Niste same, hrabrost je u vama.';
        $post1->likes = 15;
        $post1->dislikes = 1;
        $post1->publish = 1;
        $post1->ip_id = 1;
        $post1->user_id = 1;
        $post1->save();

        $post2 = new AnonymousPost();
        $post2->title = 'Nikad ne odustaj';
        $post2->content = 'Život je previše dragocen da bi bio ispunjen strahom. Postoje ljudi koji su tu da pomognu, potražite ih.';
        $post2->likes = 10;
        $post2->dislikes = 0;
        $post2->publish = 1;
        $post2->ip_id = 2;
        $post2->user_id = 1;
        $post2->save();

        $post3 = new AnonymousPost();
        $post3->title = 'Možeš sve';
        $post3->content = 'Svaka žena zaslužuje ljubav i poštovanje. Ako si u teškoj situaciji, ne plaši se da potražiš podršku.';
        $post3->likes = 20;
        $post3->dislikes = 2;
        $post3->publish = 1;
        $post3->ip_id = 1;
        $post3->user_id = 1;
        $post3->save();
    }
}
