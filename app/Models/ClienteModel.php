<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table      = 'tblcliente';
    protected $primaryKey = 'idcliente';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre', 'apellido','telefono','email'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modificado';
    protected $deletedField  = 'fecha_eliminado';

    protected $validationRules    = [
        'nombre'       =>'required|alpha_space|min_length[3]|max_length[50]',
        'apellido'       =>'required|alpha_space|min_length[3]|max_length[50]',
        'telefono'       =>'required|integer|exact_length[8]',
        'email'       =>'required|valid_email|max_length[75]',
    ];
    protected $validationMessages = [
        'telefono' => [
            'required' => 'El numero de telefono es requerido',
        ],
        'email' => [
            'valid_email' => 'El correo ingresado es invalido, por favor digitelo de nuevo',
        ]
    ];
    protected $skipValidation     = false;
}