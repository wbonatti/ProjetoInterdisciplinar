<?php

Class geralController extends \BaseController
{

    function inicio()
    {
        if(!Autenticacao::verificaLogin())
        {
            return Redirect::to('/');
        }
        $usuario = Autenticacao::getUsuarioLogado();
        $view = View::make('default::header')->with('usuario',$usuario->PESSOANOME);
        $view .= View::make('geral::inicio')->with('dados',$usuario);
        $view .= View::make('default::footer');
        return $view;
        
    }
    
    function filtroData($di = null, $df = null)
    {
        if(!Autenticacao::verificaLogin())
        {
            return Redirect::to('/');
        }
        return $this->indexAfiliado('all', $di, $df);      
    }
    
    
    function indexAfiliado($filter = 'all', $di = null, $df = null)
    {
        $reservasbrutas = DB::table('reserva')
                ->select(DB::raw("
                        DATE_FORMAT(reserva.data_retirada,'%d-%m-%Y') as data_retirada, 
                        reserva.codigo,
                        DATE_FORMAT(reserva.data_devolucao,'%d-%m-%Y') as data_devolucao,
                        reserva.valor_comissionavel, 
                        reserva.com_base,
                        reserva.comissao_empresa, 
                        reserva.comissao_empresa, 
                        reserva_transacao.parcela, 
                        reserva.id_status, 
                        local_cidade.nome"
                    ))
                ->where('id_parceiro', '=', $usuario->id_parceiro);
        
        if($filter != null) 
        {
            $reservasfiltradas = $this->getFilteredData($filter, $reservasbrutas);
        }
        if($di != null || $df != null)
        {
            $reservasfiltradas = $this->filtraAno($di,$df, $reservasbrutas);
        }

        $reservasfiltradas->leftJoin('reserva_transacao', 'reserva_transacao.id_reserva', '=', 'reserva.id_reserva')
                ->leftJoin('locadora', 'locadora.id_locadora', '=', 'reserva.id_locadora_retirada')
                ->leftJoin('local_cidade', 'locadora.id_cidade', '=', 'local_cidade.id_cidade');
        
    }
}