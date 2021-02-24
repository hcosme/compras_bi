<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Firebird\Eloquent\Model;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dados = [];
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


        $em_falta = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome
                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.cestatual=0
                and i.itemprod<>'2'
                and i.ativo<>0
                order by 1");

        $disponivel = DB::select("select i.ccodigo as codigo,
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

        $total = DB::select("select i.ccodigo as codigo,
                i.cnome as item,
                i.cestminimo as minimo,
                i.cestatual,
                u.cnome


                from itens i
                left join unidades u on u.codigo=i.cunidest
                where 1=1
                and i.cestminimo>0
                and i.itemprod<>'2'
                and i.ativo<>0
                order by 1");

        $dados['em_falta'] = count($em_falta);
        $dados['disponivel'] = count($disponivel);
        $dados['total'] = count($total);
       // dd($dados);
        return view('home', compact('dados')); 
    }
    /*
    public function listarEmails()
    {
        $dados = DB::select("SELECT * FROM emails ORDER BY id asc");
        return view('emails', compact('dados'));
    }
    
    public function listaEmailsEnviados()
    {
        $dados = DB::select("SELECT * FROM enviados ORDER BY id asc");
        return view('emailsEnviados', compact('dados'));
    }

    public function deletarEmail($id)
    {
        $dados = DB::delete("delete FROM emails where id = '".$id."'");
        return redirect('/emailsEnviados')->with('success','Excluído com sucesso.');
    }
    
    public function store(Request $request) {
        $order = Order::findOrFail($request->order_id);
//     $user = new User([
//      'nome' => $request->get('nome'),
//      'email' => $request->get('email'),
//      'senha' => new Password($request->get('password'))
//   ]);
   Mail::to(['h.oliveira556@gmail.com', 'h.oliveira556@gmail.com'])->send(new OrderShipped($order));
}
  public function emailModal()
    {
        
        return view('modalReport');
    }
    
}

*/

        function getDiasUteis($dataInicio, $dataFim) {
        $P_Dia_Mes_Atual = date("Y-m-01 00:00:00:00");
        $U_Dia_Mes_Atual = date("Y-m-t");
    
        $P_Dia_Mes_Anterior = date("Y-m-01 00:00:00:00",strtotime("-1 month"));
        $U_Dia_Mes_Anterior = date("Y-m-t 00:00:00:00",strtotime("-1 month"));
        $dataInicial = date('Y-m').'-01 00:00:00';
        $dataFinal = $U_Dia_Mes_Atual.' 23:59:59';

        $tsInicio = strtotime($dataInicio);
        $tsFim = strtotime($dataFim);
        $feriados = [
            '2021-01-01',
            '2021-02-15',
            '2021-02-16',
            '2021-02-17',
            '2021-04-02',
            '2021-04-21',
            '2021-05-01',
            '2021-06-03',
            '2021-07-07',
            '2021-10-12',
            '2021-10-28',
            '2021-11-02',
            '2021-11-15',
            '2021-11-20',
            '2021-12-25'
        ];

        $quantidadeDias = 0;
        while ($tsInicio <= $tsFim) {
            // Verifica se o dia é igual a sábado ou domingo, caso seja continua o loop
            $diaIgualFinalSemana = (date('D', $tsInicio) === 'Sat' || date('D', $tsInicio) === 'Sun');
            // Verifica se é feriado, caso seja continua o loop
            $diaIgualFeriado = (count($feriados) && in_array(date('Y-m-d', $tsInicio), $feriados));

            $tsInicio += 86400; // 86400 quantidade de segundos em um dia

            if ($diaIgualFinalSemana || $diaIgualFeriado) {
                continue;
            }

            $quantidadeDias++;
        }
          //  dd($quantidadeDias);

        return $quantidadeDias;
    }


    public function faturamento(Request $request)
    {
        //dd($request->inicio);

        $diaOntem = date('Y-m-d', strtotime("-1 days"));
        $P_Dia_Mes_Atual = date("Y-m-01 00:00:00:00");
        $U_Dia_Mes_Atual = date("Y-m-t");
        //dd($U_Dia_Mes_Atual);
        $P_Dia_Mes_Anterior = date("Y-m-01 00:00:00:00",strtotime("-1 month"));
        $U_Dia_Mes_Anterior = date("Y-m-t 00:00:00:00",strtotime("-1 month"));

        $dados = [];
        if ($request->inicio || $request->fim) {
            $dataInicial = $request->inicio.' 00:00:00';
            $dataFinal = $request->fim.' 23:59:59';
        } else {
            $dataInicial = date('Y-m').'-01 00:00:00';
            $dataFinal = $U_Dia_Mes_Atual.' 23:59:59';
        } 
        


        $dados['faturamento'] = "select
            anofat,
            mesfat,
            diafat,
            sum(PRECO) as preco,
            sum(FRETE) as frete
        from (
        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
            extract(day from e.saida) as diafat,
               round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
               case when (n.somafretevalitens <> 'T' and n.somafretevaltotal = 'T' and e.frete = 'FOB') then (i.ptotal / maxvalue(e.vtotal,1))* e.tottransp else 0 end as FRETE
        from entrega e
        join itementr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
            and e.saida between '".$dataInicial."' and '".$dataFinal."'
        union all

        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
            extract(day from e.saida) as diafat,
               round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
               case when (n.somafretevalitens <> 'T' and n.somafretevaltotal = 'T' and e.frete = 'FOB') then (i.ptotal / maxvalue(e.vtotal,1))* e.tottransp else 0 end as FRETE
        from entrega e
        join prodentr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
     and e.saida between '".$dataInicial."' and '".$dataFinal."'


        union all

        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
            extract(day from e.saida) as diafat,
            round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
            0
        from entrega e
        join serventr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
       and e.saida between '".$dataInicial."' and '".$dataFinal."'
        )

        group by 1, 2, 3
        order by 1, 2, 3";

         $dados['total_faturamento'] = "select
            anofat,
            mesfat,
            sum(PRECO) as preco,
            sum(FRETE) as frete
        from (
        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
               round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
               case when (n.somafretevalitens <> 'T' and n.somafretevaltotal = 'T' and e.frete = 'FOB') then (i.ptotal / maxvalue(e.vtotal,1))* e.tottransp else 0 end as FRETE
        from entrega e
        join itementr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
            and e.saida between '".$dataInicial."' and '".$dataFinal."'
        union all

        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
               round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
               case when (n.somafretevalitens <> 'T' and n.somafretevaltotal = 'T' and e.frete = 'FOB') then (i.ptotal / maxvalue(e.vtotal,1))* e.tottransp else 0 end as FRETE
        from entrega e
        join prodentr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
     and e.saida between '".$dataInicial."' and '".$dataFinal."'


        union all

        select
            extract(year from e.saida) as anofat,
            extract(month from e.saida) as mesfat,
            round(i.ptotal + ((i.ptotal / maxvalue(e.vtotal,1))* e.totipimoney) + ((i.ptotal / maxvalue(e.vtotal,1))* e.despace) - (i.ptotal * (e.DESCNOTAPOR/100)),2) as PRECO,
            0
        from entrega e
        join serventr i on (e.codigo = i.codigoentrega)
        join natoper n on (n.codigo = i.codautonatoper)
        where 1=1
        and e.status in ('EMIT')
        and n.emitetit <> 'T'
       and e.saida between '".$dataInicial."' and '".$dataFinal."'
        )

        group by 1, 2 
        order by 1, 2";

        $dados['meta'] = "select sum(c.respnum) as meta
        from cliatrb c
        where c.atributo = 11";

        $dados['apagar'] = "select
        ap.dataemit,
        ap.prop,
        ap.historico,
        ap.datapag,
        ap.datavenc,
        ap.valorreal
        from apagar ap
        where 1=1
         and ap.datapag between '".$dataInicial."' and '".$dataFinal."'
        order by ap.datapag";

        $dados['total_apagar'] = "select
        sum(ap.valorreal) as valortotal
        from apagar ap
        where  ap.datapag between '".$dataInicial."' and '".$dataFinal."' ";

        $dados['areceber'] = "select
        extract (year from datavenc) as ano_venc,
        ap.dataemit,
        ap.prop,
        ap.historico,
        ap.datavenc,
        ap.datapag,
        ap.valorreal
        from receber ap
        where 1=1
        and ap.datapag between '".$dataInicial."' and '".$dataFinal."'
        order by 1 desc, ap.datapag";

        $dados['total_areceber'] = "select 
            sum(s.cpfinal) as valorr,
            sum(os.cpfinal) as valor
            from saldoos s
            join arqos os on os.cnpo=s.cnpo
            left join cliatrb sf on  (sf.atributo = 37 and sf.codcliente = cast(s.cnpo as integer) || '/' || s.empresa  ) 
            where s.cgeraos <> - 2
            and ((sf.resposta <> 119) or (sf.resposta is null))
            and s.dataentrega between '".$dataInicial."' and '".$dataFinal."'
      
        ";

        $dados['saldo'] = "select
                cconta as conta,
                csaldo as saldo
                from cx_banco
                where 1=1
                and desativado<>'T'
                order by cconta
       ";

        $dados['total_saldo'] = "select
        sum(csaldo) as saldo
        from cx_banco
        where 1=1
        and desativado<>'T'
       ";

        $dados['oslib'] = "select 
                    s.ccliente,
                    s.cnpo,
                    s.cpfinal,
                    s.cquant,
                    s.cref,
                    s1.descricao
                    from saldoos s
                    join arqos os on os.cnpo=s.cnpo
                    join status s1 on s1.codseq=os.statuscod
                    where 1=1
                    and s.cnpo in (select cnpo from arqos where statuscod in (7) and cgeraos not in (-1, 4))
                    and s.dataentrega between '".$dataInicial."' and '".$dataFinal."'
                    order by
                    s.ccliente,
                    s.cpfinal desc";

                      $dados['dias_uteis'] = "select sum(c.respnum) as dias
            from cliatrb c
            where c.atributo = 17";

        $dados['liberado_faturamento'] = "select 
                    sum(s.cpfinal) as valor
                    from saldoos s
                    join arqos os on os.cnpo=s.cnpo
                    join status s1 on s1.codseq=os.statuscod
                    where 1=1
                    and s.cnpo in (select cnpo from arqos where statuscod in (7) and cgeraos not in (-1, 4))
                    and s.dataentrega between '".$dataInicial."' and '".$dataFinal."'
                   ";
        // $dados = connection('firebird')->select($saldo);
        $d = [];
        $d['faturamento'] = DB::select($dados['faturamento']);
        $d['total_faturamento'] = DB::select($dados['total_faturamento']);
        $d['meta'] = DB::select($dados['meta']);
        $d['apagar'] = DB::select($dados['apagar']);
        $d['total_apagar'] = DB::select($dados['total_apagar']);
        $d['areceber'] = DB::select($dados['areceber']);
        $d['total_areceber'] = DB::select($dados['total_areceber']);
        $d['total_saldo'] = DB::select($dados['total_saldo']);
        $d['saldo'] = DB::select($dados['saldo']);
        $d['oslib'] = DB::select($dados['oslib']);
        $d['dias_uteis'] = DB::select($dados['dias_uteis']);
        $d['liberado_faturamento'] = DB::select($dados['liberado_faturamento']);
        $d['dias_corridos'] = $this->getDiasUteis($dataInicial, $diaOntem);
        $d['libera_os'] =  $d['total_areceber'][0]->VALORR-$d['liberado_faturamento'][0]->VALOR;

        if ($d['faturamento'] == '' || $d['faturamento'] == null ){
            $d['faturamento'] = 0;
        }

         if ( $d['libera_os'] == '' ||  $d['libera_os'] == null ){
             $libera_os = 0;
        } else {
            $libera_os = $d['libera_os'];
        }

         if ($d['liberado_faturamento'][0]->VALOR == '' || $d['liberado_faturamento'][0]->VALOR == null ){
            $liberado_faturamento = 0;
        } else {
            $liberado_faturamento = $d['liberado_faturamento'][0]->VALOR;
        }


        if (empty($d['total_faturamento'])){
            $total_faturamento = 0;
        } else {
             $total_faturamento = $d['total_faturamento'][0]->PRECO;
        }
            $d['total_saldo'] = ($total_faturamento + $libera_os + $liberado_faturamento) - $d['meta'][0]->META;
        return view('faturamento', compact('d'));
    }



     public function caixa(Request $request)
    {
        $dados = [];
        if ($request->dataInicial || $request->dataFinal) {
            $dataInicial = $request->dataInicial;
            $dataFinal = $request->dataFinal;
        } else {
            $dataInicial = date('Y-m-d').' 00:00:00';
            $date = $dataInicial;
            $date = strtotime($date);
            $date7 = strtotime("+7 day", $date);
            $date14 = strtotime("+14 day", $date);
            $date21 = strtotime("+21 day", $date);
            $date28 = strtotime("+28 day", $date);
            $dataFinal7 = date('Y-m-d 00:00:00', $date7);
            $dataFinal14 = date('Y-m-d 00:00:00', $date14);
            $dataFinal21 = date('Y-m-d 00:00:00', $date21);
            $dataFinal28 = date('Y-m-d 00:00:00', $date28);
        } 
        $inicioBanco = '2000-01-01 00:00:00';
        $dados['apagar'] = "select
        ap.dataemit,
        ap.prop,
        ap.historico,
        ap.datapag,
        ap.datavenc,
        ap.valorreal
        from apagar ap
        inner join destino d on d.ccodigo=ap.coddest
        where 1=1
        and d.fluxocaixa<>1
        and ap.datapag between '".$inicioBanco."' and '".$dataFinal28."'
        order by ap.datapag"; 

        $dados['total_apagar7'] = "select
        sum(ap.valorreal) as valortotal
        from apagar ap
        inner join destino d on d.ccodigo=ap.coddest
        where  ap.datapag between '".$inicioBanco."' and '".$dataFinal7."' 
        and d.fluxocaixa<>1
        ";

        $dados['total_apagar14'] = "select
        sum(ap.valorreal) as valortotal
        from apagar ap 
        inner join destino d on d.ccodigo=ap.coddest
        where  ap.datapag between '".$inicioBanco."' and '".$dataFinal14."' 
        and d.fluxocaixa<>1 ";


        $dados['total_apagar21'] = "select
        sum(ap.valorreal) as valortotal
        from apagar ap
         inner join destino d on d.ccodigo=ap.coddest
        where  ap.datapag between '".$inicioBanco."' and '".$dataFinal21."' 
        and d.fluxocaixa<>1
        ";

        $dados['total_apagar28'] = "select
        sum(ap.valorreal) as valortotal
        from apagar ap
        inner join destino d on d.ccodigo=ap.coddest
        where  ap.datapag between '".$inicioBanco."' and '".$dataFinal28."' 
        and d.fluxocaixa<>1
        ";


        $dados['areceber'] = "select
            extract (year from datavenc) as ano_venc,
            ap.dataemit,
            ap.prop,
            ap.historico,
            ap.datavenc,
            ap.datapag,
            ap.valorreal
            from receber ap
            inner join destino d on d.ccodigo=ap.coddest
            where 1=1
            and ap.datapag between '".$inicioBanco."' and '".$dataFinal28."'
            and d.fluxocaixa<>1
            order by 1 desc, ap.datapag"; 



        $dados['total_areceber7'] = "select
            sum(ap.valorreal) as valorr
            from receber ap
            inner join destino d on d.ccodigo=ap.coddest
            where 1=1
            and ap.datapag between '".$inicioBanco."' and '".$dataFinal7."'
            and d.fluxocaixa<>1 group by ap.valorreal
            order by 1 desc
        ";


        $dados['total_areceber14'] = "select
              sum(ap.valorreal) as valorr
            from receber ap
            inner join destino d on d.ccodigo=ap.coddest
            where 1=1
            and ap.datapag between '".$inicioBanco."' and '".$dataFinal14."'
            and d.fluxocaixa<>1 group by ap.valorreal
            order by 1 desc
      
        ";


        $dados['total_areceber21'] = "select
             sum(ap.valorreal) as valorr
            from receber ap
            inner join destino d on d.ccodigo=ap.coddest
            where 1=1
            and ap.datapag between '".$inicioBanco."' and '".$dataFinal21."'
            and d.fluxocaixa<>1 group by ap.valorreal
            order by 1 desc
      
        ";


        $dados['total_areceber28'] = "select 
            sum(ap.valorreal) as valorr
            from receber ap
            inner join destino d on d.ccodigo=ap.coddest
            where 1=1
            and ap.datapag between '".$inicioBanco."' and '".$dataFinal28."'
            and d.fluxocaixa<>1 group by ap.valorreal
            order by 1 desc
      
        ";

        $dados['saldo'] = "select 
                *
                from cx_banco
                where 1=1
                and desativado<>'T'
                and codigo in (31,36,28,42)
                order by cconta
       ";

        $dados['total_saldo'] = "select 
        sum(csaldo) as saldo
        from cx_banco
        where 1=1
        and codigo in (31,36,28,42)
        and desativado<>'T'
       ";



        $dados['oslib'] = "select
                    s.ccliente,
                    s.cnpo,
                    s.cpfinal,
                    s.cquant,
                    s.cref,
                    s1.descricao
                    from saldoos s
                    join arqos os on os.cnpo=s.cnpo
                    join status s1 on s1.codseq=os.statuscod
                    where 1=1
                    and s.cnpo in (select cnpo from arqos where statuscod in (7) and cgeraos not in (-1, 4))
                    order by
                    s.ccliente,
                    s.cpfinal desc";

        $dados['liberado_faturamento'] = "select
                    sum(s.cpfinal) as valor
                    from saldoos s
                    join arqos os on os.cnpo=s.cnpo
                    join status s1 on s1.codseq=os.statuscod
                    where 1=1
                    and s.cnpo in (select cnpo from arqos where statuscod in (7) and cgeraos not in (-1, 4))
                   ";
        $dados['dias_uteis'] = "select sum(c.respnum) as dias
            from cliatrb c
            where c.atributo = 17";



        $d = [];
        $d['apagar'] = DB::select($dados['apagar']);
        $d['total_apagar7'] = DB::select($dados['total_apagar7']);
        $d['total_apagar14'] = DB::select($dados['total_apagar14']);
        $d['total_apagar21'] = DB::select($dados['total_apagar21']);
        $d['total_apagar28'] = DB::select($dados['total_apagar28']);
        $d['total_areceber7'] = DB::select($dados['total_areceber7']);
        $d['areceber'] = DB::select($dados['areceber']);

        $d['total_areceber14'] = DB::select($dados['total_areceber14']);
        $d['total_areceber21'] = DB::select($dados['total_areceber21']);
        $d['total_areceber28'] = DB::select($dados['total_areceber28']);
        $d['total_saldo'] = DB::select($dados['total_saldo']);
        $d['dias_uteis'] = DB::select($dados['dias_uteis']);
  
       
        $d['saldo'] = DB::select($dados['saldo']);
        $d['oslib'] = DB::select($dados['oslib']);
        $d['liberado_faturamento'] = DB::select($dados['liberado_faturamento']);
        $d['saldo_caixa7'] = ($d['total_areceber7'][0]->VALORR + $d['total_saldo'][0]->SALDO)-$d['total_apagar7'][0]->VALORTOTAL;
        $d['saldo_caixa14'] = ($d['total_areceber14'][0]->VALORR + $d['total_saldo'][0]->SALDO)-$d['total_apagar14'][0]->VALORTOTAL;
        $d['saldo_caixa21'] = ($d['total_areceber21'][0]->VALORR + $d['total_saldo'][0]->SALDO)-$d['total_apagar21'][0]->VALORTOTAL;
        $d['saldo_caixa28'] = ($d['total_areceber28'][0]->VALORR + $d['total_saldo'][0]->SALDO)-$d['total_apagar28'][0]->VALORTOTAL;
       
        return view('caixa', compact('d'));
    }

}
