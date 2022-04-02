<?php

namespace App\Controllers\API;
use App\Models\CuentaModel;
use CodeIgniter\RESTful\ResourceController;

class Cuentas extends ResourceController
{

    public function __construct(){
        //Dandole valor a la propiedad modelo del resource controller 
        $this->model = $this->setModel(new CuentaModel());
    }

    public function index()
    {
        //Declarando una variable para guardar mi consulta
        $cuentas = $this->model->findAll();
        return $this->respond($cuentas);
    }

    public function create(){
        try{
            $cuenta = $this->request->getJSON();
            if($this->model->insert($cuenta)):
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
            $cuenta = $this->model->find($id);
            
            if($cuenta == null)
            return $this->failNotFound('No se ha encontrado esta cuenta');

            return $this->respond($cuenta);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function update($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');

            $cuentaact = $this->model->find($id);

            if($cuentaact == null)
            return $this->failNotFound('No se ha encontrado la cuenta para actualizar');

            $cuenta = $this->request->getJSON();
            if($this->model->update($id,$cuenta)):
                $cuenta->id = $id;
                return $this->respondCreated($cuenta);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;

            return $this->respond($cuenta);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function delete($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');
            $cuentadel = $this->model->find($id);
            
            if($cuentadel == null)
            return $this->failNotFound('No se ha encontrado la cuenta');
           
            if($this->model->delete($id)):
                return $this->respondDeleted($cuentadel);
            else:
            return $this->failNotFound('No se ha encontrado la cuenta que se desea borrar');
        endif;
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
       
    }


}