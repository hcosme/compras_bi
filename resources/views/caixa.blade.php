@extends('adminlte::page')

@section('title', 'Fluxo de caixa')

@section('content_header')

  
@stop

@section('content')

   <div class="card-body">

<div class="row">
          <div class="col-8 col-sm-12 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-olive elevation-1"><i class="fa fa-check"></i></span>

              <div class="info-box-content"> <?php //dd($d);?>
                <span class="info-box-text">Disponibilidade</span>
                <span class="info-box-number">
                {{ 'R$ '.number_format($d['total_saldo'][0]->SALDO, 2, ',', '.') }}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           </div>
          
          </div>


                         <div class="card-body">
Fluxo de caixa +07 Dias
<div class="row">
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-share"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">A pagar</span>
                <span class="info-box-number">
                  {{ 'R$ '.number_format($d['total_apagar7'][0]->VALORTOTAL, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-hourglass-start"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">A Receber</span>
                <span class="info-box-number">
                     {{ 'R$ '.number_format($d['total_areceber7'][0]->VALORR, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <?php 
              if ($d['saldo_caixa7'] > 0) {
                echo '<span class="info-box-icon bg-success elevation-1"><i class="fa fa-smile"></i></span>';
              } else {
                echo '<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-frown"></i></span>';

              }
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">  {{ 'R$ '.number_format($d['saldo_caixa7'], 2, ',', '.') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          </div>
</div>


                         <div class="card-body">
Fluxo de caixa +14 Dias
<div class="row">
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-share"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">A pagar</span>
                <span class="info-box-number">
                  {{ 'R$ '.number_format($d['total_apagar14'][0]->VALORTOTAL, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-hourglass-start"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">A Receber</span>
                <span class="info-box-number">
                     {{ 'R$ '.number_format($d['total_areceber14'][0]->VALORR, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
               <?php 
              if ($d['saldo_caixa14'] > 0) {
                echo '<span class="info-box-icon bg-success elevation-1"><i class="fa fa-smile"></i></span>';
              } else {
                echo '<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-frown"></i></span>';

              }
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">  {{ 'R$ '.number_format($d['saldo_caixa14'], 2, ',', '.') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          </div>
</div>
                         <div class="card-body">
Fluxo de caixa +21 Dias
<div class="row">
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-share"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">A pagar</span>
                <span class="info-box-number">
                  {{ 'R$ '.number_format($d['total_apagar21'][0]->VALORTOTAL, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-hourglass-start"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">A Receber</span>
                <span class="info-box-number">
                     {{ 'R$ '.number_format($d['total_areceber21'][0]->VALORR, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <?php 
              if ($d['saldo_caixa21'] > 0) {
                echo '<span class="info-box-icon bg-success elevation-1"><i class="fa fa-smile"></i></span>';
              } else {
                echo '<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-frown"></i></span>';

              }
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">  {{ 'R$ '.number_format($d['saldo_caixa21'], 2, ',', '.') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          </div>
</div>

                         <div class="card-body">
Fluxo de caixa +28 Dias
<div class="row">
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-share"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">A pagar</span>
                <span class="info-box-number">
                  {{ 'R$ '.number_format($d['total_apagar28'][0]->VALORTOTAL, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-hourglass-start"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">A Receber</span>
                <span class="info-box-number">
                     {{ 'R$ '.number_format($d['total_areceber28'][0]->VALORR, 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-8 col-sm-6 col-md-4">
            <div class="info-box mb-3">
               <?php 
              if ($d['saldo_caixa28'] > 0) {
                echo '<span class="info-box-icon bg-success elevation-1"><i class="fa fa-smile"></i></span>';
              } else {
                echo '<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-frown"></i></span>';

              }
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Saldo</span>
                <span class="info-box-number">  {{ 'R$ '.number_format($d['saldo_caixa28'], 2, ',', '.') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          </div>
</div>

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
      <div class="card-header">
              <h4 id="tip">(*) Disponibilidades</h4><p>
     <div class="box-body table-responsive no-padding">

 <table id="minhaTabela2" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-primary text-center py-0 align-middle">
                <th><center>Nome Conta</th>
                <th><center>Agencia</th>
                <th><center>Conta</th>
                <th><center>Saldo</th>
                <th><center>Obs</th>
            </tr>
        </thead>
        <tbody>
           <?php
              foreach($d['saldo'] as $key => $dados) {
                if ($dados->NAGENCIA == '') {
                  $dados->NAGENCIA = '*****';
                  $dados->NCC = '*****';
                }
                 echo '<tr>';
                 echo '<td>'.$dados->CCONTA.'</td>';
                 echo '<td><center>'.$dados->NAGENCIA.'</td>';
                 echo '<td><center>'.$dados->NCC.'</td>';
                 echo '<td><center>R$ '.number_format($dados->CSALDO, 2, ',', '.').'</td>';
                 echo '<td><center>-</td>';
                 echo '</tr>';
              }
            ?>
        </tbody>
    </table>
   


  
              </div>

              <br>
              <!-- /.card-body -->


      

              </div>
              </div>
              </div>


<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
      <div class="card-header">
              <h4 id="tip">(*) À Pagar</h4> *Período de +28 dias.<p>
     <div class="box-body table-responsive no-padding">

 <table id="apagar" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-primary text-center py-0 align-middle">
                <th><center>Cliente</th>
                <th><center>Histórico</th>
                <th><center>Vencimento</th>
                <th><center>Valor</th>
            </tr>
        </thead>
        <tbody>
           <?php
           //dd($d['apagar']);
              foreach($d['apagar'] as $dados) {

                
                 echo '<tr>';
                 echo '<td>'.ucwords(strtolower(mb_convert_encoding(substr($dados->PROP,0,28), "UTF-8", "Windows-1252"))).'...</td>';
                 echo '<td>'.ucwords(strtolower(mb_convert_encoding(substr($dados->HISTORICO,0,28), "UTF-8", "Windows-1252"))).'...</td>';
                 echo '<td><center>'.date('d/m/Y', strtotime($dados->DATAVENC)).'</td>';
                 echo '<td><center>R$ '.number_format($dados->VALORREAL, 2, ',', '.').'</td>';
                 echo '</tr>';
              }
            ?>
        </tbody>
    </table>
   


  
              </div>

              <br>
              <!-- /.card-body -->


      

              </div>
              </div>
              </div>




<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
      <div class="card-header">
              <h4 id="tip">(*) À Receber</h4> *Período de +28 dias.<p>
     <div class="box-body table-responsive no-padding">

 <table id="areceber" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-primary text-center py-0 align-middle">
                <th><center>Cliente</th>
                <th><center>Histórico</th>
                <th><center>Vencimento</th>
                <th><center>Valor</th>
            </tr>
        </thead>
        <tbody>
           <?php
              foreach($d['areceber'] as $key => $dados) {
                 echo '<tr>';
                  echo '<td>'.ucwords(strtolower(mb_convert_encoding(substr($dados->PROP,0,28), "UTF-8", "Windows-1252"))).'...</td>';
                 echo '<td>'.ucwords(strtolower(mb_convert_encoding(substr($dados->HISTORICO,0,28), "UTF-8", "Windows-1252"))).'...</td>';
                 echo '<td><center>'.date('d/m/Y', strtotime($dados->DATAVENC)).'</td>';
                 echo '<td><center>R$ '.number_format($dados->VALORREAL, 2, ',', '.').'</td>';
                 echo '</tr>';
              }
            ?>
        </tbody>
    </table>
              </div>

              <br>
              <!-- /.card-body -->


      

              </div>
              </div>
              </div>






    </div>
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
      $('#minhaTabela2').DataTable({
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

   $(document).ready(function(){
      $('#apagar').DataTable({
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

    $(document).ready(function(){
      $('#areceber').DataTable({
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