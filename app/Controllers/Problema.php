<?php
namespace App\Controllers;

use App\Models\GestorModel;
use \App\Models\ProblemaModel;

class Problema extends BaseController
{
    protected $helpers = ['form'];
    public static function exibir(): string
    {
        $model = new ProblemaModel();
        $gestorModel = new GestorModel();

        // Obtenha os gestores do banco de dados
        $gestores = $gestorModel->findAll();

        // Crie um array associativo para usar com form_dropdown
        $options = [];
        foreach ($gestores as $gestor) {
            $options[$gestor->gestor_id] = $gestor->nome;
        }

        // Passe os dados para a sua view
        $data['options'] = $options;
        $data['problemas'] = $model->findAll();
        $data['gestorModel'] = $gestorModel;

        $data['titulo'] = 'PHP - CodeIgniter';

        return view('problema_exibir', $data);
    }
}
?>