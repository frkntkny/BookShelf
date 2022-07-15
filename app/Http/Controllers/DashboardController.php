<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //



    public function dashboard()
    {
            return redirect('/');
    }

    public function welcome()
    {

        $categories = Category::all();
        $latestBooks = Book::orderBy('created_at', 'desc')->latest()->paginate();

        return view("welcome", compact("latestBooks", "categories"));
    }

    public function admin()
    {
            return view("admin");

    }



}
