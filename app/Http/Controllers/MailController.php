<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Firebird\Eloquent\Model;

class MailController extends Controller
{
   public function sendEmail() {
       $dados = [];
       $dados['primeiro']= DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome


                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.ativo<>0
                order by 1");

         $dados['dados'] = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.ativo<>0
                order by 1");
      // dd($dados);
       // $dados = DB::select("SELECT * FROM itens");
         
        $dados['matAux'] = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.cnome like ('%MAT AUX%') OR i.cnome like ('Chapa Offset AGFA%')
                and i.ativo<>0
                order by 1");

        $dados['cartucho'] = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.cnome like ('%CARTUCHO%') OR i.cnome like ('%cartucho%')
                and i.ativo<>0
                order by 1");

         $dados['limpeza'] = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.cnome like ('%LIMPEZA%') OR i.cnome like ('%PANO DE LIMPEZA%') OR i.cnome like ('%Copo Descartavel%') 
                and i.ativo<>0
                order by 1");

          $dados['tinta'] = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
               -- and i.cestatual<=i.cestminimo
                and i.itemprod<>'2'
                and i.cnome like ('NewV%') OR i.cnome like ('MAXXIMA%')
                and i.ativo<>0
                order by 1");

       $remetentes = [
          1 => 'havila@walprint.com.br',
		  2 => 'almoxarifado@walprint.com.br',
		  3 => 'havilacosme92@gmail.com',
		  4 => 'compras@walprint.com.br',
		  5 => 'suprimentos@walprint.com.br',
		  6 => 'graziele@walprint.com.br',
		  7 => 'walter@walprint.com.br'
       ];
      foreach ($remetentes as $emailsEnvio) {
        $email = $emailsEnvio;    
        $details = $dados;
        Mail::to($email)->send(new TestMail($details));
      }
       
       return redirect('/estoque')->with('success','Reportado com sucesso para a lista de destinatários cadastrados no sistema.');
   }
}
