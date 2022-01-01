<?php

class Carrera extends AppModel {

    public $name = "Carrera";
    public $useTable = "carreras";
    

      public $validate = array('carrera'=>VALID_NOT_EMPTY);


}//class

?>
