<?php
	$user = $this->session->userdata('swhpsession');
	// print_r($user);exit;
?>
<div class="jumbotron">
  	<h1>Film Fantasy Malang</h1>
  		<p>Wadah komunitas pecinta film kota Malang</p>
</div>
<header>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url().'client/ticket';?>">Reservasi Tiket</a></li>
				<li><a href="<?php echo base_url().'client/forum';?>">Forum</a></li>
				<li><a href="<?php echo base_url().'client/movie/cinema';?>">Informasi Bioskop</a></li>
				<li><a href="<?php echo base_url().'client/movie/film';?>">Jadwal Film</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php 
					if($user != null){
				?>
				<li><a href="<?php echo base_url().'client/dashboard';?>">Wellcome, <?php echo strtoupper($user[0]->username); ?></a></li>
				<li><a href="<?php echo base_url().'client/do_logout';?>">Logout</a></li>
				<?php
					}else{
				?>
				<li><a href="<?php echo base_url().'client/login';?>">Login</a></li>
				<?php
					}
				?>
			</ul>
		</div>
	</nav>
</header>