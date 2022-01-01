
<div class="card-body">
            <div class="">
              <table class="table table-sm table-inverse tablarows" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>CATEGORIA</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $i=1;
                    if( !empty($categorias) ):
                        foreach($categorias as $row)
                        {
                            $id = $row['Categoria']['id'];
                            $nombre = $row['Categoria']['categoria'];

                        
                         

                            echo '<tr class="">';
                            echo '  <td scope="row"> <a style="color:orange;" href="#"> ' .$id  . '</a></td>';
                            echo '  <td style="text-align:left"><a style="color:white;" href="/categorias/edit/'.$id.'">'
                             . $nombre . '</a></td>';
                          
                            echo '  <td style="text-align:left; ">
                                  <a style="color:orange;" href="/categorias/edit/'.$id.'">Editar</a>
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
echo $this->Form->create("Categoria",array("type"=>"post","class"=>"form-horizontal", "url"=>"/categorias/add"));
$readonly=false;
?>

  <fieldset class="form-group" style="background-color: white; padding: 20px; text-align: center;">


         <h1>Registro de Categorias</h1>

         <div class="form-group">
            <?=$this->Form->input("id",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"ID","required"=>"required"));?>
          </div>

          <div class="form-group">
            <?=$this->Form->input("categoria",array("readonly"=>$readonly, "label"=>"", "type"=>"text", "class"=>"form-control","placeholder"=>"Nombre Categoria","required"=>"required"));?>
          </div>
          

          <div class="f1-buttons">
            <button type="submit" class="btn btn-primary" style="text-align: center;">Registrar</button>
          </div>

          <br>



  </fieldset>
<?php echo $this->Form->end();?>









