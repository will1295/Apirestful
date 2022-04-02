<?php

namespace App\Controllers\API;
use App\Models\TipotModel;
use CodeIgniter\RESTful\ResourceController;

class TipoT extends ResourceController
{

    public function __construct(){
        //Dandole valor a la propiedad modelo del resource controller 
        $this->model = $this->setModel(new TipotModel());
    }

    public function index()
    {
        //Declarando una variable para guardar mi consulta
        $tipot = $this->model->findAll();
        return $this->respond($tipot);
    }

    public function create(){
        try{
            $tipot = $this->request->getJSON();
            if($this->model->insert($tipot)):
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
            $tipot = $this->model->find($id);
            
            if($tipot == null)
            return $this->failNotFound('No se ha encontrado el registro');

            return $this->respond($tipot);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function update($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');

            $tipotact = $this->model->find($id);

            if($tipotact == null)
            return $this->failNotFound('No se ha encontrado el registro para actualizar');

            $tipot = $this->request->getJSON();
            if($this->model->update($id,$tipot)):
                $tipot->id = $id;
                return $this->respondCreated($tipot);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;

            return $this->respond($tipot);
            
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
    }

    public function delete($id = null)
    {
        try{
            if($id==null)
            return $this->failValidationError('El registro no existe');
            $tipotdel = $this->model->find($id);
            
            if($tipotdel == null)
            return $this->failNotFound('No se ha encontrado el registro');
           
            if($this->model->delete($id)):
                return $this->respondDeleted($tipotdel);
            else:
            return $this->failNotFound('No se ha encontrado el registro que se desea borrar');
        endif;
        }catch(\Exception $e){
            return $this->failServerError('Ha ocurrido un problema, intentelo de nuevo');
        }
       
    }


}