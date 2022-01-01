<?php

$id = $this->request->data['Categoria']['id'];
echo $this->Form->create("Categoria",array("type"=>"post","class"=>"form-horizontal", "url"=>"/categorias/edit/".$id));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">


<figure class="page-head-image">
    <?php echo $this->Html->image('tenis-logo.png', array('alt' => 'run Tepeaca'));?>
</figure>

         <h1>Actualizar Categoria</h1>

         
  <div class="row">
    <div class="col-sm">
       <?=$this->Form->input("id",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"ID","required"=>"required", "readonly"=> true));?>
    </div>
    <div class="col-sm">
      <?=$this->Form->input("categoria",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"Nombre Categoria","required"=>"required"));?>
    </div>

    <div class="col-sm">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Actualizar</button>
    </div>

  
  </div>


  </fieldset>
<?php echo $this->Form->end();?>