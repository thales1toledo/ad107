<?php

namespace App\Controllers;

use App\Models\GestorModel;
use App\Models\ProblemaModel;

class RegisterController extends BaseController
{
	public function register()
	{
		$problemaModel = new ProblemaModel();
		$data = $this->request->getPost();
		try {
			$problemaModel->insertProblema($data);
			return true;
		} catch (\Exception $e) {
			return redirect()->to('/')->with('error', $e->getMessage());
		}
	}

	public function registerGestor()
	{
		$gestor = new GestorModel();
		$data = $this->request->getPost();
		try {
			$gestor->insertGestor($data);
			return true;
		} catch (\Exception $e) {
			return redirect()->to('/')->with('error', $e->getMessage());
		}
	}
}
?>