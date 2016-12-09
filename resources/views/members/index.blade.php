@extends('layouts.style')

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var setMember = function(member) {
                $('#member-name').html(member['name']);
                $('#member-email').html(member['email']);
                $('#member-phone').html(member['phone']);
                $('#member-birth_day').html(member['birth_day']);
                $('#member-state').html(member['state_name']);
                $('#member-city').html(member['city_name']);

            };

            $('[data-member-id]').click(function(event) {
                event.preventDefault();

                memberId = $(this).data('member-id');

                $.ajax({
                    url: '/members/' + memberId + '/show',
                    type: 'GET',
                })
                .done(function(data) {
                    setMember(data);

                    $('#infoModal').modal('show');

                    console.log("success", data);
                })
                .fail(function(data) {
                    console.log("error", data);
                });
            });
        });
    </script>
@stop

@section('content')
    <ul class="nav nav-pills">
      <a class="glyphicon glyphicon-plus" href="/members/create">ADICIONAR NOVO MEMBRO:</a><br>
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
                        <a href="/members/{{ $member->id }}/edit">
                            <button class="btn btn-primary" title ="editar cadastro">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </a>

                        <button type="button" class="btn btn-success" title="verificar cadastro" data-member-id="{{ $member->id }}">
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </button>

                        <a href="{{ route('members.destroy', $member->id) }}">
                            <button class="btn btn-dangerous" title ="remover cadastro"><span class="glyphicon glyphicon-remove"></span></button>
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal -->
<div id="infoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dados complementares de membro</h4>
      </div>
      <div class="modal-body">
        <label>NOME: </label>
        <span id="member-name"></span><br>
        <label>EMAIL:</label>
        <span id="member-email"></span><br>
        <label>TELEFONE: </label>
        <span id="member-phone"></span><br>
        <label>DATA DE NASCIMENTO: </label>
        <span id="member-birth_day"></span><br>
        <label>CIDADE: </label>
        <span id="member-city"></span><br>
        <label>ESTADO:</label>
        <span id="member-state"></span><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@stop

