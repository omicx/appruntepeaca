<?php

App::uses('AppController', 'Controller');
#App::import("Vendor", "phpqrcode/qrlib");


class InscripcionesController extends AppController {

    public $uses = array("Participante","Carrera","Categoria");
    public $helpers = array("QrCode","Session");



    public function beforeFilter(){
        $carreras = $this->Carrera->find("list",array("fields"=>array("id","carrera")));

        $categorias = $this->Categoria->find("list",array("fields"=> array("id","categoria") ));

        $this->set("carreras",$carreras);
        $this->set("categorias",$categorias);

        $this->set("titulo_encabezado", "1a. Carrera Trail 13km - Ayudanos a Ayudar");
        $this->set("fecha_encabezado", "2 de Septiembre del 2018 - 8 AM");
        
    }


    public function index() {

        $this->set("titulo_encabezado", "1a. Carrera Trail 13km - Ayudanos a Ayudar");
        $this->set("fecha_encabezado", "2 de Septiembre del 2018 - 8 AM");

        $carreras = $this->Carrera->find("list",array("fields"=>array("id","carrera")));

        $categorias = $this->Categoria->find("list",array("fields"=> array("id","categoria") ));

        $this->set("carreras",$carreras);
        $this->set("categorias",$categorias);
        

        $genero = array("masculino"=>"Masculino", "femenino"=>"Femenino");
        $this->set("genero_options" , $genero );

        $this->set("carrera_id",1);


    }//function

    public function nuevo(){
        $this->render("index");
    }//function



    public function registro(){

         if ($this->request->is('post')) {
            // If the form data can be validated and saved...
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if($this->Participante->validates()){

                    $last = $this->Participante->find("count");
                    $last+=1;

                    $this->request->data['Participante']['numero_participante'] = $last;
                    //$this->request->data['Participante']['numero_participante'] = $this->request->data['Participante']['telefono'];
                    //$this->request->data['Participante']['carrera_id'] = "KIDS";

                    //se puso estas lineas para validar la curp que no se repita
                    $curp_participante = $this->request->data['Participante']['curp'];
                    $curp_participante = strtoupper($curp_participante);
                    $curp_participante = strtoupper($curp_participante)."-".$last;
                    $this->request->data['Participante']['curp'] = $curp_participante;

                    $curps = $this->Participante->find( "list", array("fields"=> array("curp","curp" ) ) );

                    //validar existe CURP
                    if(array_key_exists($curp_participante, $curps)){

                        $participante = $this->Participante->find( "first", array( "conditions"=>array("Participante.curp"=>$curp_participante )));

                        $this->layout = "print";
                        $this->set("participante",$participante  );

                        $this->redirect('/inscripciones/carta_existente/'.$participante['Participante']['id']);

                    }else{

                    if ($this->Participante->save($this->request->data)) {

                        $lastId = $this->Participante->getLastInsertID();
                        #$email_sent = $this->__sendActivationEmail($this->request->data['Participante']['email'], $this->request->data['Participante']['nombre_completo'], $lastId);

                        $email_sent['confirm'] = 1;
                        $email_sent['dir_email'] = $this->request->data['Participante']['email'];

                        if($email_sent['confirm']){
                                $this->layout = "print";

                                $this->set("lastId",$lastId);
                                $this->set("participante", $this->Participante->find( "first", array( "conditions"=>array("Participante.id"=>$lastId ) ) ) );
                                #$this->render("carta");
                                $this->redirect('/inscripciones/carta/'.$lastId);
                                #$this->redirect("/");
                        }else{
                                echo "<br/>Ocurrio un error al enviar un correo de confirmaci&oacute;n a <strong>".$email_sent['dir_email']."</strong>";
                                $this->render(false);
                        }
                    }//fi

                    }
            }else{
                echo "<br/>ERROR DE VALIDACION</strong>";
            }



        }//fi

    }//function





    public function edit($id = null ){

      $this->layout = "backend";

        if (!$id) {
            throw new NotFoundException(__('Invalid record'));
        }

        $participante = $this->Participante->findById($id);


        if (!$participante) {
            throw new NotFoundException(__('Invalid participante'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Participante->id = $id;

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Participante->save($this->request->data)) {

              $msg = '<div class="alert">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Datos actualizados correctamente</strong>
                        </div>';

                        #$this->Session->setFlash('Registro Guardado!', 'default', array(), 'good' );

              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"panel"));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $participante;
        }

    }//function



    public function paymentupdate($id = null ){
        $this->layout = "ajax";

        if (!$id) {
            throw new NotFoundException(__('Invalid record'));
        }

        $participante = $this->Participante->findById($id);

        if (!$participante) {
            throw new NotFoundException(__('Invalid participante'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Participante->id = $id;

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Participante->save($this->request->data)) {

              $msg = '<div class="alert alert-error">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Datos actualizados correctamente</strong>
                        </div>';

              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"panel"));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $participante;
        }

    }//function




public function actualizarpago_view(){
  $this->layout = "ajax";

  if ($this->request->is(array('post', 'put'))) {
      $id = $this->request->data['id'];//obtenidos desde ajax
      $this->Participante->id = $id;
      $participante = $this->Participante->findById($id);

      $this->request->data['Participante']['id'] = $id;
      $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
      $this->request->data = $participante;
    }

}//function

public function actualizarpago_action($id = null ){
    $this->layout = "ajax";
    $this->render(false);

    if ($this->request->is(array('post', 'put'))) {

        $this->Participante->id = $id;

        $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

        if ($this->Participante->save($this->request->data)) {
          $msg = '<div><strong>Datos actualizados correctamente</strong></div>';
          echo $msg;
        }
    }

}//function



    public function entregado($id = null ){
        $this->layout = "backend";
        if (!$id) {
            throw new NotFoundException(__('Invalid record'));
        }
        $participante = $this->Participante->findById($id);

        if (!$participante) {
            throw new NotFoundException(__('Invalid participante'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Participante->id = $id;

            $this->request->data['Participante']['id'] = $id;
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Participante->save($this->request->data)) {

              $msg = '<div class="alert">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Paquete entregado al participante</strong>
                        </div>';
              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"panel"));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $participante;
        }
    }//function



    public function editdistance($id = null ){
        $this->layout = "backend";

        $carreras = array("KIDS"=>"Kids 7Enero2018");

        $this->set("carreras",$carreras);


        if (!$id) {
            throw new NotFoundException(__('Invalid record'));
        }

        $participante = $this->Participante->findById($id);

        if (!$participante) {
            throw new NotFoundException(__('Invalid participante'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Participante->id = $id;

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            if ($this->Participante->save($this->request->data)) {

              $msg = '<div class="alert alert-error">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Paquete entregado al participante</strong>
                        </div>';

                        #$this->Session->setFlash('Registro Guardado!', 'default', array(), 'good' );

              $this->Session->setFlash($msg);
              return $this->redirect(array("action"=>"panel"));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $participante;
        }

    }//function



     /**
   * Send out an activation email to the user.id specified by $user_id
   *  @param Int $user_id User to send activation email to
   *  @return Boolean indicates success
   */
   function __sendActivationEmail($mail,$nombre, $lastId) {

        // Set data for the "view" of the Email
        $this->set('activate_url', 'http://' . env('SERVER_NAME').'/inscripciones/carta/'.$lastId );
        $this->set('participante', $nombre);
        $this->set('carrera_title', 'RUN TEPEACA :: 13km CARRERA TRAIL CON CAUSA');
        $this->set('fecha_carrera', '2 de Septiembre de 2018 a las 8:00 hrs');
        $this->set('lugar_carrera', 'Parque Tepeyacatl Tepeaca, Puebla');


        $this->set('server_url', 'http://trail.runtepeaca.com' );
        #$this->set('server_url', 'http://app.runtepeaca' );

           /* Opciones SMTP*/
                   $this->Email->smtpOptions = array(
                                'port'=>'465',
                                'timeout'=>'60',
                                'host' => 'ssl://hapi.hosting-mexico.net',#server smtp
                                'username'=>'contacto@runtepeaca.com',#usuario
                                'password'=>'somosRunt3p3aca2018');//password

                #Configurar m�todo de entrega
                $this->Email->delivery = 'smtp';
                $this->Email->to = trim($mail);

                $this->Email->bcc = array("ofm.isc@gmail.com","erikamtz10@hotmail.com");


            $this->Email->subject = 'RUN TEPEACA :: 13km CARRERA TRAIL CON CAUSA';
            $this->Email->from = 'Club de Atletismo Run Tepeaca 2018 <contacto@runtepeaca.com>';
            $this->Email->layout = 'run';
            $this->Email->template = 'run_confirmnin';
            $this->Email->sendAs = 'html';   // you probably want to use both :)

            $return['confirm'] = $this->Email->send();
            $return['dir_email'] = trim($mail);
        return $return ;
   }//function



    public function carta( $participante_id ){
        $this->layout = "print";

        $this->set("title_for_layout","Carta de Exhoneracion");

        $this->set("participante", $this->Participante->find( "first", array( "conditions"=>array("Participante.id"=>$participante_id ) ) ) );

    }//function


     public function carta_existente( $participante_id ){
        $this->layout = "print";

        $this->set("title_for_layout","Existe Participante registrado");


        $this->set("participante", $this->Participante->find( "first", array( "conditions"=>array("Participante.id"=>$participante_id ) ) ) );

    }//function



    public function reenviar($id){
        $lastId = $id;

        $participante = $this->Participante->find( "first", array( "conditions"=>array("Participante.id"=>$id ) ) ) ;


        $email_sent = $this->__sendActivationEmail($participante['Participante']['correo'], $participante['Participante']['nombre_completo'], $lastId);

        #$email_sent['confirm'] = 1;
        #$email_sent['dir_email'] = $participante['Participante']['correo'];

        if($email_sent['confirm']){
                $this->layout = "print";

                $this->set("lastId",$lastId);
                $this->set("participante", $participante);
                $this->render("carta");
                #$this->render("registro");
        }else{
                echo "<br/>Ocurrio un error al enviar un correo de confirmaci&oacute;n a <strong>".$email_sent['dir_email']."</strong>";
                $this->render(false);
        }
    }//function


    public function lista(){
        $this->layout = "layout_lista";
        $this->set("title_for_layout","Carta de Exhoneracion");
        $this->set("participantes", $this->Participante->find("all"));
    }


     public function consulta(){
        $this->layout = "layout_lista";
        $this->set("title_for_layout","Consulta General de Participantes");
        $this->set("participantes", $this->Participante->find("all", array("order"=>"id desc")));
    }


    public function panel(){
        $this->layout = "backend";

        $this->set("title_for_layout","Panel de Control");
        $this->set("participantes", $this->Participante->find("all"));
    }




    public function listacategoria( $carrera_id ="5K" ){
        #$this->layout = "print";

        $this->layout = "layout_lista";
        $this->set("title_for_layout","Carrera KIDS");

      

        $this->set( "participantes", $this->Participante->find( "all") );


    }//function


    public function listacategoriaprint( $carrera_id ="5K" ){
        $this->layout = "printer";

        $this->set("title_for_layout","Carrera KIDS");

        $carreras = array("KIDS"=>"Kids 7Enero2018");

        $categorias = array(
            "12" => "12 años",
            "11" => "11 años",
            "10" => "10 años",
            "9A" => "9 años",
            "8A" => "8 años",
            "2E" => "2 - 12 años Especial",
            "7A" => "7 años",
            "6A" => "6 años",
            "5A" => "5 años",
            "4A" => "4 años",
            "3A" => "3 años",
            "2A" => "2 años");

        $this->set("carreras",$carreras);
        $this->set("categorias",$categorias);


        $this->set( "participantes", $this->Participante->find( "all") );


    }//function




     public function listaultimos( $carrera_id ="KIDS" ){
        #$this->layout = "print";

        $this->layout = "layout_lista";
        $this->set("title_for_layout","Carrera KIDS");

        $carreras = array("KIDS"=>"Kids 7Enero2018");

        $categorias = array(
            "12" => "12 años",
            "11" => "11 años",
            "10" => "10 años",
            "9A" => "9 años",
            "8A" => "8 años",
            "2E" => "2 - 12 años Especial",
            "7A" => "7 años",
            "6A" => "6 años",
            "5A" => "5 años",
            "4A" => "4 años",
            "3A" => "3 años",
            "2A" => "2 años");

        $this->set("carreras",$carreras);
        $this->set("categorias",$categorias);

        $this->Participante->useTable = 'participantesafter';
        $this->set( "participantes", $this->Participante->find( "all") );


    }//function



}//class


?>
