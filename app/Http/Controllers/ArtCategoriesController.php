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
      return view('artCategoriesMen')->with('title', 'Hombres');
    }

    public function kidsCategory () {
      return view('artCategoriesKids')->with('title', 'Kids');
    }
}
