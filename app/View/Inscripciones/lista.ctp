
<style>
.tablarows{
  font-size: 9pt;
}
</style>

<?php
$i=1;
foreach( $categorias as $key =>$keycategoria ):
$num_participantes_cat = 0;
  if( !empty($participantes) ):
      foreach($participantes as $row)
      {
          if( $row['Participante']['categoria_carrera_id'] == $key ){
            $num_participantes_cat+=1;
          }
      }
    endif;
  ?>
<h3 style="text-align: center; color:red; text-transform: uppercase; font-size:14pt;">
<?php echo "Carrera Sr Afligidos 10km";?>
</h3>
 <h2 style="text-align: center; text-transform: uppercase; font-size:13pt;">
     Categoria - "<?=$categorias[$key] ?>" <span style="font-size:9pt; color:red;"> Total <?php echo $num_participantes_cat;?></span>
</h2>

<table cellspacing="0" border="0" class="acl" width="100%">
    <thead>
    <tr>
      <th>#</th>
      <th>NO.CORREDOR</th>
      <th>NOMBRE</th>
      <th>EDAD</th>
      <th>PROCEDENCIA</th>
      <th>CATEGORIA</th>
    </tr>
    </thead>
    <?php

    if( !empty($participantes) ):
        foreach($participantes as $row)
        {
            if( $row['Participante']['categoria_carrera_id'] == $key ){
                $id           = $row['Participante']['id'];
                $num_participante = $row['Participante']['numero_participante'];
                $nombre       = $row['Participante']['nombre_completo'];
                $edad         = $row['Participante']['edad'];
                $procedencia  = $row['Participante']['lugar_procedencia'];
                $cat          = $row['Participante']['categoria_carrera_id'];
                echo '<tr class="">';
                echo '  <td style="text-align:center;font-size:8pt;">' . $i . '</td>';
                echo '  <td style="text-align:center;font-size:8pt;">' . $num_participante . '</td>';
                echo '  <td style="text-align:left;font-size:8pt; text-transform:capitalize; padding-left:3px;">' . mb_strtoupper($nombre,'UTF-8') . '</td>';
                echo '  <td style="text-align:left;font-size:8pt; text-transform:capitalize; padding-left:3px;">' . $edad . '</td>';
                echo '  <td style="text-align:left;font-size:8pt;text-transform:capitalize;">' .$procedencia . '</td>';
                echo '  <td style="text-align:left;font-size:8pt;text-transform:capitalize;">' . $cat . '</td>';
                echo '<tr>';
                $i++;
            }
        }

        else:
            echo "<tr><td colspan='7' align='center' style='color:red; font-size:10pt;'>No Registros</td></tr>";
    endif;
    $num_participantes_cat = 0;
    ?>
</table>

<?php
 echo "<div class='page-break'></div>";
 $i=1;
endforeach;
?>
