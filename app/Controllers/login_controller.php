<?php
namespace App\Controllers;

use App\Models\usuario_model;
use CodeIgniter\Controller;

class login_controller extends BaseController
{
    public function index()
    {
        helper(["form", 'url']);

        $dato['titulo'] = 'iniciar sesion';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('backend/usuario/login');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_model();

        /*traemos los datos del formulario*/
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/login');
            }
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $data['Id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'usuario' => $data['usuario'],
                    'email' => $data['email'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE,
                ];
                $session->set($ses_data);
                session()->setFlashdata('msg', 'Bienvenido!');
                return redirect()->to('/panel');
            } else {
                $session->setFlashdata('msg', 'Password Incorrecta');
                return redirect()->to('/login');
            }

        } else {
            $session->setFlashdata('msg', 'No existe el email o es incorrecto');
            return redirect()->to('/login');;
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}