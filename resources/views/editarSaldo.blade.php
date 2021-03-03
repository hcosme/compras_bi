{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Editar de saldo</h1>
@stop
<?php //dd($acesso);?>
@section('content')
    <p><b>Atenção</b> no preenchimento das informações.</p>
    <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="./acessoEditar">
              <div class="box-body">

                {{ csrf_field()  }}

                <div class="col-lg-12">
              <div class="row">
                <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Id</label>
                  <input type="text" class="form-control" name="id" value="{{ $saldo[0]->id }}" readonly>
                </div>
                
                  <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Empresa</label>
                  <input type="text" class="form-control" name="empresa" value="{{ $saldo[0]->empresa }}" readonly="">
                </div>

                     <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Banco</label>
                  <input type="text" class="form-control" name="banco" value="{{ $saldo[0]->banco }}" readonly="">
                </div>
                
                     <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Tipo</label>
                  <input type="text" class="form-control" name="tipo" value="{{ $saldo[0]->tipo }}" readonly="">
                </div>
<br>
                     <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Saldo</label>
                  <input type="text" class="form-control" name="valor" id="saldo" onkeyup="formatarMoeda();" value="{{ number_format($saldo[0]->valor, 2, ',', '.') }}" >
                </div>
                </div>
                
                       </div> 
        
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gravar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

         
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">
                            function formatarMoeda() {
                              var elemento = document.getElementById('saldo');
                              var saldo = elemento.value;
                              
                              saldo = saldo + '';
                              saldo = parseInt(saldo.replace(/[\D]+/g,''));
                              saldo = saldo + '';
                              saldo = saldo.replace(/([0-9]{2})$/g, ",$1");
                            
                              if (saldo.length > 6) {
                                saldo = saldo.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                              }
                            
                              elemento.value = saldo;
                            }      
                  </script>
@stop
