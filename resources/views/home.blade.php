@extends('adminlte::page')

@section('title', 'Início')
<meta http-equiv="refresh" content="180">
@section('content_header')
    <h1 class="m-0 text-dark">Monitoramento Materiais <a href="./send-email" type="button" class="btn btn-light swalDefaultSuccess">
                  Reportar situação do estoque
                </a> </h1>
@stop
<?php //dd($dados);?>
@section('content')
@if (Session::has('success'))
   <div class="alert alert-success" role="alert">
        <ul>
            {{ Session::get('success') }}
        </ul>
    </div>
@endif

<blockquote class="quote-info">
  <h5 id="tip">Orientações!</h5>
  <p>Os dados são atualizados online. A página será atualizada a cada 2 minutos. 
</p>
</blockquote>
    <div class="card-body">

<div class="row">

          <div class="col-8 col-sm-12 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-exclamation-triangle"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Estoque zero</span>
                <span class="info-box-number">
                {{ $dados['em_falta'] }}
                  <small></small>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-exclamation-triangle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Disponível (Abaixo do Mínimo)</span>
                <span class="info-box-number">
                        {{  $dados['disponivel'] }} <br>
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
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-truck"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-number">  {{  ($dados['em_falta'] + $dados['disponivel']) }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
    <!--        
<div class="card">
      <div class="card-header">
       <h4 id="tip">Overview Online</h4><p>
              <div class="card-body table-responsive p-0">
                <table class="table table-sm table-striped table-hover">
                  <thead>
                   <tr class="bg-primary text-center py-0 align-middle ">
                    <th>Report</th>
                    <th>Descrição</th>
                    <th>Total</th>
                    <th>% percentual</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      Itens em falta no estoque
                    </td>
                       <td>
                      Soma do mínimo de todos os itens com quantidade igual à 0 no estoque.
                    </td>
                    <td>{{ $dados['em_falta'] }}</td>
                    <td>
                  <!--    <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        {{ round((($dados['em_falta']/($dados['em_falta']+$dados['disponivel']))*100),2).'%' }}
                       
                      </small> -->
                
              <!--      </td>
                   
                  </tr>
                  <tr>
                    <td>
                      Itens disponíveis no estoque
                    </td>
                       <td>
                       Soma do estoque de todos os itens com quantidade igual à maior que 0.
                    </td>
                     <td>{{ $dados['disponivel'] }}</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fa fa-arrow-up"></i>
                       {{ round((($dados['disponivel']/($dados['em_falta']+$dados['disponivel']))*100),2).'%' }}
                      </small>
                     
                    </td>
                   
                  </tr>
               <!--   <tr>
                    <td>
                      Total de itens no estoque
                    </td>
                       <td>
                      Contagem unitária de itens no estoque (considerando por tipo de item). 
                    </td>
                     <td>{{ ($dados['total']) }}</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fa fa-truck"></i>
                        -
                      </small>
                      
                    </td>
                   
                  </tr>
                  -->
              <!--      </tbody>
                </table>
              </div>
      </div>
</div>-->
<br>
<div class="card">
      <div class="card-header">
              <h4 id="tip">Itens igual ou abaixo do mínimo</h4><p>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                          <th><center>Código</th>
                          <th><center>Item</th>
                          <th><center>Tipo</th>
                          <th><center>Mínimo</th>
                          <th><center>Estoque</th>
                          <th><center>Reposição estoque</th>
                          <th><center>% disponível</th>
                          <th><center>Reposição?</th>
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['dados'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','�'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
                } else{
                  echo '*****';
                }
              ?></td>
              <td><center>{{ $itens->CNOME }}</td>
              <td><center>{{ number_format($itens->MINIMO, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->CESTATUAL, 0, ',', '.') }}</td>
               <td><center>
                 <?php 

                    if ($itens->CESTATUAL >= $itens->MINIMO || $itens->CESTATUAL == $itens->MINIMO) {
                         echo '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
          <td>
            <div class="progress progress-xs">
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<div class="progress-bar progress-bar-danger" style="width: 100%"><span class="badge bg-danger">'.$percent.'%</span></div>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<div class="progress-bar progress-bar-warning" style="width: '.$percent.'%"><span class="badge bg-warning">'.$percent.'%</span></div>';
              } else {
                  echo '<div class="progress-bar progress-bar-success" style="width: '.$percent.'%"><span class="badge bg-success">'.$percent.'%</span></div>';
              }
              
              ?>
        
            </div>
          </td>
        <td><center>
        <?php 
            if ($itens->CESTATUAL < $itens->MINIMO) {
                echo '<span class="badge bg-danger">Sim</span>'; 
            } else {
                echo '<span class="badge bg-success">Não</span>';
            }
        ?></td>
          
        </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

     </div>


    </div>
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
          "order": [[ 0, "desc" ]],
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
      $('#minhaTabela1').DataTable({
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
  
  
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Reportado com sucesso para a lista de destinatários cadastrados no sistema.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        type: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        type: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });


  </script>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Chapa', 80],
          ['Papel', 55],
          ['Tinta', 68]
        ]);

        var options = {
          width: 800, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>


@stop

    @push('styles')
    divBotao{
         float:right
    }
@endpush

@stop


