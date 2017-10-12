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

                $("#ParticipanteEditForm").submit(function() {

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

        echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal", "url"=>"/inscripciones/edit/".$this->request->data['Participante']['id']));
        $readonly=false;
        ?>



          <fieldset class="form-group" style="background-color:whitesmoke; width:70%; padding: 20px; text-align: left;">

                <h1>Actualizacion Datos del Participante</h1>

                  <div class="form-group">
                    <?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"Nombre", "class"=>"form-control","placeholder"=>"","required"=>"required"));?>
                  </div>

                  <div class="form-group">
                    <?=$this->Form->input("curp", array("readonly"=>$readonly, "label"=>"CURP", "type"=>"text", "placeholder"=>"","class"=>"form-control", "required"=>"required") );?>
                  </div>

                  <div class="form-group">
                  <div class="row">
                  <div class="col-md-4">
                    <?=$this->Form->input("telefono", array("readonly"=>$readonly, "label"=>"Num. Teléfono", "type"=>"text", "placeholder"=>"","class"=>"form-control", "required"=>"required") );?>
                  </div>
                  <div class="col-md-6">
                    <?=$this->Form->input("email", array("readonly"=>$readonly, "label"=>"Email", "type"=>"email", "placeholder"=>"","class"=>"form-control", "required"=>"required") );?>
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                    <?=$this->Form->input("fecha_nacimiento", array("readonly"=>$readonly, "label"=>"F. Nacimiento", "type"=>"text", "placeholder"=>"","class"=>"form-control", "required"=>"required") );?>
                    </div>

                    <div class="col-md-6">
                    <?=$this->Form->input("edad", array("readonly"=>$readonly,"label"=>"Ingresa Edad","type"=>"number","placeholder"=>"","required"=>"required","class"=>"form-control","min"=>"18", "max"=>"75", "onkeydown"=>"limit(this, 2);", "onkeyup"=>"limit(this, 2);"));?>
                    </div>

                    </div>
                  </div>


                  <div class="form-group">
                    <?=$this->Form->input("lugar_procedencia", array("readonly"=>$readonly,"label"=>"Lugar de Procedencia","placeholder"=>"","class"=>"form-control","required"=>"required" ));?>
                  </div>

                  <div class="form-group">
                    <?=$this->Form->input("categoria_carrera_id",array("readonly"=>$readonly,'label'=>'Categoria','class'=>'form-control', 'options'=>$categorias, 'empty' => 'Selecciona Categoria ..',"required"=>"required"));?>
                  </div>

                  <div class="f1-buttons">
                    <button type="submit" class="btn btn-primary" style="text-align: center;">Actualizar Datos</button>
                  </div>

          </fieldset>
        <?php echo $this->Form->end();?>
