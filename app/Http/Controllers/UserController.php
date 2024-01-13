<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * | Author - Anshu Kumar
 * | Created On - 13-01-2023
 * | Created for - Crud Operation for Users
 * | Status - Closed
 */

class UserController extends Controller
{
    //
    private $jsonFilePath;

    public function __construct()
    {
        $this->jsonFilePath = storage_path('app/users.json');
    }

    public function index()
    {
        $items = json_decode(File::get($this->jsonFilePath), true) ?? [];
        return view('Users.Crud', compact('items'));
    }

    public function getUsers()
    {
        $items = json_decode(File::get($this->jsonFilePath), true) ?? [];
        return $items;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'gender' => 'required',
        ]);

        $imagePath = time() . $request->photo->getClientOriginalName();
        $request->photo->move('UploadFiles', $imagePath);
        $items = json_decode(File::get($this->jsonFilePath), true);
        $item = $request->all();
        $item['photo'] =  'UploadFiles/' . $imagePath;
        $items[] = $item;
        File::put($this->jsonFilePath, json_encode($items));

        return view('Users.Crud', compact('items'));
    }
}
