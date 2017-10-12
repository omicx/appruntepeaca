<style>
.tablarows{
  font-size: 9pt;
}
</style>

<script>

function entregarkit(id){

  $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Confirmar": function() {

          $.ajax({
              type: "POST",
              url: "/inscripciones/entregado/"+id,
              data: {'data[Participante][modificado]': 'entregado y listo'},
              beforeSend: function(){
                $("#entregadodiv"+id).html("<img src='/img/loader.gif' style='width:16px;'/>");
              },
              success: function(dataString) {
                $("#entregadodiv"+id).html("<img src='/img/ok.png' style='width:16px;'/>");
              }
          });

          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  }//function

  function actualizarpago(id){
    $( "#dialog-confirm-pago" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
          "Confirmar": function() {

            $.ajax({
                type: "POST",
                url: "/inscripciones/entregado/"+id,
                data: {'data[Participante][modificado]': 'entregado y listo'},
                beforeSend: function(){
                  $("#entregadodiv"+id).html("<img src='/img/loader.gif' style='width:16px;'/>");
                },
                success: function(dataString) {
                  $("#entregadodiv"+id).html("<img src='/img/ok.png' style='width:16px;'/>");
                }
            });

            $( this ).dialog( "close" );
          },
          Cancel: function() {
            $( this ).dialog( "close" );
          }
        }
      });
  }//function

  function show_actualizarpago(id){
    $.ajax({
        type: "POST",
        dataType : "html",
        url: "/inscripciones/actualizarpago_view/",
        data: {"id":id},
        beforeSend: function(){
          $("#pagadodiv"+id).html("<img src='/img/loader.gif' style='width:16px;'/>");
        },
        success: function(dataString) {
          $("body").append(dataString);
          $("#id-response").dialog({
            modal:true, width:500,
            buttons: {
              "Actualizar Pago": function() {

                $.ajax({
                    type: "POST",
                    url: "/inscripciones/actualizarpago_action/"+id,
                    data: $('#ParticipanteActualizarpagoViewForm').serialize(),
                    beforeSend: function(){
                      $("#pagadodiv"+id).html("<img src='/img/loader.gif' style='width:16px;'/>");
                    },
                    success: function(dataString) {
                      $("#pagadodiv"+id).html("<img src='/img/ok.png' style='width:16px;'/>");
                      location.reload();
                    }
                });


                $( this ).dialog( "close" );
              },
              Cancelar: function() {$( this ).dialog( "close" );}
            }
          });
        }
    });
  }//function

</script>


<div id="dialog-confirm" title="Entrega de Kit" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Entregar Paquete al Participante?</p>
</div>
<!-- -->

<!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Participante Registrados <strong><?=count($participantes)?></strong>

            <?php
            $pagados = 0;
            $nopagados = 0;
            $entregados = 0;
            $carrera5k=0;
            $carrera10k=0;

            if( !empty($participantes) ){
                foreach($participantes as $row)
                {
                  if($row['Participante']['pago_realizado']=="si"){
                    $pagados++;
                  }
                  if($row['Participante']['pago_realizado']=="no"){
                    $nopagados++;
                  }
                  if( $row['Participante']['modificado']!="no" ){//entregados
                      $entregados++;
                  }

                  if( $row['Participante']['carrera_id']=="5k" ){//entregados
                      $carrera5k++;
                  }

                  if( $row['Participante']['carrera_id']=="10K" ){//entregados
                      $carrera10k++;
                  }
                }//foreach
              }//fi
              ?>
            <i class="fa fa-table"></i>
            Pagados <strong><?php echo $pagados; ?></strong>

            <i class="fa fa-table"></i>
            No Pagados <strong><?php echo $nopagados; ?></strong>

            <i class="fa fa-table"></i>
            Kits Entregados <strong><?php echo $entregados; ?></strong>

            <i class="fa fa-table"></i>
            5k <strong><?php echo $carrera5k; ?></strong>

            <i class="fa fa-table"></i>
            10k <strong><?php echo $carrera10k; ?></strong>

          </div>
          <div class="card-body">
            <div class="">
              <table class="table table-sm table-inverse tablarows" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>NC</th>
                    <th>DIST.</th>
                    <th>NOMBRE</th>
                    <th>CAT.</th>
                    <th>EDAD</th>
                    <th>LUGAR</th>
                    <th>PAGADO</th>
                    <th>FOL.PAGO</th>
                    <th>COMENT.</th>
                    <th>ENTREGA KIT</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $i=1;
                    if( !empty($participantes) ):
                        foreach($participantes as $row)
                        {
                            $id = $row['Participante']['id'];
                            $nombre = $row['Participante']['nombre_completo'];

                            /*$icon_pago = ($row['Participante']['pago_realizado']=="si")?
                            "<img src='/img/ok.png' style='width:16px;'/>" :
                            "<a href='/inscripciones/paymentupdate/".$id."'><img src='/img/no.png' style='width:16px;'/></a>";*/

                            $icon_pago = ($row['Participante']['pago_realizado']=="si")?
                            "<img src='/img/ok.png' style='width:16px;'/>" :
                            "<img src='/img/no.png' style='width:16px; cursor: pointer; cursor: hand;' onclick='show_actualizarpago({$id})'/>";

                            $icon_entregeado = ($row['Participante']['modificado']!="no")?
                            "<img src='/img/ok.png' style='width:16px;'/>" :
                            "<img src='/img/no.png' style='width:16px; cursor: pointer; cursor: hand;' onclick='entregarkit({$id})'/>";

                            /*$icon_entregeado = ($row['Participante']['modificado']!="no")?
                            "<img src='/img/ok.png' style='width:16px;'/>" :
                            "<form action='/inscripciones/entregado/{$id}' name='post_4f7825317b6b0{$id}' id='post_4f7825317b6b0{$id}' style='display:none;' method='post'>
                              <input type='hidden' name='_method' value='POST'>
                              <input name='data[Participante][modificado]' value='entregado y listo' type='text' id='ParticipanteModificado{$id}'>
                            </form>
                            <a href='#' onclick='if (confirm(\"Entregar Folio {$id}?\")) { document.post_4f7825317b6b0{$id}.submit(); } event.returnValue = false; return false;'><img src='/img/no.png' style='width:16px;'/></a>";*/
                            #"<a href='/inscripciones/entregado/".$id."' onclick=\"return confirm('¿Seguro de entregar?');\"><img src='/img/no.png' style='width:16px;'/></a>";

                            echo '<tr class="">';
                            echo '  <th scope="row">' .$row['Participante']['numero_participante']  . '</th>';
                            echo '  <td scope="row">
                            <a style="color:orange;" href="/inscripciones/editdistance/'.$id.'">
                            ' .$row['Participante']['carrera_id']  . '
                            </a></td>';
                            echo '  <td style="text-align:left"><a style="color:white;" href="/inscripciones/edit/'.$id.'">'
                             . $nombre . '</a></td>';
                            echo '  <td style="text-align:left">' . $row['Participante']['categoria_carrera_id'] . '</td>';
                            echo '  <td style="text-align:left">' . $row['Participante']['edad'] . '</td>';
                            echo '  <td style="text-align:left">' . $row['Participante']['lugar_procedencia'] . '</td>';
                            #echo '  <td style="text-align:left">' . $row['Participante']['email'] . '</td>';
                            #echo '  <td style="text-align:left">' . $row['Participante']['created'] . '</td>';
                            echo '  <td style="text-align:left" id="pagadodiv'.$id.'">' . $icon_pago . '</td>';
                            echo '  <td style="text-align:left">' . $row['Participante']['codigo_pago'] . '</td>';
                            echo '  <td style="text-align:left">' . $row['Participante']['comentario'] . '</td>';
                            echo '  <td style="text-align:left" id="entregadodiv'.$id.'">' . $icon_entregeado . '</td>';
                            echo '  <td style="text-align:left; ">
                                  <a style="color:orange;" href="/inscripciones/paymentupdate/'.$id.'">Pago</a> |
                                  <a style="color:orange;" href="/inscripciones/carta/'.$id.'">Carta</a> |
                                  <a style="color:orange;" href="/inscripciones/entregado/'.$id.'">Entregado</a>
                            </td>';
                            echo '<tr>';
                            $i++;

                        }
                        else:
                            echo "<tr><td colspan='7' align='center' style='color:red; font-size:10pt;'>No Registros</td></tr>";
                    endif;?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated
          </div>
        </div>
