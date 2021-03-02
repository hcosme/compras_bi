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


   .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>

 <div class="card">
                <div class="card-body">
      <div class="card-header">
       <h4 id="tip">Saldo e limites <b>bancários</b> </h4><p></center>
    <hr>


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
   <h4 id="tip">Resumo da semana <b>À receber </b></h4><p></center>
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
                <td><?php echo 'À receber '.date('d/M');?></td>
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
             <tr>    <td><?php 
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

<p>
    <h4 id="tip">Resumo da semana <b>À pagar</b> </h4><p></center><hr>
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
                <td><?php echo 'À Pagar '.date('d/M');?></td>
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
                 <td><?php 
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
    <br><br>
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
                <td><?php echo 'Resultado da semana';?></td>
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
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
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
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
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
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
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
                        <i class="fas fa-arrow-down"></i>R$ '.number_format($resultado, 2, ',', '.').
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
              <!-- /.card-body -->
            </div>

         <!-- /.card-body -->
            </div>         <!-- /.card-body -->
            </div>






 <div class="card">
                <div class="card-body">
      <div class="card-header">

    <p><i></i></p>
   <h2>Limites</h2><hr>
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela" class="table  table-sm table-striped table-hover dataTable">

    <thead>
      <tr class="bg-info text- py-0 align-middle">
          <td>Id</td>
          <td>Empresa</td>   
          <td>Banco</td>   
          <td>Tipo</td> 
          <td>Valor</td> 
          <td>Ação</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($d['limites'] as $cx)
          <tr class="bg- text- py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
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
    <!-- /.box -->
        </div>    <!-- /.box -->
        </div>    <!-- /.box -->
        </div>    <!-- /.box -->
        </div>    <!-- /.box -->
        </div>
 <div class="card">
                <div class="card-body">
      <div class="card-header">
  <p><i></i></p>
   <h2>Saldos</h2><hr>
    <div class="row">
<div class="col-xs-12 col-sm-12">
          <div class="box">
             <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
    <table id="minhaTabela1" class="table  table-sm table-striped table-hover dataTable">
    <thead>
      <tr class="bg-info text-py-0 align-middle">
          <td>Id</td>
          <td>Empresa</td>   
          <td>Banco</td>   
          <td>Tipo</td> 
          <td>Valor</td> 
          <td>Ação</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($d['saldos'] as $cx)
          <tr class="bg- text- py-0 align-middle">
            <td>{{$cx->id}}</td>
            <td>{{ ucwords(strtolower($cx->empresa)) }}</td>
            <td>{{ ucwords(strtolower($cx->banco)) }}</td>
            <td>{{ ucwords(strtolower($cx->tipo)) }}</td>
           <td>{{ 'R$ '.number_format($cx->valor, 2, ',', '.') }}</td>
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
