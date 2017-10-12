<?php
$Description = __d('runtepeaca', 'Run Tepeaca: Run Tepeaca club deportivo de Tepeaca aficionados y entusiastas por el atletismo');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        
    <title>
		<?php echo $Description ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
    
	<?php
		
		echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap.min','jquery-ui.min','style'));
        echo $this->Html->script(array('jquery-3.2.1.min.js','popper.min.js','bootstrap.min.js','jquery-ui.min.js'));
        
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

       
</head>
<body>
    
     
     
<div id="wrapper" class="container">
  
  <?php echo $this->fetch('content'); ?>

</div>


    <?php echo $this->element("footer"); ?>
    
</body>
</html>
