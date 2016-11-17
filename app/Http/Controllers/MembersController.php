<?php

namespace App\Http\Controllers;
use App\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
   public function index()
    {
        $members = Members::orderBy('name')->get();

        return view('members.index', compact('members'));
    }
    public function create(){
        return view('members.form');
    }
}