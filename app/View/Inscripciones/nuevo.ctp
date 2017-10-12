<script>
    
    $(function(){
        
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
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Inscripcion a la 1ra Carrera por la Paz Tepeaca</h2>
        <div class="col-sm-4" style="width: 100%;">
            <div class="product-image-wrapper" style="width: 80%; margin-left: 2%;">

                    <div class="signup-form">
                            <h2>Registra tus datos</h2>
                                                                  
                  
<?php 
echo $this->Form->create("Participante",array("type"=>"post","url"=>"/inscripciones/registro"));
#echo $this->Form->create("Participante",array("type"=>"post","url"=>"/inscripciones/registroafter"));
$readonly=false;
?>

<h5 style='color: red;'>Recuerda Imprimir tu Hoja de Exhoneración y presentarla para recoger tu paquete</h5>
                            
<?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"","placeholder"=>"Ingresa tu nombre completo","required"=>"required"));?>
<?=$this->Form->input("correo", array("readonly"=>$readonly, "label"=>"", "type"=>"email", "placeholder"=>"Ingresa tu correo electronico","required"=>"required") );?>
<?=$this->Form->input("edad", array("readonly"=>$readonly,"label"=>"","type"=>"number","placeholder"=>"Ingresa Edad","required"=>"required","min"=>"18", "max"=>"75", "onkeydown"=>"limit(this, 2);", "onkeyup"=>"limit(this, 2);"));?>
<?=$this->Form->input("lugar_procedencia", array("readonly"=>$readonly,"label"=>"","placeholder"=>"Ingresa tu Lugar de Procedencia","required"=>"required" ));?>
<?=$this->Form->input("carrera_id",array("readonly"=>$readonly,'label'=>'','options'=>$carreras, 'empty' => 'Selecciona Carrera ..',"required"=>"required"));?>
<?=$this->Form->input("categoria_carrera_id",array("readonly"=>$readonly,'label'=>'','options'=>$categorias, 'empty' => 'Selecciona Categoria ..',"required"=>"required"));?>

  
<button type="submit" class="btn btn-default" style="text-align: center; margin-left: 40%;">Registrarme</button>
  
 <!--
 <div style="color: red; font-size: 17pt; font-weight: bold;text-align: center;">
    ¡ ESPERA UN MOMENTO POR FAVOR !
</div>
  -->   


<?php
echo $this->Form->end();?>
                                                                    
                                                                    
                                                                    
                                                            </div><!--/sign up form-->
								
							</div>
						</div>
                                                
						
					</div><!--features_items-->
					
				</div>