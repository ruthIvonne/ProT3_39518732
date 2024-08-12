<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class panel_controller extends Controller
{
    public function index()
    {
        $session = session();
        $nombre = $session->get("usuario");
        $perfil = $session->get("perfil_id");

        $data['perfil_id'] = $perfil;

        $data['titulo'] = 'panel de usuario';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('backend/usuario/usuario_loggeado');
        echo view('front/footer_view');

    }

}