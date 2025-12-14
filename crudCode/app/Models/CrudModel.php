<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    protected $table = 't_personas';
    protected $primaryKey = 'id_nombre';
    protected $allowedFields = ['nombre', 'paterno', 'materno'];

    public function listarNombres()
    {
        return $this->findAll();
    }

    public function insertar($datos)
    {
        $this->insert($datos);
        return $this->insertID();
    }

    public function obtenerNombre($id)
    {
        return $this->where('id_nombre', $id)->first();
    }

    public function actualizarNombre($id, $data)
    {
        return $this->update($id, $data);
    }

    public function eliminarNombre($id)
    {
        return $this->delete($id);
    }
}
