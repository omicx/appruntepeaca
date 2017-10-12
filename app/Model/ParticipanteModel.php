<?php

class Participante extends AppModel {

    public $name = "Participante";
    public $useTable = "participantes";
    
    public $validate = array(
        'carrera_id'=>VALID_NOT_EMPTY,
        'categoria_carrera_id'=>VALID_NOT_EMPTY,
        'nombre_completo'=>VALID_NOT_EMPTY,
        'edad'=>VALID_NOT_EMPTY,
        'correo'=>VALID_NOT_EMPTY,
        'nombre_completo'=>VALID_NOT_EMPTY,
        'lugar_procedencia'=>VALID_NOT_EMPTY
    );
    
    #public $belongsTo = array("Carrera", "CategoriaCarrera");
    
}//class

?>
