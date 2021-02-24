<!DOCTYPE html>
 <html>
    <head>


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
   
</style>
    </head>
    <title>Estoque</title>
    <body>
        @section('content')
        @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
@stop
<?php //dd($details);?>
      
      <b>Observação</b>: Os itens que estão em acima de 100% disponível, aparecerão em verde. 
      Quanto aos demais são de extrema importância a observação dos mesmos, pois estão com estoque menor ou igual ao estoque mínimo.<p>
       <i> Este e-mail é automático, favor não responder.</i> 
       <h2> * Monitoramento de tintas.</h2>
        <div class="card">
      <div class="card-header">
    <div class="box-body table-responsive no-padding">
    <table >
      <thead>
         <tr  style="background-color:#070719" class="table-secondary">
          <th style="color:white;width:100px"><center> Código </th>
          <th style="color:white;width:420px"><center> Item </th>
          <th style="color:white;width:90px";><center> Mínimo </th>
          <th style="color:white;width:90px";"><center> Estoque </th>
          <th style="color:white;width:90px";"><center> Reposição </th>
          <th style="color:white;width:90px";"><center> % disponível </th>
          <th style="color:white;width:70px"><center>Farol</th> 
        </tr>
      </thead>
    <tbody>
       @foreach($details['tinta'] as $itens)
        <tr>
       <td><center>{{ $itens->CODIGO }}</td>
          <td>
            <?php 
              if ($itens->ITEM == '') {
                echo '*****';
              } else {
                echo ucwords(strtolower($itens->ITEM));
              } 
            ?>
            </td>
              <td><center>{{ number_format($itens->MINIMO, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->CESTATUAL, 0, ',', '.') }}</td>
               <td><center>
                 <?php 
                    if ($itens->CESTATUAL >= $itens->MINIMO) {
                         echo '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
     
    
             
              <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 51 && $percent <= 100) {
                echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              } else {
                    echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              }
              
              ?>

       
       <td><center>
        <?php 

           if ($percent < 20) {
                echo '<div id="circuloVermelho">';
              } elseif ($percent >= 20 && $percent <= 50) {
               echo '<div id="circuloAmarelo">';
              } elseif ($percent >= 51 && $percent <= 100) {
               echo '<div id="circuloAmarelo">';
              } else {
                  echo '<div id="circuloVerde">';
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
<br>
       <h2> * Monitoramento de cartucho.</h2>
        <div class="card">
      <div class="card-header">
    <div class="box-body table-responsive no-padding">
    <table >
      <thead>
       <tr  style="background-color:#070719" class="table-secondary">
        <th style="color:white;width:100px"><center> Código </th>
          <th style="color:white;width:420px"><center> Item </th>
          <th style="color:white;width:90px";><center> Mínimo </th>
          <th style="color:white;width:90px";"><center> Estoque </th>
          <th style="color:white;width:90px";"><center> Reposição </th>
          <th style="color:white;width:90px";"><center> % disponível </th>
          <th style="color:white;width:70px"><center>Farol</th> 
        </tr>
      </thead>
    <tbody>
       @foreach($details['cartucho'] as $itens)
        <tr>
       <td><center>{{ $itens->CODIGO }}</td>
          <td>
            <?php 
              if ($itens->ITEM == '') {
                echo '*****';
              } else {
                echo ucwords(strtolower($itens->ITEM));
              } 
            ?>
            </td>
              <td><center>{{ number_format($itens->MINIMO, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->CESTATUAL, 0, ',', '.') }}</td>
               <td><center>
                 <?php 
                    if ($itens->CESTATUAL >= $itens->MINIMO) {
                         echo '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
     
    
             
             <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
               echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 51 && $percent <= 100) {
                echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              } else {
                    echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              }
              
              ?>
       
       <td><center>
        <?php 

           if ($percent < 20) {
                echo '<div id="circuloVermelho">';
              } elseif ($percent >= 20 && $percent <= 50) {
               echo '<div id="circuloAmarelo">';
              } elseif ($percent >= 51 && $percent <= 100) {
               echo '<div id="circuloAmarelo">';
              } else {
                  echo '<div id="circuloVerde">';
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


<br>
       <h2> * Monitoramento de Material Auxiliar.</h2>
        <div class="card">
      <div class="card-header">
    <div class="box-body table-responsive no-padding">
    <table >
      <thead>
      <tr  style="background-color:#070719" class="table-secondary">
        <th style="color:white;width:100px"><center> Código </th>
          <th style="color:white;width:420px"><center> Item </th>
          <th style="color:white;width:90px";><center> Mínimo </th>
          <th style="color:white;width:90px";"><center> Estoque </th>
          <th style="color:white;width:90px";"><center> Reposição </th>
          <th style="color:white;width:90px";"><center> % disponível </th>
          <th style="color:white;width:70px"><center>Farol</th> 
        </tr>
      </thead>
    <tbody>
       @foreach($details['matAux'] as $itens)
        <tr>
       <td><center>{{ $itens->CODIGO }}</td>
          <td>
            <?php 
              if ($itens->ITEM == '') {
                echo '*****';
              } else {
                echo ucwords(strtolower($itens->ITEM));
              } 
            ?>
            </td>
              <td><center>{{ number_format($itens->MINIMO, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->CESTATUAL, 0, ',', '.') }}</td>
               <td><center>
                 <?php 
                    if ($itens->CESTATUAL >= $itens->MINIMO) {
                         echo '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
     
    
             <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                 echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 51 && $percent <= 100) {
                echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              } else {
                    echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              }
              
              ?>

       
       <td><center>
        <?php 

           if ($percent < 20) {
                echo '<div id="circuloVermelho">';
              } elseif ($percent >= 20 && $percent <= 50) {
               echo '<div id="circuloAmarelo">';
              } elseif ($percent >= 51 && $percent <= 100) {
               echo '<div id="circuloAmarelo">';
              } else {
                  echo '<div id="circuloVerde">';
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

<br>
       <h2> * Monitoramento de Materiais de Limpeza.</h2>
        <div class="card">
      <div class="card-header">
    <div class="box-body table-responsive no-padding">
    <table >
      <thead>
       <tr  style="background-color:#070719" class="table-secondary">
         <th style="color:white;width:100px"><center> Código </th>
          <th style="color:white;width:420px"><center> Item </th>
          <th style="color:white;width:90px";><center> Mínimo </th>
          <th style="color:white;width:90px";"><center> Estoque </th>
          <th style="color:white;width:90px";"><center> Reposição </th>
          <th style="color:white;width:90px";"><center> % disponível </th>
          <th style="color:white;width:70px"><center>Farol</th> 
        </tr>
      </thead>
    <tbody>
       @foreach($details['limpeza'] as $itens)
        <tr>
       <td><center>{{ $itens->CODIGO }}</td>
          <td>
            <?php 
              if ($itens->ITEM == '') {
                echo '*****';
              } else {
                echo ucwords(strtolower($itens->ITEM));
              } 
            ?>
            </td>
              <td><center>{{ number_format($itens->MINIMO, 0, ',', '.') }}</td>
              <td><center>{{ number_format($itens->CESTATUAL, 0, ',', '.') }}</td>
               <td><center>
                 <?php 
                    if ($itens->CESTATUAL >= $itens->MINIMO) {
                         echo '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i> 0</small>'; 
                    } else {
                        echo '<small class="text-danger mr-1"><i class="fas fa-arrow-down"></i> '.($itens->MINIMO - $itens->CESTATUAL).'</small>';
                    }
                ?>
               
               </td>
     
    
             
            <?php
              
              $percent = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2);
              $percent2 = round(((1-($itens->MINIMO-$itens->CESTATUAL)/$itens->MINIMO)*100),2).'%';
              if ($percent < 20) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 20 && $percent <= 50) {
                echo '<td"><center><b>'.$percent.'%</b></center> </td>';
              } elseif ($percent >= 51 && $percent <= 100) {
                echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              } else {
                    echo '<td"><center><b>'.$percent.'%</b></center>  </td>';
              }
              
              ?>

       
       <td><center>
        <?php 

           if ($percent < 20) {
                echo '<div id="circuloVermelho">';
              } elseif ($percent >= 20 && $percent <= 50) {
               echo '<div id="circuloAmarelo">';
              } elseif ($percent >= 51 && $percent <= 100) {
               echo '<div id="circuloAmarelo">';
              } else {
                  echo '<div id="circuloVerde">';
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


    </body>
      
</html>