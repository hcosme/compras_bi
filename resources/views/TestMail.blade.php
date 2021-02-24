<html lang="en">
    <head>

      <style>
        table, th, td {
  border: 1px solid black;
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
        <h3> Igual ou abaixo do estoque mínimo - Fonte: Ecalc</h3>
       <i> Este e-mail é automático, favor não responder.</i>
        <div class="card">
      <div class="card-header">
           <p>
    <div class="box-body table-responsive no-padding">
    <table border="1" id="minhaTabela" class="table table-sm table-striped table-hover dataTable">
      <thead>
        <tr bgcolor="blue" class="table-secondary">
          <th style="color:white;"><center>Id</th>
          <th style="color:white;"><center>Item</th>
          <th style="color:white;"><center>Mínimo</th>
          <th style="color:white;"><center>Estoque</th>
          <th style="color:white;"><center>Reposição estoque</th>
          <th style="color:white;"><center>% disponível</th>
          <th style="color:white;"><center>Reposição?</th>
        </tr>
      </thead>
    <tbody>
       @foreach($details as $itens)
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
              <td><center>{{ $itens->MINIMO }}</td>
              <td><center>{{ $itens->CESTATUAL }}</td>
               <td><center>
                 <?php 
                    if ($itens->CESTATUAL >= $itens->MINIMO) {
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
            if ($itens->CESTATUAL <= $itens->MINIMO) {
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
    </body>
</html>