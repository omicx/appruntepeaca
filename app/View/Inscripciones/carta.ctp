<div style="padding:30px 40px 10px 40px; border: 1px solid #666;">
    <div style="text-align:center;">
    <?php echo $this->Html->image('header-hexoneracion-trail.png', array('alt' => 'run Tepeaca'));?>
    </div>
<h3 style="text-align:center;font-size: 12pt; color: #666; font-weight:bold;" >
    CARTA EXHONERACION <br/>
    <?php echo $titulo_encabezado; ?>
     </h3>

<p style="text-align: justify; line-height: 20px; font-size: 10pt; color: #666;">
Yo, por el solo hecho de firmar este documento, acepto cualquier y todos
los riesgos y peligros que sobre mi persona recaigan en cuanto a mi participación en
la <strong><?php echo $titulo_encabezado; ?></strong>
Por lo tanto, yo soy el único
responsable de mi salud, cualquier consecuencia, accidentes, perjuicios, deficiencias que puedan causar,
de cualquier manera posibles alteraciones a mi salud, integridad física, o inclusive la muerte.
Por esa razón libero de cualquier responsabilidad al respecto a sus organizadores y patrocinadores y por
medio de este conducto renuncio, sin limitación alguna a cualquier derecho, demanda o indemnización al respecto.
Así mismo, autorizo a los Organizadores, el uso de mi imagen y voz, ya sea parcial o totalmente,
en cuanto todo lo relacionado al evento, de cualquier manera y en cualquier momento.
Por este conducto reconozco y entiendo todas las regulaciones del evento, incluyendo y sin limitarse
al reglamento de competencia.
</p>

<table class="" border="1" style="font-size:10pt; font-weight: bold;">
    <tr>
        <td class="fiil_box">Folio de corredor:</td><td><?php echo $participante['Participante']['numero_participante'] ?></td>
    </tr>
    <tr>
        <td class="fiil_box">Nombre:</td><td><?php echo $participante['Participante']['nombre_completo'] ?></td>
    </tr>
    <tr>
        <td class="fiil_box">Categoria:</td><td><?php echo $categorias[$participante['Participante']['categoria_carrera_id']]; ?></td>
    </tr>
    <tr>
        <td class="fiil_box">Evento:</td><td><?php echo $titulo_encabezado;?></td>
    </tr>

    <tr>
    <td colspan="2">
    <div class="alert alert-success" role="alert">
    
    <!--
    <h6 class="alert-heading">
    Para concluir el proceso de inscripción: <br/><br/>
    1.- Acudir el día del evento a partir de las 6:00 AM  al <strong>modulo de inscripciones</strong> ubicado en el Parque Tepeyacatl, 2 Poniente Mo. 118, Colonia Centro, Tepeaca, Puebla.<br/><br/>
    2.- Realizar el pago de <strong>$350 pesos.</strong><br/><br/>
    3.- Recoger tu numero de competidor 

    </h6> -->

    <h6 class="alert-heading">
    Para concluir el proceso de inscripción: <br/><br/>
    1.- Acude a tu sucursal OXXO más cercana y realizar tu pago de $350 pesos a la cuenta 
    <strong>4766 / 8411 / 1160 / 9791</strong> en las próximas 24 horas a partir de este registro.
    <br/><br/>
    2.- Confirmar tu pago mediante un mensaje de WhatsApp al número celular 22 31 06 11 64 enviando fotografía de su ticket de pago.
    <br/><br/>
    3.- Espera un mensaje de confirmación de tu inscripción.
    <br/><br/>
    4.- Acude a recoger tu kit de competidor el día 2 de Septiembre de 6 a 7.30 hrs en el Parque Tepeyacatl, antes de iniciar la carrera.

    </h6>


    </div>
    </td>
    </tr>

    <tr>

        <td colspan="2">

<table border="1" style="margin-top: 10px;" width="100%">
    <tr>
      <td>
            <?php
            $stringQr= 'http://'.env('SERVER_NAME').'/inscripciones/entregado/'. $participante['Participante']['id'];
            //$stringQr=  $participante['Participante']['numero_participante'];
            $options=array("size"=>"250x250");
            echo $this->QrCode->text($stringQr,$options); ?>
        </td>
        <td>
          <div>Firma del Competidor</div>
          <div style="border-bottom: 1px solid #000000; height: 100px;">&nbsp;</div>
        </td>
    </tr>
</table>



</td>
</tr>

</table>

</div>
