<?php

namespace App\Controllers\API;
use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController;

class Clientes extends ResourceController
{

    public function __construct(){
        //Dandole valor a la propiedad modelo del resource controller 
        $this->model = $this->setModel(new ClienteModel());
    }

    public function index()
    {
        //Declarando una variable para guardar mi consulta
        $clientes = $this->model->findAll();
        return $this->respond($clientes);
    }

    public function create(){
        try{
            $cliente = $this->request->getJSON();
            if($this->model->insert($cliente)):
                return $this->respondCreated();
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


}