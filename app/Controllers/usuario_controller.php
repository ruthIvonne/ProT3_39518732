<?php
namespace App\Controllers;

use App\Models\usuario_model;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        $dato['titulo'] = 'suscribirse';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('backend/usuario/register');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $rules = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]',
            'ciudad' => 'required|min_length[3]',
            'pais' => 'required|min_length[3]',
        ];

        $formModel = new usuario_model();

        if (!$this->validate($rules)) {
            $data['titulo'] = 'suscribirse';
            $data['validation'] = $this->validator;
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('backend/usuario/register', $data);
            echo view('front/footer_view');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'), 
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT), // Hash de la contraseña
                'ciudad' => $this->request->getVar('ciudad'),
                'pais' => $this->request->getVar('pais'),
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return $this->response->redirect('/login');
        }
    }
}