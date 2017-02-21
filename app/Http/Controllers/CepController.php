<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 19/02/17
 * Time: 21:31
 */

namespace App\Http\Controllers;

use App\Models\Cep;
use Illuminate\Http\Request;

class CepController extends Controller
{

    /**
     * Retorna os dados de logradouro, bairro e cidade de acordo com o CEP informado
     * @param Request $request
     * @param string $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function cep(Request $request, $cep)
    {
        $cep = Cep::buscarCep($this->limparCep($cep));
        return response()->json($cep);
    }

    /**
     * Retorna o estado e a extensão dos CEPs do mesmo (de: até:)
     * @param Request $request
     * @param string $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function estado(Request $request, $cep)
    {
        $estado = Cep::buscarEstado($this->limparCep($cep));
        return response()->json($estado);
    }

    /**
     * Retorna a cidade e a extensão correspondente ao CEP informado
     * @param Request $request
     * @param string $cep
     * @return \Illuminate\Http\JsonResponse
     */
    public function cidade(Request $request, $cep)
    {
        $cidade = Cep::buscarCidade($this->limparCep($cep));
        return response()->json($cidade);
    }

    /**
     * Limpa a string com o CEP informado
     * @param string $cep
     * @return string
     */
    private function limparCep($cep)
    {
        $ignorar = ['-', '.'];
        return str_replace($ignorar, '', $cep);
    }
}