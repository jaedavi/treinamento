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

    public function store(Request $request){
        $members = new Member;
        $members->name = $request->name;
        $members->email = $request->email;
        $members->phone = $request->phone;
        $members->date_of_birth = $request->date_of_birth;
        $members->address = $request->address;
        $members->number = $request->number;
        $members->city = $request->city;
        $members->state = $request->state;
        $members->uf = $request->uf;
        dd($members->toArray());
        $members->save();
    }
}
// class SocioController extends Controller
// {
//       public function index()
//     {
//         $socios = Socio::all();
//         return view('socios.index', compact('socios'));
//     }
//     public function create()
//     {
//             $states = State::orderBy('state')->get();
//         return view('socios.create', compact('states'));
//     }
//     public function store(Request $request)
//     {
//         $socios = new Socio;
//         $socios->name = $request->name;
//         $socios->email = $request->email;
//         $socios->phone = $request->tel;
//         $socios->cell_phone = $request->cell_tel;
//         $socios->cpf= $request->cpf;
//         $socios->birthday = $request->date;
//         dd($socios->toArray());
//         $socios->save();
//         return view('socios.index',compact('socios'));
//     }
