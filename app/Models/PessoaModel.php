<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class PessoaModel extends Model {
        protected $table = 'pessoas';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id', 'nome', 'naturalidade'];
        protected $returnType = 'object';
    }
?>