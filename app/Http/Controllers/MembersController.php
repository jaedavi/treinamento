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
            'address'     => $request->address,
            'number'      => $request->number,
            'member_id'   => $member->id,
        ]);
              // dd($request);

        return redirect()->route('members.index');
    }

    // public function edit (Member $member){
    public function edit ($id){
        // caso seja usado a linha comentada acima, comentar a linha de baixo e inverter o comentário
        // em action
        $member = Member::find($id);

        $states = State::orderBy('state')->get();

        $address = $member->address;

        $cities = [];

        // $action = route('members.update', $member->id);
        $action = route('members.update', $id);

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

    public function update(Request $request , Member $member ){
        // dd($request->all());
        // dd($request->address);
        /*  Esta é a maneira simples de fazer, porém é necessário entender o que está acontecendo
            como no código abaixo*/
            // $member->update($request->all());
            // $member->address->update($request->all());

        // dd($request);
        // dd($member);
        // $member = Member::find($member->id);
        $member->update([
            "name" =>       $request->name,
            "email" =>      $request->email,
            "phone" =>      $request->phone,
            "birth_day" =>  $request->birth_day,
        ]);

        // dd($member->address);
        // dd($member->address->update);
        //caso em "address"   => $request->address, tivesse outra coisa dentro de um array usar []...

        $member->address->update([
            "address"   => $request->address,
            "number"    =>$request->number
        ]);
        // dd($member);

        return redirect()->route('members.index');
    }

}
