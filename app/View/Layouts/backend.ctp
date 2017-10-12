<?php
$Description = __d('runtepeaca', 'Run Tepeaca: Run Tepeaca club deportivo de Tepeaca aficionados y entusiastas por el atletismo');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>
		<?php echo $Description ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php

		echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap.min','jquery-ui.min','font-awesome/css/font-awesome.min',
        	'dataTables.bootstrap4','sb-admin'));

        echo $this->Html->script(array('jquery/jquery.min.js',
        	'popper/popper.min.js', 'bootstrap/js/bootstrap.min.js',
        	'jquery-ui.min.js',
        	'datatables/jquery.dataTables.js','datatables/dataTables.bootstrap4.js',
        	'jquery-easing/jquery.easing.min.js',
        	'chart.js/Chart.min.js',
        	'sb-admin.min.js' ));


        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

<style>

</style>

  </head>


  <body class="fixed-nav" id="page-top">

   <?php echo $this->element("navigation");?>


    <div class="content-wrapper py-3">

      <div class="container-fluid">


        <?php echo $this->element("breadcrumbs");?>
        <?php #echo $this->element("iconCards");?>
        <?php
        if($this->Session->check('Message.flash')){
            echo $this->Session->flash();
        }

        ?>
        <?php echo $this->fetch('content'); ?>



    </div>
    <!-- /.content-wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>



  </body>

</html>
