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


                $("#ParticipantePaymentupdateForm").submit(function() {

                    var c = confirm("Seguro de Actualizar los datos ?");
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

        echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal", "url"=>"/inscripciones/paymentupdate/".$this->request->data['Participante']['id']));
        $readonly=true;
        ?>

          <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">


        <figure class="page-head-image">
            <?php echo $this->Html->image('tenis-logo.png', array('alt' => 'run Tepeaca'));?>
        </figure>

                 <h1>Actualizacion Pago del Participante</h1>


                  <div class="form-group">
                    <?php # debug($this->request->data); ?>
                  </div>

                  <div class="form-group">
                    <?=$this->Form->input("numero_participante",
                    array("readonly"=>$readonly, "label"=>"# Participante", "class"=>"form-control","placeholder"=>"","required"=>"required"));?>
                  </div>

                  <div class="form-group">
                    <?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"Nombre Participante", "class"=>"form-control","placeholder"=>"Nombre Completo del Participante","required"=>"required"));?>
                  </div>


                  <div class="form-group">
                    <?=$this->Form->input("pago_realizado",array('label'=>'Pago Realizado','class'=>'form-control', 'options'=>array("si"=>"Si","no"=>"No"),"required"=>"required"));?>
                  </div>


                  <div class="form-group">
                    <?=$this->Form->input("codigo_pago", array("label"=>"Folio Autorizacion Pago", "type"=>"text", "placeholder"=>"codigo autorizacion pago","class"=>"form-control", "required"=>"required") );?>
                  </div>

                  <div class="form-group">
                    <?=$this->Form->input("comentario", array("label"=>"Comentario", "type"=>"text", "placeholder"=>"comentario","class"=>"form-control", "required"=>"required") );?>
                  </div>






                  <div class="f1-buttons">
                    <button type="submit" class="btn btn-primary" style="text-align: center;">Actualizar</button>
                  </div>

                  <br>



          </fieldset>
        <?php echo $this->Form->end();?>
