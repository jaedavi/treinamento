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
              // dd($request);

        return redirect()->route('members.index');
    }

    public function edit ($id){
        $member = Members::find($id);
        $states = State::orderBy('state')->get();
        $address = $member->address;
        $cities = [];
        $action = route('members.update',$id);
        $method = 'PUT';
        // dd('sdfasdsd');
        return view('members.form',[
            'action' =>$action,
            'method'=>$method,
            'member'=>$member,
            'address'=>$address,
            'states'=>$states,
            'cities'=>$cities,
            ]);
    }

    public function update(Request $request , Members $members ){
            $members->update ($request->all());
            $members->address->update($request->address);
            return redirect()->route('members.index');
    }

}
