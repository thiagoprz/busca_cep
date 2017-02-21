<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 19/02/17
 * Time: 21:31
 */

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Cep;
use Illuminate\Http\Request;

class CepController extends Controller
{

    /**
     * Retorna os dados de logradouro, bairro e cidade de acordo com o CEP informado
     * @param Request $request
     * @param $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function cep(Request $request, $cep)
    {
        $cep = str_replace('-', '', $cep);
        $cep = Cep::join('cidade', 'cidade.id', '=', 'cep.cidade_id')
                  ->join('estado', 'estado.id', '=', 'cidade.estado_id')
                  ->where('cep', '=', $cep)
                  ->first(['logradouro', 'bairro', 'cep', 'tipo_logradouro', 'cidade.nome', 'estado.uf']);
        return response()->json($cep);
    }

    /**
     * Retorna o estado e a extensão dos CEPs do mesmo (de: até:)
     * @param Request $request
     * @param mixed $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function estado(Request $request, $cep)
    {
        $cep = (int)substr($cep, 0, 5);
        $estado = Estado::where('cep_de', '<=', $cep)
                        ->where('cep_ate', '>=', $cep)
                        ->first(['uf', 'nome', 'cep_de', 'cep_ate']);
        return response()->json($estado);
    }

    /**
     * Retorna a cidade e a extensão correspondente ao CEP informado
     * @param Request $request
     * @param $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function cidade(Request $request, $cep)
    {
        $cidade = Cidade::join('estado', 'estado.id', '=', 'cidade.estado_id')
                        ->where('cidade.cep_unico', '<=', $cep)
                        ->where('cidade.cep_unico', '>=', $cep)
                        ->first(['cidade.nome', 'cidade.cep_unico']);
        return response()->json($cidade);
    }
}