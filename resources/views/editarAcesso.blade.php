{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Acesso')

@section('content_header')
    <h1>Editar de acesso</h1>
@stop
<?php //dd($acesso);?>
@section('content')
    <p><b>Atenção!</b> Para que os acessos sejam mantidos altamente seguros, não será exibido a senha atual.</p>
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
                  <input type="text" class="form-control" name="id" value="{{ $acesso->id }}" readonly>
                </div>
                
                  <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" name="name" value="{{ $acesso->name }}" readonly="">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">Senha</label>
                  <input type="password" class="form-control" name="password" value="<?php echo $acesso->password;?>" required>
                </div>
                </div>
                  <br>
                 
                  <h5>Telas</h5>
                <hr>
                 <div class="row">
                 <div class="form-check">
                <div class="form-group col-md-12" required>
                  <label>Almoxarifado</label>
                  <select name="almoxarifado" class="form-control">
                   <option value="<?php if ($acesso->almoxarifado == 1) { echo $acesso->almoxarifado;} ?>"><?php if ($acesso->almoxarifado == 1) { echo 'Ativo';} else { echo 'Inativo';} ?></option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
                           </div>
                           
             <div class="form-check">
                <div class="form-group col-md-12" required>
                  <label>Financeiro</label>
                  <select name="financeiro" class="form-control">
                  <option value="<?php if ($acesso->financeiro == 1) { echo $acesso->financeiro;} ?>"><?php if ($acesso->financeiro == 1) { echo 'Ativo';} else { echo 'Inativo';} ?></option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
                           
                      </div>        
                    
                         <br>
                       </div> <br>
                
<br><br>
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
@stop
