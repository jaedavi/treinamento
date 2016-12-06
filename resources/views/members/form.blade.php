@extends('layouts.style')

@section('content')
    <form class="form-horizontal" method="POST" action="{{ $action }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ $method }}"/>
            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label">NOME:</label>
                <div class="col-xs-8">
                {{-- {!! dd($member, 'piroka'); !!} --}}
                <input class="form-control" type="text" value="{{ old('name', $member->exists ? $member->name : null) }}"
        id="name" name="name" required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-xs-2 col-form-label">EMAIL:</label>
      <div class="col-xs-8">
        <input class="form-control" type="email" value="{{ old('email', $member->exists ? $member->email : null) }}" id="email" name="email" required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-xs-2 col-form-label">TELEPHONE:</label>
      <div class="col-xs-8">
        <input class="form-control" type="tel" value="{{ old('phone', $member->exists ? $member->phone : null) }}" id="phone" name="phone" required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="birth_day" class="col-xs-2 col-form-label">DATA DE NASCIMENTO</label>
      <div class="col-xs-8">
     {{--  <select class="birth_day" type="date" value="" id="birth_day" name="birth_day" required="required"></select> --}}
        <input class="form-control" type="text" value="{{ old('birth_day', $member->exists ? $member->birth_day : null) }}" id="birth_day" name="birth_day" required="required">
      </div>
    </div>
    <div class="form-group row">
      <label for="state" class="col-xs-2 col-form-label">ESTADO:</label>
      <div class="col-xs-5">
        <select class="form-control" type="text" value="" id="state" name="address[state]" required="required">
          @foreach($states as $state)
            <option value="{{ $state->id }}">{{ $state->state }}</option>
          @endforeach
          {{-- <option value="{{ old('state_id', $state->exists ? $state->state_id : null) == $state->id ? 'selected = "selected"' : '' }}"></option> --}}
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="city" class="col-xs-2 col-form-label">CIDADE:</label>
      <div class="col-xs-5">
        <select class="form-control" type="text" value="" id="city" name="address[city]" required="required">
          {{-- <option value="{{ old('city_id', $city->exists ? $city->city_id : null) == $city->id ? 'selected = "selected"' : '' }}"></option> --}}
          @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->city }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-xs-2 col-form-label">ENDEREÇO:</label>
      <div class="col-xs-6">
        <input class="form-control" type="address" value="{{ old('address', $member->exists ? $member->address->address : null) }}" id="address" name="address[address]" required="required">
      </div>
      </div>
    <div class="form-group row">
      <label for="number" class="col-xs-2 col-form-label">NUMERO:</label>
      <div class="col-xs-4">
        <input class="form-control" type="text" value="{{ old('number', $member->exists ? $member->address->number : null) }}" id="number" name="address[number]" required="required">
      </div>
    </div>

    <div class="row" align="center">
    <button type="submit">Enviar Dados:</button>
</div>
  </form>
@stop

@section('scripts')
    <script>
  $(document).ready(function() {
    jQuery(function($){
        $('#phone').mask("(99) 9999-9999");
        $('#birth_day').mask("99/99/9999");
    });
    $('#state').on('change', function() {//pega o elemento states e quando ele mudar vai declarar variavel stateid e pega o valor dela mesmo
           var stateId = $(this).val();

           $('#city').html($('<option>', {//
               value: '',
               text: 'Escolha uma cidade'
           }));

           $.ajax({
               url: '/cities/' + stateId,
               type: 'GET',
           })
           .done(function(data) {
               console.log(data);
               $.each(data.cities, function(i, item) {
                   console.log(item);
                    $('#city').append($('<option>', {
                       value: item.id,
                       text: item.city
                    }));
               });
           })
       });
  });
    </script>
@stop