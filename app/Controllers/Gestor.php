<?php
namespace App\Controllers;

use App\Models\GestorModel;

class Gestor extends BaseController
{
  public static function exibir(): string
  {
    $gestorModel = new GestorModel();
    // Obtenha os gestores do banco de dados
    $gestores = $gestorModel->findAll();

    $data['gestores'] = $gestores;

    $data['titulo'] = 'PHP - CodeIgniter';

    return view('gestores', $data);
  }

  public function delete($id)
  {
    $gestorModel = new GestorModel();

    try {

      $gestorModel->deleteGestor($id);

      return redirect()->to('public/exibirgestores')->with('success', 'Registro deletado com sucesso.');
    } catch (\Exception $e) {
      return redirect()->to('/')->with('error', $e->getMessage());
    }
  }

}
?>