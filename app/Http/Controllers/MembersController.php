<?php

namespace App\Http\Controllers;
use App\Members;
use Illuminate\Http\Request;
use App\State;
use App\City;
use App\Address;
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
        $member = Members::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'birth_day'  => $request->birth_day,
        ]);

        $address = Address::create([
            'address'     => $request->address,
            'number'      => $request->number,
            'member_id'   => $member->id,
        ]);
              dd($request);

        return redirect()->route('members.index');
    }
}
