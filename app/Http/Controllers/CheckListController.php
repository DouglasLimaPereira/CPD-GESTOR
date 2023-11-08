<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function index(){
        $check_lists = [];
        return view('checklist.index', compact('check_lists'));
    }

    public function create(){
        return View('checklist.create');
    }
}
