<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 19/02/17
 * Time: 21:27
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Cidade;

class Cep extends Model
{
    /**
     * Nome da tabela
     * @var string
     */
    protected $table = 'cep';

    /**
     * Busca os dados de logradouro, bairro e cidade de acordo com o CEP informado
     * @param string $cep CEP informado
     * @return mixed
     */
    public static function buscarCep($cep)
    {
        $registro = self::join('cidade', 'cidade.id', '=', 'cep.cidade_id')
            ->join('estado', 'estado.id', '=', 'cidade.estado_id')
            ->where('cep', '=', $cep)
            ->first(['logradouro', 'bairro', 'cep', 'tipo_logradouro', 'cidade.nome as cidade', 'estado.uf']);

        if (!$registro) { // Se não encontrou o registro procura a cidade
            return self::buscarCidade($cep, ['cidade.nome as cidade', 'estado.uf']);
        }

        return $registro;
    }

    /**
     * Busca a cidade
     * @param string $cep Cep para pesquisa
     * @param array $campos Campos de retorno
     * @return mixed
     */
    public static function buscarCidade($cep, $campos = ['cidade.nome as cidade', 'estado.uf'])
    {
        $registro = Cidade::join('estado', 'estado.id', '=', 'cidade.estado_id')
            ->where('cidade.cep_unico', '<=', $cep)
            ->where('cidade.cep_unico', '>=', $cep)
            ->first($campos);

        if (!$registro) { // Se não encontrou a cidade busca o estado
            return self::buscarEstado($cep, ['uf']);
        }

        return $registro;
    }

    /**
     * Busca o estado
     * @param $cep
     * @param array $campos
     * @return mixed
     */
    public static function buscarEstado($cep, $campos = ['uf', 'nome', 'cep_de', 'cep_ate'])
    {
        $cep = (int)substr($cep, 0, 5);
        return Estado::where('cep_de', '<=', $cep)
            ->where('cep_ate', '>=', $cep)
            ->first($campos);
    }
}