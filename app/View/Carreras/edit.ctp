<?php
$id = $this->request->data['Carrera']['id'];

echo $this->Form->create("Carrera",array("type"=>"post","class"=>"form-horizontal", "url"=>"/carreras/edit/".$id));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">

         <h1>Actualizar Carrera</h1>


  <div class="row">
    <div class="col-sm">
       <?=$this->Form->input("id",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"ID","required"=>"required", "readonly"=> true));?>
    </div>
    <div class="col-sm">
      <?=$this->Form->input("carrera",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"Nombre Carrera","required"=>"required"));?>
    </div>

    <div class="col-sm">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Actualizar</button>
    </div>
  </div>


  </fieldset>
<?php echo $this->Form->end();?>