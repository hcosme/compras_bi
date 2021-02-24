@extends('adminlte::page')

@section('title', 'Estoque')
<meta http-equiv="refresh" content="180">
@section('content_header')

      <style>
/*

table thead{
    background: #084B8A;
    color: #FFF;
}

table tbody{
    background: #3498db;
    color: #FFF;
}

table thead tr td{
    padding: 5px;
    text-align: center;
}

table tbody tr td{
    padding: 5px;
} */
#circuloVerde {
width: 10px;
height: 10px;
border-radius: 50%;
background-color: #00FF00;
margin: 0px;
}

#circuloVermelho {
width: 10px;
height: 10px;
border-radius: 50%;
background-color: #FF0000;
margin: 0px;
}

#circuloAmarelo {
width: 10px;
height: 10px;
border-radius: 50%;
background-color: #FA5858 ;
margin: 0px;
}


       table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        border-color: #E6E6E6;
      } 
   .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>
    <h1 class="m-0 text-dark">Monitoramento Materiais </h1>
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
              <h4 id="tip">Requisicao ao almoxarifado.</h4> <p>
    <div class="box-body table-responsive no-padding">
    <table id="" class="table table-sm table-striped table-hover dataTable">
                  <thead>
                       <tr class="bg-primary text-center py-0 align-middle ">
                          <th><center>Codigo</th>
                          <th><center>Item</th>
                          <th><center>Data</th>
                          <th><center>Quantidade</th>
                          <th><center>Quantidade Estoque</th>
						  <th><center>Saldo</th>
                          <th><center>Status</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($dados['requisicao'] as $itens)
        <tr>
          <td>{{ ucwords(strtolower($itens->CODIGO)) }}</td>
          <td><?php //dd($itens->ITEM);
                if ($itens->ITEM != '') {
                  echo ucwords(strtolower(mb_convert_encoding(substr(str_replace(['º','ª','?'],'',$itens->ITEM),0,28), "UTF-8", "Windows-1252")));
                } else{
                  echo '*****';
                }
              ?></td>
              <td><center>{{ $itens->DATA }}</td>
              <td><center>{{ number_format($itens->QUANTIDADE, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->ESTOQUE, 0, ',', '.') }}</td>
              <td><center>{{ number_format(($itens->ESTOQUE - $itens->QUANTIDADE), 0, ',', '.') }}</td>
          <td ><center>
        <?php 

           if (($itens->ESTOQUE - $itens->QUANTIDADE) > 0) {
                echo '<div class="blink_me" id="circuloVerde">';
              } else {
                  echo '<div class="blink_me" id="circuloVermelho">';
              }

        ?></td>
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


