<div id="id-response" title="<?php echo $this->request->data["Participante"]["numero_participante"]."-".$this->request->data["Participante"]["nombre_completo"];?>"
  style="display:none;">
<?php
echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-horizontal", "url"=>""));
$readonly=true;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">
         <h2>Actualizar Pago</h2>
          <div class="form-group">
            <?=$this->Form->input("pago_realizado",array('label'=>'Pago Realizado','class'=>'form-control', 'options'=>array("si"=>"Si","no"=>"No"),"required"=>"required"));?>
          </div>
          <div class="form-group">
            <?=$this->Form->input("codigo_pago", array("label"=>"Folio Autorizacion Pago", "type"=>"text", "placeholder"=>"codigo autorizacion pago","class"=>"form-control", "required"=>"required") );?>
          </div>
          <div class="form-group">
            <?=$this->Form->input("comentario", array("label"=>"Comentario", "type"=>"text", "placeholder"=>"comentario","class"=>"form-control", "required"=>"required") );?>
          </div>
  </fieldset>
<?php echo $this->Form->end();?>
</div>
