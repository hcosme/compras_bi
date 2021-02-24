@extends('adminlte::page')

@section('title', 'Estoque')
<meta http-equiv="refresh" content="180">
<style>
   .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}

</style>
@section('content_header')
    <h1 class="m-0 text-dark">Monitoramento Materiais <a href="./send-email" type="button" class="btn btn-light swalDefaultSuccess">
                  Reportar
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
  <h5 id="tip">Alerta!</h5>
  <p>A pagina atualizara automaticamente a cada 2 minutos. 
</p>
</blockquote>  
<div class="card">
      <div class="card-header">
              <h4 id="tip">Tintas</h4> * Monitoramento de tintas.<p>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                          <th><center>Codigo</th>
                          <th><center>Item</th>
                          <th><center>Tipo</th>
                          <th><center>Minimo</th>
                          <th><center>Estoque</th>
                          <th><center>Repos. estoque</th>
                          <th><center>% disponivel</th>
                         <!-- <th><center>Reposição?</th> -->
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['tinta'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','?'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
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
                         echo '<small class="text-success mr-1 "><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1 blink_me"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
          <td>
            <div class="progress progress-xs">
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<div class="progress-bar progress-bar-danger blink_me" style="width: 100%"><span class="badge bg-danger">'.$percent.'%</span></div>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<div class="progress-bar progress-bar-warning" style="width: '.$percent.'%"><span class="badge bg-warning">'.$percent.'%</span></div>';
              } else {
                  echo '<div class="progress-bar progress-bar-success" style="width: '.$percent.'%"><span class="badge bg-success">'.$percent.'%</span></div>';
              }
              
              ?>
        
            </div>
          </td>
           <!--   <td><center>
        <?php 
          /*  if ($itens->CESTATUAL < $itens->MINIMO) {
                echo '<span class="badge bg-danger">Sim</span>'; 
            } else {
                echo '<span class="badge bg-success">Não</span>';
            } */
        ?></td> -->
          
        </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

     </div>

<br>

<div class="card">
      <div class="card-header">
              <h4 id="tip">Cartuchos</h4> * Monitoramento de cartuchos.<p>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela1" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                         <th><center>Codigo</th>
                          <th><center>Item</th>
                          <th><center>Tipo</th>
                          <th><center>Minimo</th>
                          <th><center>Estoque</th>
                          <th><center>Repos. estoque</th>
                          <th><center>% disponivel</th>
                         <!-- <th><center>Reposição?</th> -->
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['cartucho'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','?'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
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
                        echo '<small class="text-danger mr-1 blink_me"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
          <td>
            <div class="progress progress-xs">
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<div class="progress-bar progress-bar-danger blink_me" style="width: 100%"><span class="badge bg-danger">'.$percent.'%</span></div>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<div class="progress-bar progress-bar-warning" style="width: '.$percent.'%"><span class="badge bg-warning">'.$percent.'%</span></div>';
              } else {
                  echo '<div class="progress-bar progress-bar-success" style="width: '.$percent.'%"><span class="badge bg-success">'.$percent.'%</span></div>';
              }
              
              ?>
        
            </div>
          </td>
          <!--   <td><center>
        <?php 
          /*  if ($itens->CESTATUAL < $itens->MINIMO) {
                echo '<span class="badge bg-danger">Sim</span>'; 
            } else {
                echo '<span class="badge bg-success">Não</span>';
            } */
        ?></td> -->
          
        </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

     </div>

<br>
<div class="card">
      <div class="card-header">
                <h4 id="tip">Materiais Auxiliares</h4> * Itens igual ou abaixo do minimo.<p>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela2" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                           <th><center>Codigo</th>
                          <th><center>Item</th>
                          <th><center>Tipo</th>
                          <th><center>Minimo</th>
                          <th><center>Estoque</th>
                          <th><center>Repos. estoque</th>
                          <th><center>% disponivel</th>
                         <!-- <th><center>Reposição?</th> -->
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['matAux'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','?'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
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
                        echo '<small class="text-danger mr-1 blink_me"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
          <td>
            <div class="progress progress-xs">
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<div class="progress-bar progress-bar-danger blink_me" style="width: 100%"><span class="badge bg-danger">'.$percent.'%</span></div>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<div class="progress-bar progress-bar-warning" style="width: '.$percent.'%"><span class="badge bg-warning">'.$percent.'%</span></div>';
              } else {
                  echo '<div class="progress-bar progress-bar-success" style="width: '.$percent.'%"><span class="badge bg-success">'.$percent.'%</span></div>';
              }
              
              ?>
        
            </div>
          </td>
           <!--   <td><center>
        <?php 
          /*  if ($itens->CESTATUAL < $itens->MINIMO) {
                echo '<span class="badge bg-danger">Sim</span>'; 
            } else {
                echo '<span class="badge bg-success">Não</span>';
            } */
        ?></td> -->
          
        </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

     </div>
<br>
<div class="card">
      <div class="card-header">
              <h4 id="tip">Materiais de Limpezas</h4> * Itens igual ou abaixo do minimo.<p>
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela3" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                         <th><center>Codigo</th>
                          <th><center>Item</th>
                          <th><center>Tipo</th>
                          <th><center>Minimo</th>
                          <th><center>Estoque</th>
                          <th><center>Repos. estoque</th>
                          <th><center>% disponivel</th>
                         <!-- <th><center>Reposição?</th> -->
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['limpeza'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','?'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
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
                        echo '<small class="text-danger mr-1 blink_me"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
          <td>
            <div class="progress progress-xs">
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<div class="progress-bar progress-bar-danger blink_me" style="width: 100%"><span class="badge bg-danger">'.$percent.'%</span></div>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<div class="progress-bar progress-bar-warning" style="width: '.$percent.'%"><span class="badge bg-warning">'.$percent.'%</span></div>';
              } else {
                  echo '<div class="progress-bar progress-bar-success" style="width: '.$percent.'%"><span class="badge bg-success">'.$percent.'%</span></div>';
              }
              
              ?>
        
            </div>
          </td>
      <!--   <td><center>
        <?php 
          /*  if ($itens->CESTATUAL < $itens->MINIMO) {
                echo '<span class="badge bg-danger">Sim</span>'; 
            } else {
                echo '<span class="badge bg-success">Não</span>';
            } */
        ?></td> -->
          
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
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Ultima",
                    "next":       "Proxima",
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
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Ultima",
                    "next":       "Proxima",
                    "previous":   "Anterior"
                },
            }
        });
  });
  
    $(document).ready(function(){
      $('#minhaTabela2').DataTable({
          "order": [[ 0, "desc" ]],
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Ultima",
                    "next":       "Proxima",
                    "previous":   "Anterior"
                },
            }
        });
  });
  
    $(document).ready(function(){
      $('#minhaTabela3').DataTable({
          "order": [[ 0, "desc" ]],
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Ultima",
                    "next":       "Proxima",
                    "previous":   "Anterior"
                },
            }
        });
  });
  
    $(document).ready(function(){
      $('#minhaTabela4').DataTable({
          "order": [[ 0, "desc" ]],
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "search":         "Pesquisar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Ultima",
                    "next":       "Proxima",
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
        title: 'Reportado com sucesso para a lista de destinatarios cadastrados no sistema.'
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


