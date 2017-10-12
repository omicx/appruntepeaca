
<div style="padding:10px 5px 10px 5px; border: 1px solid #666;">

    
    
<table cellspacing="0" border="0" class="table" style="background: white;" width="100%">
        <caption style="font-size: 14pt;"><?=count($participantes)?> Participantes </caption>
    <thead>
    <tr>
            
            <th>NUM.COMPETIDOR</th>
            <th>NOMBRE</th>
            <th>CATEGORIA</th>
            <th>EDAD</th>
            <th>LUGAR</th>
            <th>CORREO</th>
            <th>F.REGISTRO</th>
            <th>MODIFICAR</th>
    </tr>
    </thead>

    <?php
    $i=1;
    if( !empty($participantes) ):
        foreach($participantes as $row)
        {
            if( $row['Participante']['modificado'] == "si" ){
                $style='style="text-align:center; background-color:red; "';
            }else{
                $style='style="text-align:center;"';
            }
            
            if( $row['Participante']['id'] > 262 ){
                $style='style="text-align:center; background-color:#36f1fa;"';
            }
            
            $rea_style = ( $row['Participante']['reasignar'] )? 'background-color:#b4edb4; text-align:left;':'text-align:left;';
                
            
            
        
            $id = $row['Participante']['id'];
            $nombre = $row['Participante']['nombre_completo'];
            echo '<tr class="">';
            echo '  <td '.$style.'>' .$row['Participante']['numero_participante']  . '</td>';
            echo '  <td style="'.$rea_style.'">' . mb_strtoupper($nombre,'UTF-8') . '</td>';
            echo '  <td style="text-align:left">' . $row['Participante']['categoria_carrera_id'] . '</td>';
            echo '  <td style="text-align:left">' . $row['Participante']['edad'] . '</td>';
            echo '  <td style="text-align:left">' . $row['Participante']['lugar_procedencia'] . '</td>';
            echo '  <td style="text-align:left">' . $row['Participante']['email'] . '</td>';
            echo '  <td style="text-align:left">' . $row['Participante']['created'] . '</td>';
            echo '  <td style="text-align:left; font-size:8pt;"><a href="/inscripciones/edit/'.$row['Participante']['id'].'">Modificar</a> | '
                    . '<a href="/inscripciones/reenviar/'.$row['Participante']['id'].'">Reenviar</a> | '
                    . '<a href="/inscripciones/carta/'.$row['Participante']['id'].'">Carta</a>'
                    . '</td>';
            
            echo '<tr>';
            $i++;
        
        }
        else:
            echo "<tr><td colspan='7' align='center' style='color:red; font-size:10pt;'>No Registros</td></tr>";
    endif;?>
</table>
    
<?php
#debug($categoriaDeCarrera);
?>
</div>