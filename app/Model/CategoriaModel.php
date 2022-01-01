<?php

class Categoria extends AppModel {

    public $name = "Categoria";
    public $useTable = "categorias";

      public $validate = array(
      	'id'=>VALID_NOT_EMPTY,
      	'categoria'=>VALID_NOT_EMPTY);

    
}//class

?>
