{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Walprint')

@section('content_header')
  
@stop

@section('content')
@if (\Session::has('warning'))
    <div class="alert alert-info">
        {!! \Session::get('warning') !!}</li>
    </div>
@endif
    <p><i></i></p>
   <h2>Limites</h2><hr>
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table  table-sm table-bordered table-hover dataTable">
    <thead>
      <tr class="bg-secondary text-center py-0 align-middle">
          <td>Id</td>
          <td>Empresa</td>   
          <td>Banco</td>   
          <td>Tipo</td> 
          <td>Valor</td> 
          <td>Ação</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($saldo['limites'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ ucwords(strtolower($cx->valor)) }}</td>
            <td>
                <a class="btn btn-info btn-xs" href="./editarAcesso/{{ $cx->id}}">Editar</a>
                <a class="btn btn-danger btn-xs" href="./excluirAcesso/{{ $cx->id}}">Excluir</a>
        </td>
           
        </tr>
        @endforeach
    </tbody>
  </table>
  </form>
              <!-- /.box-body -->
              </div>
          <!-- /.box -->
        </div>

  <p><i></i></p>
   <h2>Saldos</h2><hr>
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table  table-sm table-bordered table-hover dataTable">
    <thead>
      <tr class="bg-secondary text-center py-0 align-middle">
          <td>Id</td>
          <td>Empresa</td>   
          <td>Banco</td>   
          <td>Tipo</td> 
          <td>Valor</td> 
          <td>Ação</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($saldo['saldos'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ ucwords(strtolower($cx->valor)) }}</td>
            <td>
                <a class="btn btn-info btn-xs" href="./editarAcesso/{{ $cx->id}}">Editar</a>
                <a class="btn btn-danger btn-xs" href="./excluirAcesso/{{ $cx->id}}">Excluir</a>
        </td>
           
        </tr>
        @endforeach
    </tbody>
  </table>
  </form>
              <!-- /.box-body -->
              </div>
          <!-- /.box -->
        </div>


      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

    $(document).ready(function() {
    var table = $('#example').DataTable({
        columnDefs: [{
            orderable: false,
            targets: [1,2,3]
        }]
    });
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );

  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
            }
        });
  });
  </script>

@stop
