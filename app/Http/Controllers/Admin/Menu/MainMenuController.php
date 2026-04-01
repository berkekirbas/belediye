<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function index()
    {
        return view('panel.menu.index');
    }
}
