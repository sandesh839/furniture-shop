<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    //
    public function index()
    {
        $banners = Banners::orderBy('priority')->get();
        return view('banner.index',compact('banners'));
    }

    public function create()
{
    return view('banner.create');
}
}
