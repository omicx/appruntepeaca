<script>

    $(function(){


        $('#ParticipanteFechaNacimiento').datepicker(
          {
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-70:+0',
            onSelect: function(value, ui) {
              var today = new Date().getTime(),
              dob = new Date(value).getTime();
              age = today - dob;
              yoa = Math.floor(age / 1000 / 60 / 60 / 24 / 365.25);

                  $('#ParticipanteEdad').val(yoa);
            }
          });


        $("#ParticipanteIndexForm").submit(function() {

            var c = confirm("Seguro de Registrar los datos ?");
            return c;
        });


    });

        function limit(element, max) {
            var max_chars = max;
            if(element.value.length > max_chars) {
                element.value = element.value.substr(0, max_chars);
            }
        }



</script>




<?php
echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal", "url"=>"/inscripciones/registro"));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">


<figure class="page-head-image">
    <?php echo $this->Html->image('tenis-logo.png', array('alt' => 'run Tepeaca'));?>
</figure>

         <h1>Registro de Participantes</h1>
          <p>Carrera 10km Señor de los Afligidos, Sta Cruz Temilco, Tepeaca</p>
          <p>17 de Septiembre de 2017</p>

          <div class="form-group">
            <?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"", "class"=>"form-control","placeholder"=>"Nombre Completo del Participante","required"=>"required"));?>
          </div>

          <div class="form-group">
            <?=$this->Form->input("curp", array("readonly"=>$readonly, "label"=>"", "value"=>"curp_aleat", "type"=>"text", "placeholder"=>"CURP","class"=>"form-control", "required"=>"required") );?>
          </div>

          <div class="form-group">
          <div class="row">
          <div class="col-md-4">
            <?=$this->Form->input("telefono", array("readonly"=>$readonly, "label"=>"", "value"=>"2222558879", "type"=>"text", "placeholder"=>"Num. Teléfono","class"=>"form-control", "required"=>"required") );?>
          </div>
          <div class="col-md-6">
            <?=$this->Form->input("email", array("readonly"=>$readonly, "label"=>"","value"=>"contacto@gmail.com", "type"=>"email", "placeholder"=>"Email","class"=>"form-control", "required"=>"required") );?>
            </div>
            </div>
            </div>


          <div class="form-group">
          <div class="row">
            <div class="col-md-4">
            <?=$this->Form->input("fecha_nacimiento", array("readonly"=>$readonly, "label"=>"", "type"=>"text", "placeholder"=>"F. Nacimiento","class"=>"form-control", "required"=>"required") );?>
            </div>

            <div class="col-md-6">
            <?=$this->Form->input("edad", array("readonly"=>$readonly,"label"=>"","type"=>"number","placeholder"=>"Ingresa Edad","required"=>"required","class"=>"form-control","min"=>"18", "max"=>"75", "onkeydown"=>"limit(this, 2);", "onkeyup"=>"limit(this, 2);"));?>
            </div>

            </div>
          </div>


          <div class="form-group">
            <?=$this->Form->input("lugar_procedencia", array("readonly"=>$readonly,"label"=>"","placeholder"=>"Lugar de Procedencia","class"=>"form-control","required"=>"required" ));?>
          </div>

          <div class="form-group">
            <?=$this->Form->input("categoria_carrera_id",array("readonly"=>$readonly,'label'=>'Categoria','class'=>'form-control', 'options'=>$categorias, 'empty' => 'Selecciona Categoria ..',"required"=>"required"));?>
          </div>

          <div class="f1-buttons">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Registrarme</button>
          </div>

          <br>



  </fieldset>
<?php echo $this->Form->end();?>
