<?php
namespace App\Models;

use CodeIgniter\Model;

class GestorModel extends Model
{
  protected $table = 'gestor';
  protected $primaryKey = 'gestor_id';
  protected $allowedFields = ['gestor_id', 'nome', 'cargo'];
  protected $returnType = 'object';

  public function insertGestor($data)
  {
    $this->db->table($this->table)->insert($data);
  }

  public function deleteGestor($id)
  {
    $this->db->table($this->table)->where('gestor_id', $id)->delete();
  }
}
?>