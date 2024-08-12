<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='principal';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal');
        echo view('front/footer_view');
    }
    public function suscribirse()
    {
        $data['titulo']='suscribirse';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('backend/usuario/register');
        echo view('front/footer_view');
    }
    public function iniciar_sesion()
    {
        $data['titulo']='iniciar sesion';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('backend/usuario/login');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        $data['titulo']='quienes somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }
}
