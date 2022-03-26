<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Usuario
{
    private $pdo;
    public $msg = "";

    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * NOME
     * @var string
     */
    public $user;

    /**
     * DATA NASCIMENTO
     * @var string
     */
    public $senha;

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

        // POST SENHA CRIPTOGRAFADA

        // POST USER
        $obDatabase = new Database('usuario');
        $this->id = $obDatabase->insert([ 'user'    => $this->user,
                                          'senha'   => $this->senha,
                                          'data'    => $this->data
                                        ]);

        // SUCESSO
        return true;
    }
}
