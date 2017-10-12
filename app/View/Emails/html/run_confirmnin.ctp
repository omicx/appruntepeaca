<?php
/*
* Autor: ISC Omar Flores Martinez
* email: omix.isc@gmail.com
* Web site: http://omix.isc.blogspot.com
* Date: 19/04/2011
* Hour: 15:02:16
*/

# /app/views/elements/email/html/aspirante_confirm.ctp
?>

<div style="text-align:center; border-bottom:1px dotted gray;">

<div style="text-align:center;height:auto; width:100%;"> 
	<img src="<?=$server_url;?>/img/logo-header.png" alt="Run Tepeaca 2017" title="Run Tepeaca 2017" />
</div>

<p style="padding-top:30px; padding-left:40px; font-size:9pt; text-align:justify;">
<br/><br/><br/>

Estimado  <strong><?= $participante ?></strong>, hemos recibido tu solicitud de registro como participante a la 
<?=$carrera_title?>,<br/> 
la cual se llevar&aacute; a cabo el próximo <?=$fecha_carrera?> en las instalaciones del Parque Recreativo de Santa Cruz Temilco, Tepeaca, Puebla. <br/>
Te pedimos confirmes tu asistencia descargando tu hoja de exhoneración y presentandola el dia del evento.
</p>

<strong>Descarga tu Hoja de Exhoneración en la liga</strong>
<p style="padding-top:30px; padding-left:40px; font-size:9pt; text-align:center; color:red; font-weight:bold;">
<a href="<?= $activate_url;?>"><?=$activate_url;?></a>
</p>

<p style="padding-top:30px; padding-left:40px; font-size:9pt; text-align:justify;">
En breve nos pondremos en contacto contigo.<br/>
Gracias por tu participacion !!!
</p>
</div>