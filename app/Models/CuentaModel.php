<?php

namespace App\Models;

use CodeIgniter\Model;

class CuentaModel extends Model
{
    protected $table      = 'tblcuenta';
    protected $primaryKey = 'idcuenta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['fondos', 'idcliente'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modificado';
    protected $deletedField  = 'fecha_eliminado';

    protected $validationRules    = [
        'fondos'       =>'required|decimal|greater_than[0]'
    ];
    protected $validationMessages = [
        'fondos' => [
            'required' => 'Ingrese una cantidad',
            'greater_than'=>'No puede ingresar una cantidad menor a cero'
        ]
    ];
    protected $skipValidation     = false;
}