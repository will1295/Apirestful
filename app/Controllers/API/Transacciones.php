<?php

namespace App\Controllers\API;
use App\Models\TransaccionModel;
use App\Models\CuentaModel;
use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController;

class Transacciones extends ResourceController
{

    public function __construct(){
        //Dandole valor a la propiedad modelo del resource controller 
        $this->model = $this->setModel(new TransaccionModel());
    }

    public function index()
    {
        //Declarando una variable para guardar mi consulta
        $transacciones = $this->model->findAll();
        return $this->respond($transacciones);
    }

    
    public function create(){
        try{
            //Conseguir el json que se inserta por medio del postman
            $transaccion = $this->request->getJSON();
            if($this->model->insert($transaccion)):
                $transaccion->id = $this->model->insertID();
                //Implementacion de la funcion
                $transaccion->resultado = $this->actualizarfondos($transaccion->idtipot, $transaccion->monto, $transaccion->idcuenta);
                //var_dump($transaccion);
                return $this->respondCreated($transaccion);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function edit($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');
            $cliente = $this->model->find($id);
            
            if($cliente == null)
            return $this->failNotFound('No se ha encontrado al cliente solicitado');

            return $this->respond($cliente);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function update($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');

            $clienteact = $this->model->find($id);

            if($clienteact == null)
            return $this->failNotFound('No se ha encontrado al cliente para actualizar');

            $cliente = $this->request->getJSON();
            if($this->model->update($id,$cliente)):
                $cliente->id = $id;
                return $this->respondCreated($cliente);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;

            return $this->respond($cliente);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function delete($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');
            $clientedel = $this->model->find($id);
            
            if($clientedel == null)
            return $this->failNotFound('No se ha encontrado al cliente solicitado');
           
            if($this->model->delete($id)):
                return $this->respondDeleted($clientedel);
            else:
            return $this->failNotFound('No se ha encontrado al cliente que se desea borrar');
        endif;
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
       
    }
    public function actualizarfondos($tipot,$monto,$idcuenta){
        $modelCuenta = new CuentaModel();
        $cuenta = $modelCuenta->find($idcuenta);
        //Evalua el tipo de transaccion
        switch($tipot){
            case 1:
                $cuenta["fondos"] += $monto;
                break;
            case 2:
                $cuenta["fondos"] -= $monto;
                break;
        }

        if($modelCuenta->update($idcuenta, $cuenta)):
            return array('TransaccionExitosa' => true);
        else:
            return array('TransaccionFallida' => false);
        endif;
    }

    public function getTransaccionesCliente ($id=null){
        try{
            $modelCliente = new ClienteModel();
            if($id==null)
            return $this->failValidationError('El registro no existe');
            $cliente = $modelCliente->find($id);
            if($cliente == null)
            return $this->failNotFound('No se ha encontrado al cliente solicitado');

            $transaccionescli = $this->model->TransaccionesCliente($id);
            return $this->respond($transaccionescli);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }
    




}