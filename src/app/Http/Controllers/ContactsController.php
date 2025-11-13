<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Requests\ContactsRequest;
use App\Models\Categories;

class ContactsController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactsRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'detail', 'address', 'building', 'category_id']);
        if ($contact['gender'] == '1') {
            $gender_text = '男性';
        } else if ($contact['gender'] == '2') {
            $gender_text = '女性';
        } else if ($contact['gender'] == '3') {
            $gender_text = 'その他';
        }

        $name = $contact['last_name'] . '　' .$contact['first_name'];

        $id = $request->input('category_id');
        $categories = Categories::find($id);
        $category = $categories->content;

        return view('confirm', compact('contact', 'gender_text', 'name', 'category'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'detail', 'address', 'building', 'category_id']);
        Contacts::create($contact);
        return view('thanks');
    }

}
