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
       $dados= DB::select("select i.ccodigo as codigo,
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
       $remetentes = [
          1 => 'h.oliveira556@gmail.com',
          2 => 'havila@walprint.com.br',
          3 => 'havilacosme92@gmail.com'
       ];
      foreach ($remetentes as $emailsEnvio) {
        $email = $emailsEnvio;    
        $details = $dados;
        Mail::to($email)->send(new TestMail($details));
      }
       
       return redirect('/estoque')->with('success','Reportado com sucesso para a lista de destinatários cadastrados no sistema.');
   }
}
