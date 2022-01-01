<?php

App::uses('AppController', 'Controller');

class CarrerasController extends AppController {

    public $uses = array("Carrera");


     public function beforeFilter(){

        $this->layout = "backend";
     }

    public function index(){


         $this->layout = "backend";

        $this->set("title_for_layout","Panel de Carreras");
        $this->set("carreras", $this->Carrera->find("all"));

    }




      public function add(){

        if ($this->request->is('post')) {
            // If the form data can be validated and saved...
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if($this->Carrera->validates()){


                    if ($this->Carrera->save($this->request->data)) {

                                $this->redirect('/carreras/index');
                        }else{
                                echo "<br/>Ocurrio un error al registrar</strong>";
                                $this->render(false);
                        }
            }else{
                echo "<br/>ERROR DE VALIDACION</strong>";
            }
        }//post

    }//function



     public function edit($id = null ){

      $this->layout = "backend";

        if (!$id) {
            throw new NotFoundException(__('Invalid record'));
        }

        $carrera = $this->Carrera->findById($id);


        if (!$carrera) {
            throw new NotFoundException(__('Invalid carrera'));
        }

         if ($this->request->is(array('post', 'put'))) {
            $this->Carrera->id = $id;

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Carrera->save($this->request->data)) {

              $msg = '<div class="alert">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Datos actualizados correctamente</strong>
                        </div>';

              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"index"));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $carrera;
        }

    }//function





}//class
?>