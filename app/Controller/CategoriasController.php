<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {

    public $uses = array("Categoria");


     public function beforeFilter(){

        $this->layout = "backend";
     }

    public function index(){


         $this->layout = "backend";

        $this->set("title_for_layout","Panel de Categorias");
        $this->set("categorias", $this->Categoria->find("all"));

    }




      public function add(){

        if ($this->request->is('post')) {
            // If the form data can be validated and saved...
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if($this->Categoria->validates()){


                    if ($this->Categoria->save($this->request->data)) {

                                $this->redirect('/categorias/index');
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

        $categoria = $this->Categoria->findById($id);


        if (!$categoria) {
            throw new NotFoundException(__('Invalid categoria'));
        }

         if ($this->request->is(array('post', 'put'))) {
            $this->Categoria->id = $id;

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Categoria->save($this->request->data)) {

              $msg = '<div class="alert">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Datos actualizados correctamente</strong>
                        </div>';

              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"index"));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $categoria;
        }

    }//function



}//class
?>