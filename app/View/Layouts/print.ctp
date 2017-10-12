<?php echo $this->Html->docType('html5');?>
<html lang="es">
<head>
<?php echo $this->Html->charset();?>
<link rel="stylesheet" href="/css/reportes/reports_screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/reportes/reports_print.css" type="text/css" media="print" />

<?php


echo $this->Html->css(array( 'bootstrap.min','humanity/jquery-ui')); //Theme Jquery ui
echo $this->Html->script(array('jquery-3.2.1.min.js','bootstrap.min.js','jquery-ui.min.js')); //Jquery Core

          ?>


<script type="text/javascript">
$(function(){
	$("#btnPrinter").click(function(){
		window.print();
		return false;
	});//event

	$("#btnClose").click(function(){
		window.close();
	});//event
});
</script>

</head>


<body>

	<div class="boxprint">
	<?=$this->Form->button("Imprimir",array("type"=>"button", "id"=>"btnPrinter", "class"=>"btPrint"));?>
	<?=$this->Form->button("Cerrar",array("type"=>"button", "id"=>"btnClose", "class"=>"btClose"));?>
	</div>
	<div id="content_report">
		<?php echo $this->fetch('content'); ?>
	</div>
 
</body>
</html>