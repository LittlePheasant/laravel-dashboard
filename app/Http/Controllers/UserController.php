<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function __construct() {
        $this->user = new User;
    }

    public function userInfoByID($id){

        // Retrieve user information based on the provided $id
        $userDetails = $this->user->getuserInfoByID($id);

        return response()->json($userDetails);
    }

    public function getPaginatedUsers(Request $request) {
        $usersList = $this->user->getUserLists(); // Change 10 to the number of items per page you want

        $headers = view('user.user')->render();

        return response()->json(['headers' => $headers, 'user' => $usersList]);

    }
}
