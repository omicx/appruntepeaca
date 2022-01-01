<script>

    $(function(){


        $("#ParticipanteIndexForm").submit(function(e) {

            var c = confirm("Seguro de Registrar los datos ?");
            return c;

        });//submit


        $('#ParticipanteFechaNacimiento').datepicker(
          {
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-75:+0',
            onSelect: function(value, ui) {
              var today = new Date().getTime(),
              dob = new Date(value).getTime();
              age = today - dob;
              yoa = Math.floor(age / 1000 / 60 / 60 / 24 / 365.25);

                  $('#ParticipanteEdad').val(yoa);
            }
          });


        $("#ParticipanteGenero").change(function(){
          edad = $("#ParticipanteEdad").val();
          gene = this.value;
          catego = "libre";

          if( (edad >= 18 && edad <= 39 && gene=="femenino") ){
             catego = "LF";
          }

          if( (edad >= 18 && edad <= 39 && gene=="masculino") ){
            catego = "LV";
          }
          if( (edad >= 40 && edad <= 49 && gene=="femenino") ){
             catego = "MF";
          }

          if( (edad >= 40 && edad <= 49 && gene=="masculino") ){
            catego = "MV";
          }
          if( (edad >= 50 && gene=="femenino") ){
            catego = "VF";
          }
          if( (edad >= 50 && gene=="masculino") ){
            catego = "VV";
          }

          $("#ParticipanteCategoriaCarreraId").val(catego);
          

        });//change


/*
        $("#ParticipanteGenero").change(function(){
          edad = $("#ParticipanteEdad").val();
          gene = this.value;
          catego = "libre";

          if( (edad >= 18 && gene=="femenino") ){
             catego = "LF";
          }

          if( (edad >= 18 && gene=="masculino") ){
            catego = "LV";
          }
          $("#ParticipanteCategoriaCarreraId").val(catego);
          

        });//change 
        */


      });
        

        function limit(element, max) {
            var max_chars = max;
            if(element.value.length > max_chars) {
                element.value = element.value.substr(0, max_chars);
            }
        }



</script>




<div id="dialog-confirm" title="Registrar" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Registrar Participante?</p>
</div>


<?php
echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal", "url"=>"/inscripciones/registro"));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 10px; text-align: center;">


<figure class="page-head-image">
    <?php echo $this->Html->image('header-inscripciones.png', array('alt' => 'run Tepeaca'));?>
</figure>

         <h1 style="font-size: 14pt; color: #f00005;">
          <?php echo $titulo_encabezado; ?> </h1>
          <p><?php #echo $fecha_encabezado; ?></p>

          <div class="form-group">
            <?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"", "class"=>"form-control","placeholder"=>"Nombre Completo","required"=>"required"));?>
          </div>

          <div class="form-group">
            <?=$this->Form->input("curp", array("readonly"=>$readonly, "label"=>"", "value"=>"curp00000_", "type"=>"text", "placeholder"=>"CURP","class"=>"form-control", "required"=>"required") );?>
          </div>

           <div class="form-group">

          <div class="row">
            <div class="col-md-6">
            <?=$this->Form->input("fecha_nacimiento", array("readonly"=>true, "label"=>"", "type"=>"text", "placeholder"=>"F. Nacimiento","class"=>"form-control", "required"=>"required") );?>
            </div>

            <div class="col-md-4">
            <?=$this->Form->input("edad", array("readonly"=>false,"label"=>"","type"=>"text","placeholder"=>"Edad","required"=>"required","class"=>"form-control","min"=>"12", "max"=>"75", "onkeydown"=>"limit(this, 2);", "onkeyup"=>"limit(this, 2);"));?>
            </div>
          </div>

          </div>

          <div class="form-group">
          <div class="row">
          
          <div class="col-md-6">
            <?=$this->Form->input("email", array("readonly"=>$readonly, "label"=>"","value"=>"run.tepeaca@hotmail.com", "type"=>"email", "placeholder"=>"Email","class"=>"form-control", "required"=>"required") );?>
            </div>

          <div class="col-md-6">
            <?=$this->Form->input("telefono", array("readonly"=>$readonly, "label"=>"", "value"=>"2232750008", "type"=>"text", "placeholder"=>"telefono","class"=>"form-control", "required"=>"required") );?>
          </div>
          
            </div>
            </div>

          <div class="form-group" >
          <?=$this->Form->input("genero",array("readonly"=>$readonly, 'label'=>'', 'class'=>'form-control', 'options' => $genero_options,'empty' => 'Selecciona Genero ..', "required"=>"required"));?>
          </div>

          <div class="form-group">
            <?=$this->Form->input("categoria_carrera_id",array('readonly'=>true,'label'=>'','class'=>'form-control', 'options'=>$categorias, 'empty' => 'Selecciona Categoria ..','required'=>'required'));?>
            </div>



          <div class="form-group">
            <?=$this->Form->input("lugar_procedencia", array("readonly"=>$readonly,"label"=>"","value"=>"Puebla","placeholder"=>"Lugar de Procedencia","class"=>"form-control","required"=>"required" ));?>

             <?=$this->Form->input("carrera_id", array("value" => $carrera_id, "type"=> "hidden") ); ?>
          </div>

          

          <div class="f1-buttons">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Registrarme</button>
          </div>

          <br>



  </fieldset>
<?php echo $this->Form->end();?>
