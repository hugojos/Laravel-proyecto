<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',2000);
            $table->integer('price');
            $table->string('img1');
            $table->string('img2');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        $art1= new Post;
        $art1->title = 'Sweater Sansa';
        $art1->description = 'Sweater rojo';
        $art1->price = 500;
        $art1->img1 = 'hmprod (2)_15126853921.jpg';
        $art1->img2 = 'hmprod (3)_15126853922.jpg';
        $art1->user_id = 1;
        $art1->category_id = 2;
        $art1->save();

        $art2= new Post;
        $art2->title = 'Vestido Sibila';
        $art2->description = 'Vestido de gasa azul estampado con estrellas';
        $art2->price = 500;
        $art2->img1 = 'hmprod (10)_15126856231.jpg';
        $art2->img2 = 'hmprod (11)_15126856232.jpg';
        $art2->user_id = 1;
        $art2->category_id = 2;
        $art2->save();

        $art3= new Post;
        $art3->title = 'Pantalón Samira';
        $art3->description = 'Pantalón negro';
        $art3->price = 500;
        $art3->img1 = 'hmprod (22)_15126859281.jpg';
        $art3->img2 = 'hmprod (23)_15126859282.jpg';
        $art3->user_id = 1;
        $art3->category_id = 2;
        $art3->save();

        $art4= new Post;
        $art4->title = 'Vestido';
        $art4->description = 'Vestido negro con volados asimétrico';
        $art4->price = 500;
        $art4->img1 = 'hmprod (4)_15126860161.jpg';
        $art4->img2 = 'hmprod (5)_15126860162.jpg';
        $art4->user_id = 1;
        $art4->category_id = 2;
        $art4->save();

        $art5= new Post;
        $art5->title = 'Camisa';
        $art5->description = 'Camisa negra con estampa sutil';
        $art5->price = 500;
        $art5->img1 = 'hmprod (11)_15126861121.jpg';
        $art5->img2 = 'hmprod (12)_15126861122.jpg';
        $art5->user_id = 1;
        $art5->category_id = 1;
        $art5->save();

        $art6= new Post;
        $art6->title = 'Remera';
        $art6->description = 'Remera blanca con estampa abstracta';
        $art6->price = 500;
        $art6->img1 = 'hmprod (9)_15126861491.jpg';
        $art6->img2 = 'hmprod (10)_15126861492.jpg';
        $art6->user_id = 1;
        $art6->category_id = 1;
        $art6->save();

        $art7= new Post;
        $art7->title = 'Buzo';
        $art7->description = 'Buzo negro monochrome';
        $art7->price = 500;
        $art7->img1 = 'hmprod (17)_15126862311.jpg';
        $art7->img2 = 'hmprod (18)_15126862312.jpg';
        $art7->user_id = 1;
        $art7->category_id = 1;
        $art7->save();

        $art8= new Post;
        $art8->title = 'Jean';
        $art8->description = 'Pantalón de jean negro skinny';
        $art8->price = 500;
        $art8->img1 = 'hmprod (15)_15126862891.jpg';
        $art8->img2 = 'hmprod (16)_15126862902.jpg';
        $art8->user_id = 1;
        $art8->category_id = 1;
        $art8->save();

        $art9= new Post;
        $art9->title = 'Jean';
        $art9->description = 'Pantalón de jean';
        $art9->price = 500;
        $art9->img1 = 'hmprod (4)_15126863571.jpg';
        $art9->img2 = 'hmprod (5)_15126863572.jpg';
        $art9->user_id = 1;
        $art9->category_id = 3;
        $art9->save();

        $art10= new Post;
        $art10->title = 'Vestido';
        $art10->description = 'Vestido rojo a cuadrille';
        $art10->price = 500;
        $art10->img1 = 'hmprod (12)_15126864071.jpg';
        $art10->img2 = 'hmprod (13)_15126864072.jpg';
        $art10->user_id = 1;
        $art10->category_id = 3;
        $art10->save();

        $art11= new Post;
        $art11->title = 'Vestido';
        $art11->description = 'Vestido azul con estrellas';
        $art11->price = 500;
        $art11->img1 = 'hmprod (16)_15126864521.jpg';
        $art11->img2 = 'hmprod (17)_15126864522.jpg';
        $art11->user_id = 1;
        $art11->category_id = 3;
        $art11->save();

        $art12= new Post;
        $art12->title = 'Buzo';
        $art12->description = 'Buzo rojo con estampa de Mickey Mouse';
        $art12->price = 500;
        $art12->img1 = 'hmprod (20)_15126865131.jpg';
        $art12->img2 = 'hmprod (21)_15126865132.jpg';
        $art12->user_id = 1;
        $art12->category_id = 3;
        $art12->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
