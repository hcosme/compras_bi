@extends('adminlte::page')
<meta http-equiv="Content-Type" content="text/html; charset=WIN1252">
@section('title', 'Report')

@section('content_header')

  
@stop

@section('content')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Faturado'],
          <?php 
            if ($d['faturamento'] > 0) {
              foreach($d['faturamento'] as $key => $dados) {
                echo '["'.$dados->DIAFAT.'",'.$dados->PRECO.'],';
              }
            } else {
              echo '[0,0]';
            }

          ?>
         
        ]);

         var view = new google.visualization.DataView(data);
    /*  view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
*/

        var options = {
           pointShape: 'diamond',
             trendlines: {
            0: {
              labelInLegend: 'Faturado line',
              visibleInLegend: true,
            }
          },
          colors: ['#48D1CC', '#48D1CC'],
         // title : 'Informação de Faturamento (Real Time)',
          vAxis: {
          //  title: 'valor'
          },
          isStacked: true,
          hAxis: {
            side: 'top',
            title: 'dia'
          },
        
          seriesType: 'line',
          is3D: true,
          series: {0: {type: 'bars'}},
          bar: {groupWidth: "90%"},
          legend: 'none',//{position: 'top', maxLines: 8},
          backgroundColor: 
          {
            fill:'white'        
          }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


    </script>
  </head>
  <body>
  
  </body>
 <!-- <div id="chart_div1"></div> -->
                         <div class="card-body">
<div class="row">

          <div class="col-8 col-sm-12 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-olive elevation-1"><i class="fa fa-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Meta</span>
                <span class="info-box-number">
                  @foreach($d['meta'] as $dados)
                    {{ 'R$ '.number_format($dados->META, 2, ',', '.') }}
                    @endforeach 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-8 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              
                <?php 
                  if (!empty($d['total_faturamento'])) {
                    $faturado = $d['total_faturamento'][0]->PRECO;
                  } else {
                    $faturado = 0;
                  }
             
                  $meta = $d['meta'][0]->META;
                  $diasUteis = 22; //$d['dias_uteis'][0]->DIAS;
                  $metaDia = $meta / $diasUteis;
                  $diasCorridos = $d['dias_corridos'];
                  $metaMomento = $metaDia * $diasCorridos;
          
                  if ($faturado >= $metaMomento) {
                    echo '<span class="info-box-icon bg-success elevation-1">
                          <i class="fas fa-thumbs-up"></i>';
                  } else {
                     echo '<span class="info-box-icon bg-danger elevation-1">
                            <i class="fa fa-exclamation-triangle"></i>';
                  }

                ?></span>

              <div class="info-box-content">
                <span class="info-box-text">Faturado</span>
                <span class="info-box-number">
                   <?php 
                  if (!empty($d['total_faturamento'])) {

                      echo 'R$ '.number_format($d['total_faturamento'][0]->PRECO, 2, ',', '.');
                   
                   
                  } else {
                    echo 'R$ '.number_format(0, 2, ',', '.');
                  }


                   ?>

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-8 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-hourglass-start"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Em produção</span>
                <span class="info-box-number">
                        {{ 'R$ '.number_format($d['libera_os'], 2, ',', '.') }} <br>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-8 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Aguarda Faturamento</span>
                <span class="info-box-number">  {{ 'R$ '.number_format($d['liberado_faturamento'][0]->VALOR, 2, ',', '.') }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="clearfix hidden-md-up"></div>

          <div class="col-8 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <?php 
              if ($d['total_saldo'] > 0) {
                echo '<span class="info-box-icon bg-success elevation-1"><i class="fa fa-smile"></i></span>';
              } else {
                echo '<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-frown"></i></span>';
              }
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Resultado</span>
                <span class="info-box-number">{{ 'R$ '.number_format($d['total_saldo'], 2, ',', '.') }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
                 <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
       
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
      <div class="card-header">
          <center>   <h4 id="tip">Faturamento acumulado (<?php 
                if (request()->inicio == '' || request()->fim == '' ) {
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime('%b de %Y', strtotime('today'));
                 } else {
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime('%b de %Y', strtotime(request()->inicio));
                 }

            ?>)</h4><p>

                 <?php 
                 if (request()->inicio == '' || request()->fim == '' ) {
                    $dataInicial = '01/'.date('m/Y');
                    $dataAtual = date('d/m/Y');
                    $mesAtual = date('m/Y');
                 } else {
                    $dataInicial = date('d/m/Y', strtotime(request()->inicio));
                    $dataAtual = date('d/m/Y', strtotime(request()->fim));
                    $mesAtual = date('m/Y', strtotime(request()->inicio));;
                 }

                   // $mesAtual = date('m/Y');
                    echo 'Data entre '.$dataInicial.' e '.$dataAtual.'*(*Data atual)'
                    ;?> </center><br>
                    <div id="chart_div" style="width: 1190px; height: 250px;"></div><br>
    <div class="box-body table-responsive no-padding">
    <table id="" class="table table-sm table-striped">
        <thead>
            <tr class="bg-primary text-center py-0 align-middle ">
                <th><center>Dia</th>
                <th><center>Faturado</th>
                <th><center>Faturamento acumulado</th>
                <th><center>Meta</th>
            </tr>
        </thead>
        <tbody>
            <?php
                  if (!empty($d['total_faturamento'])) {
                    $faturado = $d['total_faturamento'][0]->PRECO;
                  } else {
                    $faturado = 0;
                  }

                   if (!empty($d['faturamento'])) {
                    $diasTrabalhados = count($d['faturamento']);
                  } else {
                    $diasTrabalhados = 0;
                  }

                //  $diasTrabalhados = count($d['faturamento']);
                  $meta = $d['meta'][0]->META;
                  $diasUteis = 22;//$d['dias_uteis'][0]->DIAS;
                 // dd($diasUteis);
                  $metaDia = $meta / $diasUteis;
                  $diasCorridos = $d['dias_corridos'];
                  $metaMomento = $metaDia * $diasCorridos;
                  $sum = 0;
                  $meta = 0;
                  if (!empty($d['faturamento'])) {  
                  foreach($d['faturamento'] as $key => $dados) {
                    $sum += $dados->PRECO;
                    $meta += $metaDia;
                     echo '<tr>'; 
                     if ($dados->PRECO <= $metaDia) {
                      echo '<td><center><FONT COLOR="#FF0000">'.$dados->DIAFAT.'/'.$dados->MESFAT.'/'.$dados->ANOFAT.'</FONT></td>';
                     } else {
                      echo '<td><center><FONT COLOR="">'.$dados->DIAFAT.'/'.$dados->MESFAT.'/'.$dados->ANOFAT.'</FONT></td>';
                     }
                      if ($dados->PRECO <= $metaDia) {
                        echo '<td><center><FONT COLOR="#FF0000">R$ '.number_format($dados->PRECO, 2, ',', '.').'</FONT></td>';
                      } else {
                        echo '<td><center><FONT COLOR="">R$ '.number_format($dados->PRECO, 2, ',', '.').'</FONT></td>';
                      }
                      if ($dados->PRECO <= $metaDia) {
                     echo '<td><center><FONT COLOR="#FF0000">R$ '.number_format($sum, 2, ',', '.').'</FONT></td>';
                      } else {
                     echo '<td><center><FONT COLOR="">R$ '.number_format($sum, 2, ',', '.').'</FONT></td>';

                      }
                      if ($dados->PRECO <= $metaDia) {
                     echo '<td><center><FONT COLOR="#FF0000">R$ '.number_format($meta, 2, ',', '.').'</FONT></td>';
                      } else {
                     echo '<td><center><FONT COLOR="">R$ '.number_format($meta, 2, ',', '.').'</FONT></td>';

                      }
                    // echo '<td><center></td>';
                  }
                }

                ?>
            </tr>
        </tbody>
    </table>
              </div>
              <br>
              <!-- /.card-body -->
              </div>
              </div>
              </div>

 <div class="card">
                <div class="card-body">
      <div class="card-header">
        <center> <h4 id="tip">Aguardando Faturamento</h4><p></center>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-primary text-center py-0 align-middle">
                <th><center>Cliente</th>
                <th><center>OS.</th>
                <th><center>Saldo</th>
                <th><center>Quant.</th>
                <th><center>Título</th>
            </tr>
        </thead>
        <tbody>
             @foreach($d['oslib'] as $dados)
            <tr>
                 <td><?php if ($dados->CCLIENTE == ''){
                            echo '*****';
                        } else {
                            echo mb_convert_encoding(substr($dados->CCLIENTE,0,19), "UTF-8", "Windows-1252");
                        }
                    ?></td>
                 <td><center>{{ intVal($dados->CNPO) }}</td>
                 <td><center>{{  'R$ '.number_format($dados->CPFINAL, 2, ',', '.') }}</td>
                    <td><center>{{ number_format($dados->CQUANT, 0, ',', '.') }}</td>
                          <td><?php if ($dados->CREF == ''){
                            echo '*****';
                        } else {
                            echo substr($dados->CREF,0,19).'...';
                        }
                    ?></td>
    @endforeach
            </tr>
        </tbody>
    </table>
              </div>
              <!-- /.card-body -->
            </div>
     </div>
            </div>
     </div>
    </div>

<div class="card-body">
<div class="row">
<p>
  <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Filtro
  </a>
</p>
 </div>

<div class="collapse" id="collapseExample">

   <form role="form" method="get" action="">
                <div class="row">
                  <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Início:</label>
                  <input type="date" class="form-control form-control-sm" name="inicio" id="inicio" value="" data-toggle="tooltip" data-placement="top" title="Selecione o dia que deseja trazer os resultados." >
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Fim:</label>
                  <input type="date" class="form-control form-control-sm" name="fim" id="fechamento" value="">
                </div> 
                    <input type="submit" class="btn btn-link" value="Filtrar"> 
                </div>
                        </form>
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