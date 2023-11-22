<?php
namespace App\Models;

use CodeIgniter\Model;

class ProblemaModel extends Model
{
    protected $table = 'ambiente';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nome', 'localizacao', 'descricao', 'gestor_id'];
    protected $returnType = 'object';

    public function insertProblema($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function deleteProblema($id)
    {
        $this->db->table($this->table)->where('id', $id)->delete();
    }
}
?>