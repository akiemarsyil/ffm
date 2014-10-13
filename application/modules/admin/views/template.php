<!DOCTYPE HTML>
<html>

<head>
	<?php $this->load->view('/general/header'); ?>
</head>

<body>
<?php $this->load->view('/general/navigasi'); ?>

<div class="container">
	<?php $this->load->view('general/sidebar',''); ?>
	<div class="col-md-9">
		<?php echo $content; ?>
	</div>
</div>

<?php $this->load->view('/general/footer'); ?>
</div>
</body>
</html>