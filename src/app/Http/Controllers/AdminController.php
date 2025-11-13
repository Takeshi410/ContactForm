<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contacts;
use App\Models\Categories;


class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function admin()
    {
        $contacts = Contacts::with('category')->Paginate(8);
        $categories = Categories::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contacts::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category)->DateSearch($request->date)->Paginate(8);
        $categories = Categories::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function reset() {
        $contacts = Contacts::with('category')->Paginate(8);
        $categories = Categories::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request)
    {
        Contacts::find($request->id)->delete();
        return redirect('/admin');
    }

}
