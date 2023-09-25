<?php
    namespace App\Controllers;

    use \App\Models\PessoaModel;

    class Pessoa extends BaseController {
        public static function exibir(): string {
            $pessoaModel = new PessoaModel();

            $data['pessoas'] = $pessoaModel->findAll();
            $data['titulo'] = 'Todas as pessoas';

            return view('pessoa_exibir', $data);
        }
    }
?>