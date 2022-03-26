<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Cliente
{
    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * NOME
     * @var string
     */
    public $nome;

    /**
     * DATA NASCIMENTO
     * @var string
     */
    public $nascimento;

    /**
     * CPF
     * @var string
     */
    public $cpf;

    /**
     * RG
     * @var string
     */
    public $rg;

    /**
     * TELEFONE
     * @var string
     */
    public $telefone;

    /**
     * CEP
     * @var string
     */
    public $cep;

    /**
     * LOGRADOURO
     * @var string
     */
    public $logradouro;

    /**
     * NUMERO
     * @var string
     */
    public $numero;

    /**
     * BAIRRO
     * @var string
     */
    public $bairro;

    /**
     * CIDADE
     * @var string
     */
    public $cidade;

    /**
     * ESTADO
     * @var string
     */
    public $estado;

    /**
     * TIMESTAMP CRIAÇÃO
     * @var string
     */
    public $data;

    /**
     * MÉTODO CADASTRAR
     * @return boolean
     */
    public function cadastrar()
    {
        // DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        // POST
        $obDatabase = new Database('cliente');
        $this->id = $obDatabase->insert([ 'nome'          => $this->nome,
                                          'nascimento'    => $this->nascimento,
                                          'cpf'           => $this->cpf,
                                          'rg'            => $this->rg,
                                          'telefone'      => $this->telefone,
                                          'cep'           => $this->cep,
                                          'logradouro'    => $this->logradouro,
                                          'numero'        => $this->numero,
                                          'bairro'        => $this->bairro,
                                          'cidade'        => $this->cidade,
                                          'estado'        => $this->estado,
                                          'data'          => $this->data
                                        ]);

        // SUCESSO
        return true;
    }

    /**
     * PUT
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('cliente'))->update('id = '.$this->id, ['nome'         => $this->nome,
                                                                    'nascimento'    => $this->nascimento,
                                                                    'cpf'           => $this->cpf,
                                                                    'rg'            => $this->rg,
                                                                    'telefone'      => $this->telefone,
                                                                    'cep'           => $this->cep,
                                                                    'logradouro'    => $this->logradouro,
                                                                    'numero'        => $this->numero,
                                                                    'bairro'        => $this->bairro,
                                                                    'cidade'        => $this->cidade,
                                                                    'estado'        => $this->estado,
                                                                    'data'          => $this->data
                                                                  ]);
    }

    /**
     * DELETE
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('cliente'))->delete('id = '.$this->id);
    }

    /**
     * GET
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getClientes($where = null, $order = null, $limit = null)
    {
        return (new Database('cliente'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * BUSCAR CLIENTE PELO NOME
     * @param  string $id
     * @return Cliente
     */
    public static function getCliente($id)
    {
        return (new Database('cliente'))->select('id = '.$id)
                                  ->fetchObject(self::class);
    }
}
