<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faqs() {
      return view('faqs')->with('title', 'FAQs');
    }

    public function products() {
      return view('products')->with('title', 'Productos');
    }

    

}
