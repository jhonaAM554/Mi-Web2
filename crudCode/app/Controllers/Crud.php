<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
    public function index()
    {
        $Crud = new CrudModel();
        $datos = $Crud->listarNombres();
        $mensaje = session()->getFlashdata('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];

        return view('listado', $data);
    }

    public function crear()
    {
        $datos = [
            "nombre"  => $this->request->getPost('nombre'),
            "paterno" => $this->request->getPost('paterno'),
            "materno" => $this->request->getPost('materno')
        ];

        $Crud = new CrudModel();
        $respuesta = $Crud->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to('/')->with('mensaje', '1');
        } else {
            return redirect()->to('/')->with('mensaje', '0');
        }
    }

    public function obtenerNombre($idNombre)
    {
        $Crud = new CrudModel();
        $respuesta = $Crud->obtenerNombre($idNombre);

        $data = ["datos" => $respuesta];

        return view('actualizar', $data);
    }

    public function actualizar()
    {
        $idNombre = $this->request->getPost('idNombre');

        $datos = [
            "nombre"  => $this->request->getPost('nombre'),
            "paterno" => $this->request->getPost('paterno'),
            "materno" => $this->request->getPost('materno')
        ];

        $Crud = new CrudModel();
        $respuesta = $Crud->actualizarNombre($idNombre, $datos);

        if ($respuesta) {
            return redirect()->to('/')->with('mensaje', '2');
        } else {
            return redirect()->to('/')->with('mensaje', '3');
        }
    }

    public function eliminar($idNombre)
    {
        $Crud = new CrudModel();
        $respuesta = $Crud->eliminarNombre($idNombre);

        if ($respuesta) {
            return redirect()->to('/')->with('mensaje', '4');
        } else {
            return redirect()->to('/')->with('mensaje', '5');
        }
    }
}
