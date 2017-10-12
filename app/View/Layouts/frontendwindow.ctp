<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css(array('ui-lightness/jquery-ui-1.10.3.custom.css'));
                echo $this->Html->script(array('jquery-1.9.0.min.js','jquery.simplemodal.1.4.4.min.js'));
	?>
</head>
<body>

<div id="container">
    <div id="content">  
        <div id="content_view">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</div>
</body>
</html>

