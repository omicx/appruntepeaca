<?php
$stringMsg = "Gracias por tu interes en esta Gran Carrera";
$msgEmail = "En breve se enviará un correo de confirmaci&oacute;n del registro a la direcci&oacute;n <strong>"
        .$participante['Participante']['correo']."</strong>";
?>

<script>
    $(function(){
        $('#myModal').modal('show');
    });    
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Registro Completo</h4>
      </div>
      <div class="modal-body">
          <h3 style="color:red;">
            <?php echo $stringMsg;?>
        </h3>
          <h3>  
              <?php echo $msgEmail;?>
          </h3>
          
      </div>
      <div class="modal-footer">
        <button id="btnCerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div style="padding:30px 40px 10px 40px; border: 1px solid #666;">
    <div style="text-align:center;">
    <img src="/img/header-hexoneracion.png" title="Run Tepeaca" />
    </div>
<h3 style="text-align:center;font-size: 12pt; color: #666; font-weight:bold;" >
    3 ABRIL 2016 - CARRERA POR LA PAZ </h3>
    
<p style="text-align: justify; line-height: 38px; font-size: 11pt; color: #666;">
Para mayor informacion contactanos a los telefonos:  <br/>
 2231 1306 16 <br/>
 2231 0472 67
  <br/> <br/>
 
 Esto con el objetivo de brindarte una mejor atención.
 <br/><br/><br/>
 
 MUCHAS GRACIAS POR TU INTERES!!
</p>
<br/>

</div>