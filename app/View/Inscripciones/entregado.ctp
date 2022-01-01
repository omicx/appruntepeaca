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


         <h1>Entrega de Paquete</h1>

         <div class="container">
          <div class="row">
             
          
          <div class="col-sm">

            <?=$this->Form->input("numero_participante",
            array("readonly"=>$readonly, "label"=>"# Participante", "class"=>"form-control","placeholder"=>"","required"=>"required"));?>
          </div>


          <div class="col-sm">
            <?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"Nombre Participante", "class"=>"form-control","placeholder"=>"Nombre Completo del Participante","required"=>"required"));?>
          </div>

        </div>
          

          <div class="row">
             <div class="col-sm">
            <?=$this->Form->input("pago_realizado",array("readonly"=>$readonly,'label'=>'Pago Realizado','class'=>'form-control', "required"=>"required"));?>
          </div>
          <div class="col-sm">
            <?=$this->Form->input("codigo_pago", array("readonly"=>$readonly,"label"=>"Folio Autorizacion Pago", "type"=>"text", "placeholder"=>"codigo autorizacion pago","class"=>"form-control", "required"=>"required") );?>
          </div>
        </div>


          <div class="row">
            <div class="col-sm">
            <?=$this->Form->input("modificado", array("label"=>"Entregado Paquete", "type"=>"text",
            "placeholder"=>"","value"=>"entregado y listo","class"=>"form-control", "required"=>"required") );?>
          </div>
        </div>


        <div class="row">
          <div class="col-sm">
            <br/>
            <?php if( $this->request->data['Participante']['pago_realizado'] == "no" ) : ?>
              <button type="button" class="btn btn-warning">NO HA REALIZADO PAGO!</button>
          <?php else: ?>
            <button type="submit" class="btn btn-primary" style="text-align: center;">PAQUETE ENTREGADO</button>
          <?php endif; ?>
          </div>

        </div>
          
      </div>



  </fieldset>
<?php echo $this->Form->end();?>
