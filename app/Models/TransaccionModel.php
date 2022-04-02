<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaccionModel extends Model
{
    protected $table      = 'tbltransaccion';
    protected $primaryKey = 'idtransaccion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['idcuenta', 'monto','idtipot'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modificado';
    protected $deletedField  = 'fecha_eliminado';

    protected $validationRules    = [
        'monto'       =>'required|decimal|greater_than[0]'
    ];
    protected $validationMessages = [
        'monto' => [
            'required' => 'Ingrese una cantidad',
            'greater_than'=>'No puede ingresar una cantidad menor a cero'
        ]
    ];
    protected $skipValidation     = false;

    public function TransaccionesCliente($idcliente = null){
        $builder = $this->db->table($this->table);
        $builder->select('tblcuenta.idcuenta, tblcliente.nombre, tblcliente.apellido');
        $builder->select('tbltipot.descrtipo, tbltransaccion.monto'); 
        $builder->join('tblcuenta', 'tbltransaccion.idcuenta = tblcuenta.idcuenta');
        $builder->join('tbltipot', 'tbltransaccion.idtipot = tbltipot.idtipot');
        $builder->join('tblcliente', 'tblcuenta.idcliente = tblcliente.idcliente');
        $builder->where('tblcliente.idcliente', $idcliente);
        $query = $builder->get();
        return $query->getResult();
    }
}