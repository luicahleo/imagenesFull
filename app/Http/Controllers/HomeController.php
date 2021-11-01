<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $files = File::orderBy('id', 'desc')
            ->paginate(8);
        // return $files;

        return view('welcome', compact('files'));
    }
}
