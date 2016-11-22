<?php

namespace App\Http\Controllers;
use App\Members;
use Illuminate\Http\Request;
use App\State;
use App\City;
class MembersController extends Controller
{
   public function index()
    {
        $members = Members::orderBy('name')->get();

        return view('members.index', compact('members'));
    }
    public function create(){
        $states = State::orderBy('state')->get();
        $cities = [];
        $action = route('members.store');
        $method = 'POST';
        return view('members.form', compact('action', 'method','states','cities'));
    }

    public function store(Request $request){
        $members = new Members;
        $members->name = $request->name;
        $members->email = $request->email;
        $members->phone = $request->phone;
        $members->birth_day = $request->birth_day;
        // dd($request);
        // $members->address = $request->address;
        // $members->number = $request->number;
        // $members->city = $request->city;
        // $members->state = $request->state;
        // $members->uf = $request->uf;
        $members->save();

        return redirect()->route('members.index');
    }
}
