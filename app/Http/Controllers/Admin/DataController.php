<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DataController extends Controller
{
    public function index()
    {
        $data['user'] = User::latest()->paginate(25);
        return view('admin.user.index', $data);
    }
}
