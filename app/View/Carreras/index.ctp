<div class="card-body">
            <div class="">
              <table class="table table-sm table-inverse tablarows" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>CARRERA</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $i=1;
                    if( !empty($carreras) ):
                        foreach($carreras as $row)
                        {
                            $id = $row['Carrera']['id'];
                            $nombre = $row['Carrera']['carrera'];

                        
                         

                            echo '<tr class="">';
                            echo '  <td scope="row">'.$id.'</td>';
                            echo '  <td style="text-align:left">'.$nombre.'</td>';
                            echo '  <td style="text-align:left; ">
                                  <a style="color:orange;" href="/carreras/edit/'.$id.'">Editar</a>
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

<?php
echo $this->Form->create("Carrera",array("type"=>"post","class"=>"form-horizontal", "url"=>"/carreras/add"));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">

         <h1>Registro de Carreras</h1>

          <div class="form-group">
            <?=$this->Form->input("carrera",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"Nombre Carrera","required"=>"required"));?>
          </div>
          

          <div class="f1-buttons">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Registrar</button>
          </div>

          <br>



  </fieldset>
<?php echo $this->Form->end();?>









