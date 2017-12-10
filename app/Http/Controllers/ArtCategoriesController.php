<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class ArtCategoriesController extends Controller
{
    public function categories() {
      return view('artCategories')->with('title', 'Categorías de productos');
    }

    public function womenCategory () {

        $products = Post::where('category_id', 2)->paginate(9);

        return view('artCategoriesWomen')->with('title', 'Mujeres')
                                       ->with('products', $products);
    }

    public function menCategory () {

        $products = Post::where('category_id', 1)->paginate(9);

        return view('artCategoriesMen')->with('title', 'Hombres')
                                     ->with('products', $products);
    }

    public function kidsCategory () {

         $products = Post::where('category_id', 3)->paginate(9);

        return view('artCategoriesKids')->with('title', 'Kids')
                                     ->with('products', $products);
    }
}
