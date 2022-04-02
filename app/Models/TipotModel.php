<?php

namespace App\Models;

use CodeIgniter\Model;

class TipotModel extends Model
{
    protected $table      = 'tbltipot';
    protected $primaryKey = 'idtipot';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['descrtipo'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modificado';
    protected $deletedField  = 'fecha_eliminado';

    protected $validationRules    = [
        'descrtipo'       =>'required|alpha_space|min_length[3]|max_length[50]'
    ];
    protected $validationMessages = [
        'descrtipo' => [
            'required' => 'Este campo es requerido'
        ]
    ];
    protected $skipValidation     = false;
}