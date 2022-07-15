<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        //check is user is log in or not
//        $user = auth()->user();
//        if (isset($user)) {
//            $this->middleware( $user->hasRole('admin') )->all();
//            $this->middleware($user->hasRole('user'))->only('edit');
//           }
//


    }
    public function admin()
    {
        return view("admin");
    }


    public function index()
    {
        $users =  \App\Models\User::paginate();
        return view("allUsers", compact("users"));
    }
    public function destroy(User $user,Request $request)
    {
        $user->delete();
        return redirect()->back();
    }

    public function edit(User $user,Request $request)
    {
        return view("editUser", compact("user"));
    }

    public function update(User $user,Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index');
    }


//
//    public function showAllUsers()
//    {
//        $users =  \App\Models\User::paginate();
//        return view("allUsers", compact("users"));
//    }
//
//    public function deleteUser(Request $request)
//    {
//        $user = \App\Models\User::find($request->id);
//        $user->delete();
//        return redirect()->back();
//    }
//
//    public function editUser(Request $request)
//    {
//        $user = \App\Models\User::find($request->id);
//        return view("editUser", compact("user"));
//    }
//
//    public function editUserPost(Request $request)
//    {
//        $user = \App\Models\User::find($request->id);
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->save();
//
//        return redirect()->route('seeAllUsers');
//    }


}
