<?php

namespace App\Http\Controllers;

use Exception;
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

    /**
     * | View Index Page
     */
    public function index()
    {
        $items = json_decode(File::get($this->jsonFilePath), true) ?? [];
        return view('Users.Crud', compact('items'));
    }

    /**
     * | Get All the Users List
     */
    public function getUsers()
    {
        $items = json_decode(File::get($this->jsonFilePath), true) ?? [];
        return $items;
    }

    /**
     * | Store the Users
     */
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

    /**
     * | Update the User
     * | @param Request
     */
    public function update(Request $request)
    {
        $request->validate([
            'nameupd' => 'required',
            'photoupd' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'addressupd' => 'required',
            'genderupd' => 'required',
        ]);

        $items = json_decode(File::get($this->jsonFilePath), true);
        $item = [];

        try {
            if ($request->hasFile('image')) {
                $imagePath = time() . $request->photoupd->getClientOriginalName();
                $request->photo->move('UploadFiles', $imagePath);
                // Store new image
                // Keep the existing image path
                $item['photo'] = 'UploadFiles/' . $imagePath;
            } else
                $item['photo'] = $items[$request->indexupd]['photo'];

            $item['name'] = $request->nameupd;
            $item['address'] = $request->addressupd;
            $item['gender'] = $request->genderupd;

            $items[$request->indexupd] = $item;

            File::put($this->jsonFilePath, json_encode($items));
            return response()->json(['message' => "data Updated Successfully"]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    /**
     * | Delete Users
     */

    public function destroy(Request $req)
    {
        $items = json_decode(File::get($this->jsonFilePath), true);
        unset($items[$req->indexdel]);
        File::put($this->jsonFilePath, json_encode(array_values($items)));
        return response()->json(['message' => "data Deleted Successfully"]);
    }
}
