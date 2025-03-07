<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodbeverage() {
        return view ('products.food-beverage');
    }

    public function beautyhealth() {
        return view ('products.beauty-health');
    }

    public function homecare() {
        return view ('products.home-care');
    }

    public function babykid() {
        return view ('products.baby-kid');
    }
}
