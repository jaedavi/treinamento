@extends('layouts.style')

@section('content')
  <form class="form-horizontal" method="get" action="">
    <div class="form-group row">
      <label for="example-text-input" class="col-xs-2 col-form-label">NOME:</label>
      <div class="col-xs-8">
        <input class="form-control" type="text" value="" id="name"  required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-xs-2 col-form-label">EMAIL:</label>
      <div class="col-xs-8">
        <input class="form-control" type="email" value="example@example.com" id="email"  required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-xs-2 col-form-label">TELEPHONE:</label>
      <div class="col-xs-8">
        <input class="form-control" type="tel" value="(xx)-xxxx-xxxxx" id="phone"  required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="example-date-input" class="col-xs-2 col-form-label">DATA DE NASCIMENTO</label>
      <div class="col-xs-8">
        <input class="form-control" type="date" value="dd/mm/aaaa" id="date"  required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-xs-2 col-form-label">ENDEREÇO:</label>
      <div class="col-xs-8">
        <input class="form-control" type="address" value="Rua,Av,travessa" id="address"  required="required">
      </div>
      </div>
    <div class="form-group row">
      <label for="number" class="col-xs-2 col-form-label">NUMERO:</label>
      <div class="col-xs-8">
        <input class="form-control" type="text" value="" id="number"  required="required">
      </div>
    </div>
   <div class="form-group row">
      <label for="city" class="col-xs-2 col-form-label">CIDADE:</label>
      <div class="col-xs-8">
        <input class="form-control" type="text" value="" id="city"  required="required">
      </div>
      </div>
    <div class="form-group row">
      <label for="states" class="col-xs-2 col-form-label">ESTADO</label>
      <div class="col-xs-8">
        <input class="form-control" type="text" value="" id="states"  required="required">
      </div>
    </div>
    <div class="row" align="center">
    <button type="submit">Enviar Dados:</button>
</div>
  </form>
@stop
