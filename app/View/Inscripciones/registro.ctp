<script>
    $(function(){
        
        $('#myModal').modal('show');
        
        $("#btnCerrar").click(function(e){
            window.open("/inscripciones/carta/<?php echo $lastId; ?>");
        });
        
        //window.open("/inscripciones/carta/<?php #echo $lastId; ?>");
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
        <h3>
            <?php echo $stringMsg;?>
        </h3>
          
          <h3>  
              <?php echo $msgEmail;?>
            <a style="color: red;" href="/inscripciones/carta/<?=$lastId;?>"> Aqui </a>
          </h3>
      </div>
      <div class="modal-footer">
        <button id="btnCerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>