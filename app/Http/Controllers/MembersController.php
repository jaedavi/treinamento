<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Member;
use App\Address;
use App\City;
use App\State;

class MembersController extends Controller
{
   public function index()
    {
        $members = Member::orderBy('name')->get();

        return view('members.index', compact('members'));
    }

    public function show(Request $request, Member $member)
    {
        if ($request->ajax()) {
            return $member->toArray();
        }

        return view('members.show', compact('member'));
    }

    public function create(){
        $member = new Member();
        $states = State::orderBy('state')->get();
        $cities = [];
        $action = route('members.store');
        $method = 'POST';
        return view('members.form', compact('member', 'action', 'method','states','cities'));
    }

    public function store(Request $request){
            $member = Member::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'birth_day'  => $request->birth_day,
        ]);

        $address = Address::create([
            'address'     => $request->address['address'],
            'number'      => $request->address['number'],
            'member_id'   => $member->id,
            'state_id'    => $request->address['state'],
            'city_id'     => $request->address['city'],
        ]);

        return redirect()->route('members.index');
    }

    public function edit (Member $member){
        $states = State::orderBy('state')->get();
        $cities = City::where('state_id', $member->address->state_id)->get();
        $action = route('members.update', $member->id);
        $method = 'PUT';

        return view('members.form',[
            'action' =>$action,
            'method'=>$method,
            'member'=>$member,
            'states'=>$states,
            'cities'=>$cities,
            ]);
    }

    public function update(Request $request , Member $member ){

        $member->update([
            "name" =>       $request->name,
            "email" =>      $request->email,
            "phone" =>      $request->phone,
            "birth_day" =>  $request->birth_day,
        ]);

        $member->address->update([
          'address'     => $request->address['address'],
            'number'      => $request->address['number'],
            'state_id'    => $request->address['state'],
            'city_id'     => $request->address['city'],
        ]);


        return redirect()->route('members.index');
    }

    public function delete(Member $member)
    {
        $member->destroy();

        return redirect()->route('members.index');
    }

}
