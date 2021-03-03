{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Walprint')
<meta http-equiv="refresh" content="180">
@section('content_header')
    <h1 class="m-0 text-dark">Controle Financeiro <a href="#" type="button" class="btn btn-light swalDefaultSuccess">
                  Reportar
                </a> </h1>
@stop

@section('content')
@if (\Session::has('warning'))
    <div class="alert alert-info">
        {!! \Session::get('warning') !!}</li>
    </div>
@endif
      <style>
  table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        border-color: #E6E6E6;
      } 
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


   .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>
<blockquote class="quote-dark">
  <h5 id="tip">Alerta!</h5>
  <p>A pagina atualizara automaticamente a cada 2 minutos. 
</p>
</blockquote>  

 <div class="card">
                <div class="card-body">
      <div class="card-header">
       <h4 id="tip">À receber x à pagar <b>(D0 | W0)</b> </h4><p> Guia para visualizar o que tem a receber e pagar hoje e os demais dias da semana.</center>
    <hr>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample4">
    Visualizar resultado
  </a>
 
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   

          <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead class="thead-">
 <tr class="bg-info text-center py-0 align-middle">
                <th style=" background-color:#6A5ACD;color:white;width:200px"><center>Indicativo </th>
                <th style="background-color:#6A5ACD;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#6A5ACD;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#6A5ACD;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#6A5ACD;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#6A5ACD;color:white;width:180px"><center>Total</th>
            </tr>
        </thead>
        <tbody>
            
           <tr class="bg- text-center py-0 align-middle">
                <td><?php echo 'Limites';?></td>
                <td><?php echo 'R$ '.number_format($d['total_limite_cl'][0]->VALORR, 2, ',', '.');?></td>
                <td><?php echo 'R$ '.number_format($d['total_limite_gf'][0]->VALORR, 2, ',', '.');?></td>
                <td><?php echo 'R$ '.number_format($d['total_limite_ic'][0]->VALORR, 2, ',', '.');?></td>
                <td><?php echo 'R$ '.number_format($d['total_limite_wp'][0]->VALORR, 2, ',', '.');?></td>
                <td><?php echo 'R$ '.number_format($d['total_limite'][0]->VALORR, 2, ',', '.');?></td>
            </tr>
           <tr class="bg- text-center py-0 align-middle">
                <td><?php echo 'Saldos';?></td>
                  <td><?php echo 'R$ '.number_format($d['total_saldo_cl'][0]->VALORR, 2, ',', '.');?></td>
                  <td><?php echo 'R$ '.number_format($d['total_saldo_gf'][0]->VALORR, 2, ',', '.');?></td>
                  <td><?php echo 'R$ '.number_format($d['total_saldo_ic'][0]->VALORR, 2, ',', '.');?></td>
                  <td><?php echo 'R$ '.number_format($d['total_saldo_wp'][0]->VALORR, 2, ',', '.');?></td>
                  <td><?php echo 'R$ '.number_format($d['total_saldo'][0]->VALORR, 2, ',', '.');?></td>
            </tr>
        </tbody>
    </table>
<br>
   <h4 id="tip"><b>À receber </b> - <font color="red">D0 + W0</font></h4></center>
    <hr>
    <div class="box-body table-responsive no-padding">
    <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
               <th style="background-color:#836FFF;color:white;width:200px"><center>À Receber </th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#836FFF;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><center><?php echo 'À receber '.date('d/M');?></td>
                <td><center>
                  <?php 
                    if ($d['total_areceber_hoje_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_hoje_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['total_areceber_hoje_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['total_areceber_hoje_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['total_areceber_hoje_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_hoje_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['total_areceber_hoje_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_hoje_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['total_areceber_hoje_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['total_areceber_hoje_cl'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_hoje_gf'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['total_areceber_hoje_gf'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_hoje_ic'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['total_areceber_hoje_ic'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_hoje_wp'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['total_areceber_hoje_wp'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
             <tr>    <td><center><?php 
                   $diaHoje = date('d')+01;
            $mes = date('M');
            $ano = date('Y');
            if ($diaHoje < 10) {
                $diaHoje = '0'.$diaHoje;
            }
            $amanha = $diaHoje.'/'.$mes;

             echo 'À Receber '.$amanha.' à '.date('d/M', strtotime($d['sextaFeira'][0]->fimP));?></td>
                 <td><center>
                  <?php 
                    if ($d['total_areceber_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['total_areceber_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['total_areceber_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['total_areceber_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['total_areceber_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['total_areceber_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['total_areceber_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_semana_gf'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['total_areceber_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_semana_ic'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['total_areceber_semana_ic'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_semana_wp'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['total_areceber_semana_wp'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
                                 
            </tr>
              <tr class="bg- text-center py-0 align-middle">
                 <td scope="col"> <b>Total</td>
                  <td style="background-color:#;"><center> <b>
                  <?php 
                    if ($d['total_areceber_tsemana_cl'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_tsemana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center> <b>
                  <?php 
                    if ($d['total_areceber_tsemana_gf'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_tsemana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                 <td><center> <b>
                  <?php 
                    if ($d['total_areceber_tsemana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_tsemana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                 <td><center> <b>
                  <?php 
                    if ($d['total_areceber_tsemana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_areceber_tsemana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                 <td><center> <b>
                   <?php 
                      if (!isset($d['total_areceber_tsemana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['total_areceber_tsemana_cl'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_tsemana_gf'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['total_areceber_tsemana_gf'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_tsemana_ic'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['total_areceber_tsemana_ic'][0]->VALORR;
                      }

                        if (!isset($d['total_areceber_tsemana_wp'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['total_areceber_tsemana_wp'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>

                 </td>
            </tr>

        </tbody>
    </table>

<br>
   <h4 id="tip"><b>À pagar </b> - <font color="red">D0 + W0</font></h4><p></center><hr>
 <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
              <th style="background-color:#836FFF;color:white;width:200px"><center>À Pagar </th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#836FFF;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
             <tr>
                <td><center><?php echo 'À Pagar '.date('d/M');?></td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_hoje_cl'][0]->VALORR)) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_hoje_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_hoje_gf'][0]->VALORR)) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['total_apagar_hoje_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_hoje_ic'][0]->VALORR)) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_hoje_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_hoje_wp'][0]->VALORR)) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_hoje_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['total_apagar_hoje_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['total_apagar_hoje_cl'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_hoje_gf'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['total_apagar_hoje_gf'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_hoje_ic'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['total_apagar_hoje_ic'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_hoje_wp'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['total_apagar_hoje_wp'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
                 <tr>
                 <td><center><?php 
                   $diaHoje = date('d')+01;
            $mes = date('M');
            $ano = date('Y');
            if ($diaHoje < 10) {
                $diaHoje = '0'.$diaHoje;
            }
            $amanha = $diaHoje.'/'.$mes;

             echo 'À Receber '.$amanha.' à '.date('d/M', strtotime($d['sextaFeira'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_semana_cl'][0]->VALORR)) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_semana_gf'][0]->VALORR)) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['total_apagar_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_semana_ic'][0]->VALORR)) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if (!isset($d['total_apagar_semana_wp'][0]->VALORR)) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['total_apagar_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['total_apagar_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['total_apagar_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_semana_gf'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['total_apagar_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_semana_ic'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['total_apagar_semana_ic'][0]->VALORR;
                      }

                        if (!isset($d['total_apagar_semana_wp'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['total_apagar_semana_wp'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
                                 
            </tr>
             <tr class="bg- text-center py-0 align-middle">
                 <td> <b>Total</td>
                  <td><center> <b>
                  <?php 
                      echo 'R$ '.number_format(($d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                  <td><center> <b>
                  <?php 
                      echo 'R$ '.number_format(($d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                 <td><center> <b>
                  <?php 
                        echo 'R$ '.number_format(($d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                 <td><center> <b>
                  <?php 
                         echo 'R$ '.number_format(($d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                 <td><center> <b>
                   <?php 
                      $cl = $d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR;
                      $gf = $d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR;
                      $ic = $d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR;
                      $wp = $d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR;
                      echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>

                 </td>
            </tr>
        </tbody>
    </table>
    <br>
         <h4 id="tip">Resultado semana </h4>* <b>Memória de cálculo: </b><i>((saldo + à receber) - à pagar)</i> <p></center>
    <hr>
 <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
                <th style="background-color:#836FFF;color:white;width:200px"><center>Diferença </th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#836FFF;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#836FFF;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td><center><?php echo 'Resultado da semana';?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_cl'][0]->VALORR+$d['total_areceber_hoje_cl'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_cl'][0]->VALORR;
                        $resultado = ($ClAreceber + $Clsaldo) - $clApagar;
                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }


                 ?></td>
                  <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_gf'][0]->VALORR+$d['total_areceber_hoje_gf'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_gf'][0]->VALORR;
                        $resultado = ($ClAreceber + $Clsaldo) - $clApagar;
                        if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }


                 ?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_ic'][0]->VALORR+$d['total_areceber_hoje_ic'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_ic'][0]->VALORR;
                        $resultado = ($ClAreceber + $Clsaldo) - $clApagar;
                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }



                 ?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_wp'][0]->VALORR+$d['total_areceber_hoje_wp'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_cl'][0]->VALORR;
                        $resultado = ($ClAreceber + $Clsaldo) - $clApagar;
                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }



                 ?></td>

                  <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR
                        +$d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR
                        +$d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR
                        +$d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR
                        ;
                        $ClAreceber = $d['total_areceber_semana_wp'][0]->VALORR+$d['total_areceber_hoje_wp'][0]->VALORR
                        +$d['total_areceber_semana_cl'][0]->VALORR+$d['total_areceber_hoje_cl'][0]->VALORR
                        +$d['total_areceber_semana_ic'][0]->VALORR+$d['total_areceber_hoje_ic'][0]->VALORR
                        +$d['total_areceber_semana_gf'][0]->VALORR+$d['total_areceber_hoje_gf'][0]->VALORR;
                        $Clsaldo = $d['total_saldo'][0]->VALORR;
                        $resultado = ($ClAreceber + $Clsaldo) - $clApagar;
                        if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }



                 ?></td>
                
            </tr>
        </tbody>
    </table>
 
  </div>
</div>
              </div>
              <!-- /.card-body -->
            </div>

         <!-- /.card-body -->
            </div>         <!-- /.card-body -->
            </div>

<!-- INICIO DAS SEMANAS DO MÊS -->

 <div class="card">
                <div class="card-body">
      <div class="card-header">
           <h4 id="tip">A receber x A pagar <b>(W +4)</b> </h4><p>
            Guia para visualizar o que tem a receber e pagar das quatros próximas semanas.</center>
    <hr>
    <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
    Visualizar resultado
  </a>
 
</p>
<div class="collapse" id="collapseExample2">
  <div class="card card-body">
   
   <h4 id="tip"><b>À receber </b> - <font color="red">W +4</font></h4><p></center>
    <hr>
    <div class="box-body table-responsive no-padding">
    <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
               <th style="background-color:#483D8B;color:white;width:200px"><center>À Receber </th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#483D8B;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><center><?php echo 'À receber de '.date('d/M', strtotime($d['semana1'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana1'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['wtotal_areceber_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_areceber_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['wtotal_areceber_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['wtotal_areceber_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['wtotal_areceber_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_areceber_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['wtotal_areceber_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_areceber_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['wtotal_areceber_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['wtotal_areceber_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_areceber_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['wtotal_areceber_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_areceber_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['wtotal_areceber_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_areceber_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['wtotal_areceber_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
             <tr>
                <td><center><?php echo 'À receber de '.date('d/M', strtotime($d['semana2'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana2'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w2total_areceber_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_areceber_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w2total_areceber_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w2total_areceber_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w2total_areceber_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_areceber_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w2total_areceber_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_areceber_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w2total_areceber_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w2total_areceber_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w2total_areceber_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w2total_areceber_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w2total_areceber_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w2total_areceber_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w2total_areceber_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w2total_areceber_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr> 
                         <tr>
                <td><center><?php echo 'À receber de '.date('d/M', strtotime($d['semana3'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana3'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w3total_areceber_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_areceber_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w3total_areceber_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w3total_areceber_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w3total_areceber_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_areceber_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w3total_areceber_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_areceber_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w3total_areceber_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w3total_areceber_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w3total_areceber_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w3total_areceber_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w3total_areceber_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w3total_areceber_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w3total_areceber_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w3total_areceber_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr> 

                       <tr>
                <td><center><?php echo 'À receber de '.date('d/M', strtotime($d['semana4'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana4'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w4total_areceber_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_areceber_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w4total_areceber_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w4total_areceber_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w4total_areceber_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_areceber_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w4total_areceber_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_areceber_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w4total_areceber_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w4total_areceber_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w4total_areceber_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w4total_areceber_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w4total_areceber_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w4total_areceber_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w4total_areceber_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w4total_areceber_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr> 

                     <tr>
                <td><b><center><?php echo 'Total ';?></td>
                <td><center><b>
                  <?php 
                      echo 'R$ '.number_format(($d['wtotal_areceber_semana_cl'][0]->VALORR
                      + $d['w2total_areceber_semana_cl'][0]->VALORR
                      + $d['w3total_areceber_semana_cl'][0]->VALORR
                      + $d['w4total_areceber_semana_cl'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>

                <td><center><b>
       
                     <?php 
                      echo 'R$ '.number_format(($d['wtotal_areceber_semana_gf'][0]->VALORR
                      + $d['w2total_areceber_semana_gf'][0]->VALORR
                      + $d['w3total_areceber_semana_gf'][0]->VALORR
                      + $d['w4total_areceber_semana_gf'][0]->VALORR), 2, ',', '.');
                  ?>
         
                </td>
                <td><center><b>
                   <?php 
                      echo 'R$ '.number_format(($d['wtotal_areceber_semana_ic'][0]->VALORR
                      + $d['w2total_areceber_semana_ic'][0]->VALORR
                      + $d['w3total_areceber_semana_ic'][0]->VALORR
                      + $d['w4total_areceber_semana_ic'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                <td><center><b>
                           <?php 
                      echo 'R$ '.number_format(($d['wtotal_areceber_semana_wp'][0]->VALORR
                      + $d['w2total_areceber_semana_wp'][0]->VALORR
                      + $d['w3total_areceber_semana_wp'][0]->VALORR
                      + $d['w4total_areceber_semana_wp'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                  <td><center><b>
                  <?php 
                     $cl = ($d['w4total_areceber_semana_cl'][0]->VALORR
                          +$d['w3total_areceber_semana_cl'][0]->VALORR
                          +$d['w2total_areceber_semana_cl'][0]->VALORR
                          +$d['wtotal_areceber_semana_cl'][0]->VALORR);

                     $gf = ($d['w4total_areceber_semana_gf'][0]->VALORR
                          +$d['w3total_areceber_semana_gf'][0]->VALORR
                          +$d['w2total_areceber_semana_gf'][0]->VALORR
                          +$d['wtotal_areceber_semana_gf'][0]->VALORR);

                     $ic = ($d['w4total_areceber_semana_ic'][0]->VALORR
                          +$d['w3total_areceber_semana_ic'][0]->VALORR
                          +$d['w2total_areceber_semana_ic'][0]->VALORR
                          +$d['wtotal_areceber_semana_ic'][0]->VALORR);

                     $wp =  ($d['w4total_areceber_semana_wp'][0]->VALORR
                          +$d['w3total_areceber_semana_wp'][0]->VALORR
                          +$d['w2total_areceber_semana_wp'][0]->VALORR
                          +$d['wtotal_areceber_semana_wp'][0]->VALORR);
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr> 


        </tbody>
    </table>

<br>
   <h4 id="tip"><b>À pagar </b> - <font color="red">W +4</font></h4><p></center><hr>
 <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
              <th style="background-color:#483D8B;color:white;width:200px"><center>À Pagar </th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#483D8B;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
             <tr>
                <td><center><?php echo 'À pagar de '.date('d/M', strtotime($d['semana1'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana1'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['wtotal_apagar_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_apagar_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['wtotal_apagar_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['wtotal_apagar_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['wtotal_apagar_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_apagar_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['wtotal_apagar_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['wtotal_apagar_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['wtotal_apagar_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['wtotal_apagar_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_apagar_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['wtotal_apagar_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_apagar_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['wtotal_apagar_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['wtotal_apagar_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['wtotal_apagar_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
                          <tr>
                <td><center><?php echo 'À pagar de '.date('d/M', strtotime($d['semana2'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana2'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w2total_apagar_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_apagar_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w2total_apagar_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w2total_apagar_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w2total_apagar_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_apagar_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w2total_apagar_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w2total_apagar_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w2total_apagar_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w2total_apagar_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w2total_apagar_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w2total_apagar_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w2total_apagar_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w2total_apagar_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w2total_apagar_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w2total_apagar_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>

                   <tr>
                <td><center><?php echo 'À pagar de '.date('d/M', strtotime($d['semana3'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana3'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w3total_apagar_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_apagar_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w3total_apagar_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w3total_apagar_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w3total_apagar_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_apagar_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w3total_apagar_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w3total_apagar_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w3total_apagar_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w3total_apagar_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w3total_apagar_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w3total_apagar_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w3total_apagar_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w3total_apagar_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w3total_apagar_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w3total_apagar_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>

                 <tr>
                <td><center><?php echo 'À pagar de '.date('d/M', strtotime($d['semana4'][0]->inicioP)).' à '.date('d/M', strtotime($d['semana4'][0]->fimP));?></td>
                <td><center>
                  <?php 
                    if ($d['w4total_apagar_semana_cl'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_apagar_semana_cl'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>

                <td><center>
                  <?php 
                    if ($d['w4total_apagar_semana_gf'][0]->VALORR == null) {
                              echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                       echo 'R$ '.number_format($d['w4total_apagar_semana_gf'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w4total_apagar_semana_ic'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_apagar_semana_ic'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                <td><center>
                  <?php 
                    if ($d['w4total_apagar_semana_wp'][0]->VALORR == null) {
                               echo 'R$ '.number_format(0, 2, ',', '.');
                    } else { 
                      echo 'R$ '.number_format($d['w4total_apagar_semana_wp'][0]->VALORR, 2, ',', '.');
                    }
                  ?>
                </td>
                  <td><center>
                  <?php 
                      if (!isset($d['w4total_apagar_semana_cl'][0]->VALORR)) {
                        $cl = 0;
                      } else {
                         $cl = $d['w4total_apagar_semana_cl'][0]->VALORR;
                      }

                        if (!isset($d['w4total_apagar_semana_wp'][0]->VALORR)) {
                        $gf = 0;
                      } else {
                         $gf = $d['w4total_apagar_semana_wp'][0]->VALORR;
                      }

                        if (!isset($d['w4total_apagar_semana_gf'][0]->VALORR)) {
                        $ic = 0;
                      } else {
                         $ic = $d['w4total_apagar_semana_gf'][0]->VALORR;
                      }

                        if (!isset($d['w4total_apagar_semana_ic'][0]->VALORR)) {
                        $wp = 0;
                      } else {
                         $wp = $d['w4total_apagar_semana_ic'][0]->VALORR;
                      }
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr>
    <tr>
                <td><b><center><?php echo 'Total ';?></td>
                <td><center><b>
                  <?php 
                      echo 'R$ '.number_format(($d['wtotal_apagar_semana_cl'][0]->VALORR
                      + $d['w2total_apagar_semana_cl'][0]->VALORR
                      + $d['w3total_apagar_semana_cl'][0]->VALORR
                      + $d['w4total_apagar_semana_cl'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                <td><center><b>
                     <?php 
                      echo 'R$ '.number_format(($d['wtotal_apagar_semana_gf'][0]->VALORR
                      + $d['w2total_apagar_semana_gf'][0]->VALORR
                      + $d['w3total_apagar_semana_gf'][0]->VALORR
                      + $d['w4total_apagar_semana_gf'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                <td><center><b>
                   <?php 
                      echo 'R$ '.number_format(($d['wtotal_apagar_semana_ic'][0]->VALORR
                      + $d['w2total_apagar_semana_ic'][0]->VALORR
                      + $d['w3total_apagar_semana_ic'][0]->VALORR
                      + $d['w4total_apagar_semana_ic'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                <td><center><b>
                           <?php 
                      echo 'R$ '.number_format(($d['wtotal_apagar_semana_wp'][0]->VALORR
                      + $d['w2total_apagar_semana_wp'][0]->VALORR
                      + $d['w3total_apagar_semana_wp'][0]->VALORR
                      + $d['w4total_apagar_semana_wp'][0]->VALORR), 2, ',', '.');
                  ?>
                </td>
                  <td><center><b>
                  <?php 
                     $cl = ($d['w4total_apagar_semana_cl'][0]->VALORR
                          +$d['w3total_apagar_semana_cl'][0]->VALORR
                          +$d['w2total_apagar_semana_cl'][0]->VALORR
                          +$d['wtotal_apagar_semana_cl'][0]->VALORR);

                     $gf = ($d['w4total_apagar_semana_gf'][0]->VALORR
                          +$d['w3total_apagar_semana_gf'][0]->VALORR
                          +$d['w2total_apagar_semana_gf'][0]->VALORR
                          +$d['wtotal_apagar_semana_gf'][0]->VALORR);

                     $ic = ($d['w4total_apagar_semana_ic'][0]->VALORR
                          +$d['w3total_apagar_semana_ic'][0]->VALORR
                          +$d['w2total_apagar_semana_ic'][0]->VALORR
                          +$d['wtotal_apagar_semana_ic'][0]->VALORR);

                     $wp =  ($d['w4total_apagar_semana_wp'][0]->VALORR
                          +$d['w3total_apagar_semana_wp'][0]->VALORR
                          +$d['w2total_apagar_semana_wp'][0]->VALORR
                          +$d['wtotal_apagar_semana_wp'][0]->VALORR);
                        echo 'R$ '.number_format(($cl+$wp+$gf+$ic), 2, ',', '.'); 
                  ?>
                </td>
            </tr> 

        </tbody>
    </table>
    <br>
         <h4 id="tip">Resultado semana </h4>* <b>Memória de cálculo: </b><i>((saldo + à receber) - à pagar)</i> <p></center>
    <hr>
 <table id="" class="table table-sm table-striped table-bordered dataTable">
        <thead>
 <tr class="bg-info text-center py-0 align-middle">
                <th style="background-color:#483D8B;color:white;width:200px"><center>Diferença </th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Colorum</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Graffa</th>
                <th style="background-color:#483D8B;color:white;width:250px"><center>Imprimindo Conhecimento</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Walprint</th>
                <th style="background-color:#483D8B;color:white;width:180px"><center>Total</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><center><?php echo 'Resultado da semana';?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_cl'][0]->VALORR+$d['total_areceber_hoje_cl'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_cl'][0]->VALORR;
                        $resultado1 = ($ClAreceber + $Clsaldo) - $clApagar;
                        $resultado = (
                          $resultado1 
                          + $d['wtotal_areceber_semana_cl'][0]->VALORR
                          + $d['w2total_areceber_semana_cl'][0]->VALORR
                          + $d['w3total_areceber_semana_cl'][0]->VALORR 
                          + $d['w4total_areceber_semana_cl'][0]->VALORR)
                          - ($d['wtotal_apagar_semana_cl'][0]->VALORR
                          + $d['w2total_apagar_semana_cl'][0]->VALORR
                          + $d['w3total_apagar_semana_cl'][0]->VALORR
                          + $d['w4total_apagar_semana_cl'][0]->VALORR); 

                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }
                 ?></td>
                  <td><center><?php 
                        $clApagar = $d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_gf'][0]->VALORR+$d['total_areceber_hoje_gf'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_gf'][0]->VALORR;
                        $resultado1 = ($ClAreceber + $Clsaldo) - $clApagar;
                         $resultado = (
                          $resultado1 
                          + ($d['wtotal_areceber_semana_gf'][0]->VALORR
                          + $d['w2total_areceber_semana_gf'][0]->VALORR
                          + $d['w3total_areceber_semana_gf'][0]->VALORR 
                          + $d['w4total_areceber_semana_gf'][0]->VALORR)
                          - ($d['wtotal_apagar_semana_gf'][0]->VALORR
                          + $d['w2total_apagar_semana_gf'][0]->VALORR
                          + $d['w3total_apagar_semana_gf'][0]->VALORR
                          + $d['w4total_apagar_semana_gf'][0]->VALORR)); 


                        if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }

                 ?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_ic'][0]->VALORR+$d['total_areceber_hoje_ic'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_ic'][0]->VALORR;
                          $resultado1 = ($ClAreceber + $Clsaldo) - $clApagar;
                         $resultado = (
                          $resultado1 
                          + ($d['wtotal_areceber_semana_ic'][0]->VALORR
                          + $d['w2total_areceber_semana_ic'][0]->VALORR
                          + $d['w3total_areceber_semana_ic'][0]->VALORR
                          + $d['w4total_areceber_semana_ic'][0]->VALORR)
                          - ($d['wtotal_apagar_semana_ic'][0]->VALORR
                          + $d['w2total_apagar_semana_ic'][0]->VALORR
                          + $d['w3total_apagar_semana_ic'][0]->VALORR
                          + $d['w4total_apagar_semana_ic'][0]->VALORR)); 
                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }
                 ?></td>
                 <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR;
                        $ClAreceber = $d['total_areceber_semana_wp'][0]->VALORR+$d['total_areceber_hoje_wp'][0]->VALORR;
                        $Clsaldo = $d['total_saldo_cl'][0]->VALORR;
                          $resultado1 = ($ClAreceber + $Clsaldo) - $clApagar;
                         $resultado = (
                          $resultado1 
                          + ($d['wtotal_areceber_semana_wp'][0]->VALORR
                          + $d['w2total_areceber_semana_wp'][0]->VALORR
                          + $d['w3total_areceber_semana_wp'][0]->VALORR 
                          + $d['w4total_areceber_semana_wp'][0]->VALORR)
                          - ($d['wtotal_apagar_semana_wp'][0]->VALORR
                          + $d['w2total_apagar_semana_wp'][0]->VALORR
                          + $d['w3total_apagar_semana_wp'][0]->VALORR
                          + $d['w4total_apagar_semana_wp'][0]->VALORR)); 
                         if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }
                 ?></td>

                  <td><center><?php 
                 //dd($d);
                        $clApagar = $d['total_apagar_semana_wp'][0]->VALORR+$d['total_apagar_hoje_wp'][0]->VALORR
                        +$d['total_apagar_semana_cl'][0]->VALORR+$d['total_apagar_hoje_cl'][0]->VALORR
                        +$d['total_apagar_semana_ic'][0]->VALORR+$d['total_apagar_hoje_ic'][0]->VALORR
                        +$d['total_apagar_semana_gf'][0]->VALORR+$d['total_apagar_hoje_gf'][0]->VALORR
                        ;
                        $ClAreceber = $d['total_areceber_semana_wp'][0]->VALORR+$d['total_areceber_hoje_wp'][0]->VALORR
                        +$d['total_areceber_semana_cl'][0]->VALORR+$d['total_areceber_hoje_cl'][0]->VALORR
                        +$d['total_areceber_semana_ic'][0]->VALORR+$d['total_areceber_hoje_ic'][0]->VALORR
                        +$d['total_areceber_semana_gf'][0]->VALORR+$d['total_areceber_hoje_gf'][0]->VALORR;
                        $Clsaldo = $d['total_saldo'][0]->VALORR;
                         $resultado1 = ($ClAreceber + $Clsaldo) - $clApagar;
                         $resultado = (
                          $resultado1 
                          + ($d['wtotal_areceber_semana_wp'][0]->VALORR
                          + $d['w2total_areceber_semana_wp'][0]->VALORR
                          + $d['w3total_areceber_semana_wp'][0]->VALORR
                          + $d['w4total_areceber_semana_wp'][0]->VALORR
                          + $d['wtotal_areceber_semana_cl'][0]->VALORR
                          + $d['w2total_areceber_semana_cl'][0]->VALORR
                          + $d['w3total_areceber_semana_cl'] [0]->VALORR
                          + $d['w4total_areceber_semana_cl'][0]->VALORR
                          + $d['wtotal_areceber_semana_gf'][0]->VALORR
                          + $d['w2total_areceber_semana_gf'][0]->VALORR
                          + $d['w3total_areceber_semana_gf'] [0]->VALORR
                          + $d['w4total_areceber_semana_gf'][0]->VALORR
                          + $d['wtotal_areceber_semana_ic'][0]->VALORR
                          + $d['w2total_areceber_semana_ic'][0]->VALORR
                          + $d['w3total_areceber_semana_ic'] [0]->VALORR
                          + $d['w4total_areceber_semana_ic'][0]->VALORR
                          )
                          - ($d['wtotal_apagar_semana_wp'][0]->VALORR
                          + $d['w2total_apagar_semana_wp'][0]->VALORR
                          + $d['w3total_apagar_semana_wp'][0]->VALORR
                          + $d['w4total_apagar_semana_wp'][0]->VALORR
                          + $d['wtotal_apagar_semana_cl'][0]->VALORR
                          + $d['w2total_apagar_semana_cl'][0]->VALORR
                          + $d['w3total_apagar_semana_cl'][0]->VALORR
                          + $d['w4total_apagar_semana_cl'][0]->VALORR
                           + $d['wtotal_apagar_semana_gf'][0]->VALORR
                          + $d['w2total_apagar_semana_gf'][0]->VALORR
                          + $d['w3total_apagar_semana_gf'][0]->VALORR
                          + $d['w4total_apagar_semana_gf'][0]->VALORR
                           + $d['wtotal_apagar_semana_ic'][0]->VALORR
                          + $d['w2total_apagar_semana_ic'][0]->VALORR
                          + $d['w3total_apagar_semana_ic'][0]->VALORR
                          + $d['w4total_apagar_semana_ic'][0]->VALORR
                        )); 
                        if ( $resultado > 0) {
                          echo '<small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i> R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        } else {
                            echo '<small class="text-danger mr-1 blink_me">
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
                          '</small>';
                        }



                 ?></td>
                
            </tr>
        </tbody>
    </table>

              </div>
              <!-- /.card-body -->
            </div>

  </div>
</div>
         <!-- /.card-body -->
            </div>         <!-- /.card-body -->
            </div>



<!-- FINAL DAS SEMANAS DO MÊS -->
 




 <div class="card">
                <div class="card-body">
      <div class="card-header">
  <p><i></i></p>
      <h4 id="tip"><b>Saldos </b>bancários </h4><p>
       Guia para visualizar saldos bancários.</center><hr>
        <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
    Visualizar resultado
  </a>
 
</p>
<div class="collapse" id="collapseExample3">
  <div class="card card-body">
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="" class="table  table-sm table-striped table-hover dataTable">
    <thead>
      <tr class="bg-info text-center text-py-0 align-middle">
          <td style="background-color:#836FFF;width:100px">Id</td>
          <td style="background-color:#836FFF;width:250px ">Empresa</td>   
          <td style="background-color:#836FFF;width:200px ">Banco</td>   
          <td style="background-color:#836FFF;width:200px ">Tipo</td> 
          <td style="background-color:#836FFF;width:200px ">Valor</td> 
          <?php 
          if (auth()->user()->editar_saldo == 1) {
            echo '<td style="background-color:#836FFF;width:200px ">Ação</td>';
          }
          ?>
        </tr>
    </thead>
    <tbody>
        @foreach($d['saldosc'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
          <?php 
            if (auth()->user()->editar_saldo == 1) {
              echo '<td><a class="btn btn-warning btn-xs" href="./editarSaldo/'.$cx->id.'">Editar</a></td>';
            }
          ?>
            
           
        </tr>
        @endforeach
    </tbody>
  </table>
<p>
   <table id="" class="table  table-sm table-striped table-hover dataTable">
    <thead>
      <tr class="bg-info text-center text-py-0 align-middle">
            <td style="background-color:#836FFF;width:100px">Id</td>
          <td style="background-color:#836FFF;width:250px ">Empresa</td>   
          <td style="background-color:#836FFF;width:200px ">Banco</td>   
          <td style="background-color:#836FFF;width:200px ">Tipo</td> 
          <td style="background-color:#836FFF;width:200px ">Valor</td> 
          <?php 
          if (auth()->user()->editar_saldo == 1) {
            echo '<td style="background-color:#836FFF;width:200px ">Ação</td>';
          }
          ?>
        </tr>
    </thead>
    <tbody>
        @foreach($d['saldosg'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
          <?php 
            if (auth()->user()->editar_saldo == 1) {
              echo '<td><a class="btn btn-warning btn-xs" href="./editarSaldo/'.$cx->id.'"">Editar</a></td>';
            }
          ?>
           
        </tr>
        @endforeach
    </tbody>
  </table>
<p>
 <table id="" class="table  table-sm table-striped table-hover dataTable">
    <thead>
      <tr class="bg-info text-center text-py-0 align-middle">
           <td style="background-color:#836FFF;width:100px">Id</td>
          <td style="background-color:#836FFF;width:250px ">Empresa</td>   
          <td style="background-color:#836FFF;width:200px ">Banco</td>   
          <td style="background-color:#836FFF;width:200px ">Tipo</td> 
          <td style="background-color:#836FFF;width:200px ">Valor</td> 
          <?php 
          if (auth()->user()->editar_saldo == 1) {
            echo '<td style="background-color:#836FFF;width:200px ">Ação</td>';
          }
          ?>
        </tr>
    </thead>
    <tbody>
        @foreach($d['saldosi'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
           <?php 
            if (auth()->user()->editar_saldo == 1) {
              echo '<td><a class="btn btn-warning btn-xs" href="./editarSaldo/'.$cx->id.'">Editar</a></td>';
            }
          ?>
           
        </tr>
        @endforeach
    </tbody>
  </table>
<p>

   <table id="" class="table  table-sm table-striped table-hover dataTable">
    <thead>
      <tr class="bg-info text-center text-py-0 align-middle">
         <td style="background-color:#836FFF;width:100px">Id</td>
          <td style="background-color:#836FFF;width:250px ">Empresa</td>   
          <td style="background-color:#836FFF;width:200px ">Banco</td>   
          <td style="background-color:#836FFF;width:200px ">Tipo</td> 
          <td style="background-color:#836FFF;width:200px ">Valor</td> 
          <?php 
          if (auth()->user()->editar_saldo == 1) {
            echo '<td style="background-color:#836FFF;width:200px ">Ação</td>';
          }
          ?>
        </tr>
    </thead>
    <tbody>
        @foreach($d['saldosw'] as $cx)
          <tr class="bg- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
           <?php 
            if (auth()->user()->editar_saldo == 1) {
              echo '<td><a class="btn btn-warning btn-xs" href="./editarSaldo/'.$cx->id.'">Editar</a></td>';
            }
          ?>
           
        </tr>
        @endforeach
    </tbody>
  </table>
  <p>


    </div>    <!-- /.box -->
       
    </div>
    </div>
    </div> 
  </div>
</div>
    </div>
    </div>
    </div>






  </form>

<div class="card">
                <div class="card-body">
      <div class="card-header">

    <p><i></i></p>
   <h4 id="tip"><b>Limites </b>bancários </h4><p>
   Guia para visualizar limites bancários.</center><hr>

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
    Visualizar resultado
  </a>
 
</p>
<div class="collapse" id="collapseExample5">
  <div class="card card-body">
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="" class="table  table-sm table-striped table-hover dataTable">

    <thead>
      <tr  class="bg-info text- text-center py-0 align-middle">
          <td style="background-color:#836FFF ">Id</td>
          <td style="background-color:#836FFF ">Empresa</td>   
          <td style="background-color:#836FFF ">Banco</td>   
          <td style="background-color:#836FFF ">Tipo</td> 
          <td style="background-color:#836FFF ">Valor</td> 
          <?php 
          if (auth()->user()->editar_saldo == 1) {
            echo '<td style="background-color:#836FFF;width:200px ">Ação</td>';
          }
          ?>
        </tr>
    </thead>
    <tbody>
        @foreach($d['limites'] as $cx)
          <tr class="bg- text- text-center py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
           <?php 
            if (auth()->user()->editar_saldo == 1) {
              echo '<td><a class="btn btn-warning btn-xs" href="./editarSaldo/'.$cx->id.'">Editar</a></td>';
            }
          ?>
           
        </tr>
        @endforeach
    </tbody>
  </table>
  </form>
              <!-- /.box-body -->
              </div>
          <!-- /.box -->
        </div>
    <!-- /.box -->
        </div>    <!-- /.box -->
        </div>    <!-- /.box -->
    
  </div>
</div>
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
  </script>

@stop
