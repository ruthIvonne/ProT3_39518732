<?php
namespace App\Models;
use CodeIgniter\Model;

class usuario_model extends Model {
    protected $table = "usuario";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'ciudad', 'pais', 'perfil_id', 'baja', 'created_at'];
}