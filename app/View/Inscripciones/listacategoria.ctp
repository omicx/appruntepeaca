<?php 
$i=1;
foreach( $categorias as $key =>$keycategoria ): ?>
<h3 style="text-align: center; text-transform: uppercase; font-size:14pt;">
<?php echo "Carrera 5KM Por La Paz Tepeaca, Puebla";?>
</h3>
 <h3 style="text-align: center; text-transform: uppercase; font-size:14pt;">
     Categoria - "<?=$categorias[$key];?>"
</h3>

<table cellspacing="0" border="0" class="acl" width="100%">
    <thead>
    <tr>
            <th>#</th>
            <th>NO.CORREDOR</th>
            <th>NOMBRE</th>
            <th>EDAD</th>
            <th>PROCEDENCIA</th>
            <th>CATEGORIA</th>
            <th>CORREO</th>
            <th>ACTIONS</th>
    </tr>
    </thead>
    <?php
    
    if( !empty($participantes) ):
        foreach($participantes as $row)
        {
            if( $row['Participante']['categoria_carrera_id'] == $key ){
                $id = $row['Participante']['id'];
                $nombre = $row['Participante']['nombre_completo'];
                $edad = $row['Participante']['edad'];
                $procedencia = $row['Participante']['lugar_procedencia'];
                $cat = $row['Participante']['categoria_carrera_id'];
                echo '<tr class="">';
                echo '  <td style="text-align:center;font-size:8pt;">' . $i . '</td>';
                echo '  <td style="text-align:center">' . $row['Participante']['numero_participante'] . '</td>';
                echo '  <td style="text-align:left; text-transform:capitalize; padding-left:3px;">' . mb_strtoupper($nombre,'UTF-8') . '</td>';
                echo '  <td style="text-align:left; text-transform:capitalize; padding-left:3px;">' . $edad . '</td>';
                echo '  <td style="text-align:left;text-transform:capitalize;">' .$procedencia . '</td>';
                echo '  <td style="text-align:left">' . $row['Participante']['correo'] . '</td>';
                echo '  <td style="text-align:left;text-transform:capitalize;">' . $cat . '</td>';
                echo '  <td style="text-align:left; font-size:8pt;"><a href="/inscripciones/edit/'.$row['Participante']['id'].'">Modificar</a> | '
                    . '<a href="/inscripciones/reenviar/'.$row['Participante']['id'].'">Reenviar</a> | '
                    . '<a href="/inscripciones/carta/'.$row['Participante']['id'].'">Carta</a>'
                    . '</td>';
                echo '<tr>';
                $i++;
            }
        }
        
        else:
            echo "<tr><td colspan='7' align='center' style='color:red; font-size:10pt;'>No Registros</td></tr>";
    endif;?>
</table>

<?php 
 echo "<div class='page-break'></div>";
 $i=1;
endforeach;
?>