<?php
namespace App\Models;

use CodeIgniter\Model;

class GestorModel extends Model
{
  protected $table = 'gestor';
  protected $primaryKey = 'gestor_id';
  protected $allowedFields = ['gestor_id', 'nome', 'cargo'];
  protected $returnType = 'object';
}
?>