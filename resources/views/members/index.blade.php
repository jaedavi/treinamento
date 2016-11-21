@extends('layouts.style')

@section('content')
    <ul class="nav nav-pills">
      {{-- <li role="presentation" class="active"><a href="/members/create" target="blank" title ="cadastro de novo sócio">NEW CADASTRE:</a></li> --}}
      <a href="/members/create">Novo</a>
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th class="col-sm-4">Nome:</th>
                <th class="col-sm-4">Email:</th>
                <th class="col-sm-4">Edit Cadastre:</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <th class="col-sm-4">{{ $member->name }}</th>
                    <th class="col-sm-4">{{ $member->email }}</th>
                    <th class="col-sm-4">
                        <button class="btn btn-primary" title ="editar cadastro"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-success" title ="verificar cadastro"><span class="glyphicon glyphicon-ok"></span></button>
                        <button class="btn btn-dangerous" title ="remover cadastro"><span class="glyphicon glyphicon-remove"></span></button>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
