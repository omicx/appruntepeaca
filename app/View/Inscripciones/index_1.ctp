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


<div class="main-content">

    
    <form role="form" action="" method="post" class="f1">

                    		<h3>Registro de Participantes</h3>
                    		<p>Carrera 10km Señor de los Afligidos, Sta Cruz Temilco, Tepeaca</p>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Datos</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-key"></i></div>
                    				<p>account</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                    				<p>social</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Datos personales:</h4>
                                    <div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">First name</label>
                                            <input type="text" name="f1-first-name" placeholder="First name..." class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-last-name">Last name</label>
                                        <input type="text" name="f1-last-name" placeholder="Last name..." class="f1-last-name form-control" id="f1-last-name">
                                    </div> 
                                    <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email</label>
                                    <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email">
                                </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-about-yourself">About yourself</label>
                                        <textarea name="f1-about-yourself" placeholder="About yourself..." 
                                                             class="f1-about-yourself form-control" id="f1-about-yourself"></textarea>
                                    </div>
                                    <div class="f1-buttons">
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>
                                    
                            </fieldset>

                            <fieldset>
                                <h4>Set up your account:</h4>
                               
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control" id="f1-password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" name="f1-repeat-password" placeholder="Repeat password..." 
                                                        class="f1-repeat-password form-control" id="f1-repeat-password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Social media profiles:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Facebook</label>
                                    <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control" id="f1-facebook">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Twitter</label>
                                    <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control" id="f1-twitter">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-google-plus">Google plus</label>
                                    <input type="text" name="f1-google-plus" placeholder="Google plus..." class="f1-google-plus form-control" id="f1-google-plus">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                    	
                    	</form>
    
    
                                                                     
                  
<?php 
echo $this->Form->create("Participante",array("type"=>"post","class"=>"form-register", "url"=>"/inscripciones/registro"));
$readonly=false;
?>
       

<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Pre-Registro a la 1ra Carrera 10km <br/>Sr. de los Afligidos Sta. Cruz Temilco, Tepeaca</h2>
        
        
        
        
        
        
        <div class="col-sm-4" style="width: 100%;">
            <div class="product-image-wrapper" style="width: 80%; margin-left: 2%;">

                    <div class="signup-form">
                            <h2>Registra tus datos</h2>
                                                                  
                  
<?php 
echo $this->Form->create("Participante",array("type"=>"post","url"=>"/inscripciones/registro"));
$readonly=true;
?>

<h5 style='color: red;'>Recuerda Imprimir tu Hoja de Exhoneración y presentarla para recoger tu paquete</h5>
                            
<?=$this->Form->input("nombre_completo",array("readonly"=>$readonly, "label"=>"","placeholder"=>"Ingresa tu nombre completo","required"=>"required"));?>
<?=$this->Form->input("correo", array("readonly"=>$readonly, "label"=>"", "type"=>"email", "placeholder"=>"Ingresa tu correo electronico","required"=>"required") );?>
<?=$this->Form->input("edad", array("readonly"=>$readonly,"label"=>"","type"=>"number","placeholder"=>"Ingresa Edad","required"=>"required","min"=>"18", "max"=>"75", "onkeydown"=>"limit(this, 2);", "onkeyup"=>"limit(this, 2);"));?>
<?=$this->Form->input("lugar_procedencia", array("readonly"=>$readonly,"label"=>"","placeholder"=>"Ingresa tu Lugar de Procedencia","required"=>"required" ));?>
<?=$this->Form->input("carrera_id",array("readonly"=>$readonly,'label'=>'','options'=>$carreras, 'empty' => 'Selecciona Carrera ..',"required"=>"required"));?>
<?=$this->Form->input("categoria_carrera_id",array("readonly"=>$readonly,'label'=>'','options'=>$categorias, 'empty' => 'Selecciona Categoria ..',"required"=>"required"));?>

<!--   
<button type="submit" class="btn btn-default" style="text-align: center; margin-left: 40%;">Registrarme</button>
-->    


 <div style="color: red; font-size: 17pt; font-weight: bold;text-align: center;">
    ¡ INSCRIPCIONES AGOTADAS, GRACIAS !!!
    
</div>


<?php
echo $this->Form->end();?>
                                                                    
                                                                    
                                                                    
                                                            </div><!--/sign up form-->
								
							</div>
						</div>
                                                
						
					</div><!--features_items-->
					
				</div>






<script>
    $(function(){
        //$('#myModal').modal('show');
    });    
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">MENSAJE POR PARTE DEL COMITE ORGANIZADOR</h4>
      </div>
      <div class="modal-body">
          <div style="text-align: center;"><img src="/img/logos/jovenes-tepeaca.jpg" title="Run Tepeaca" /></div>
          <h3 style="color:red; text-align: center;">
            INSCRIPCIONES AGOTADAS
        </h3>
          <h3 style="text-align: center;">  
              Si aun deseas participar solo te podemos proporcionar número de corredor.<br/><br/>
              Mandanos tus datos a los telefonos:  <br/><br/>
              <img src="/img/logos/whatsapp.png" style="height: 24px;" title="Whatsapp" />
                2231 1306 16 <br/>
                <img src="/img/logos/whatsapp.png" style="height: 24px;" title="Whatsapp" />
                2231 0472 67
                 <br/> <br/>
          </h3>
          
      </div>
      <div class="modal-footer">
        <button id="btnCerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
