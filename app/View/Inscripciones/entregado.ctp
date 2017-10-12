<script>
    $(function(){
        $("#ParticipanteEntregadoForm").submit(function() {
            var c = confirm("Seguro de Actualizar Entrega ?");
            return c;
        });
    });
</script>

<?php

echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal",
 "url"=>"/inscripciones/entregado/".$this->request->data['Participante']['id']));
$readonly=true;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">


<figure class="page-head-image">
    <?php echo $this->Html->image('tenis-logo.png', array('alt' => 'run Tepeaca'));?>
</figure>

         <h1>Entrega de Paquete</h1>


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
            <?=$this->Form->input("pago_realizado",array("readonly"=>$readonly,'label'=>'Pago Realizado','class'=>'form-control', "required"=>"required"));?>
          </div>
          <div class="form-group">
            <?=$this->Form->input("codigo_pago", array("readonly"=>$readonly,"label"=>"Folio Autorizacion Pago", "type"=>"text", "placeholder"=>"codigo autorizacion pago","class"=>"form-control", "required"=>"required") );?>
          </div>


          <div class="form-group">
            <?=$this->Form->input("modificado", array("label"=>"Entregado Paquete", "type"=>"text",
            "placeholder"=>"","value"=>"entregado y listo","class"=>"form-control", "required"=>"required") );?>
          </div>






          <div class="f1-buttons">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Entregado</button>
          </div>

          <br>



  </fieldset>
<?php echo $this->Form->end();?>
