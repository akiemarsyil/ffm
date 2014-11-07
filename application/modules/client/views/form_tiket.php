<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
	    	<h3 class="panel-title">Reservasi Ticket</h3>
	  	</div>
	  	<div class="panel-body">
	  		<?php echo form_open('', '');?>
	  			<div class="row">
	  				<div class="col-md-2">
	  					<?php echo form_label('Nama', 'nama');?>
	  				</div>
	  				<div class="col-md-4">
	  					<?php  
	  						$data = array('name' => 'name',
	  										'id' => 'name',
	  										'class' => 'form-control');
	  						echo form_input($data);
	  					?>
	  				</div>
	  			</div>
	  			<?php echo br(2); ?>
	  			<div class="row">
	  				<div class="col-md-2">
	  					<?php echo form_label('Alamat', 'alamat');?>
	  				</div>
	  				<div class="col-md-4">
	  					<?php  
	  						$data = array('name' => 'address',
	  										'id' => 'address',
	  										'class' => 'form-control');
	  						echo form_input($data);
	  					?>
	  				</div>
	  			</div>
	  			<?php echo br(2); ?>
	  			<div class="row">
	  				<div class="col-md-2">
	  					<?php echo form_label('Telephone', 'telephone');?>
	  				</div>
	  				<div class="col-md-4">
	  					<?php  
	  						$data = array('name' => 'telephone',
	  										'id' => 'telephone',
	  										'class' => 'form-control');
	  						echo form_input($data);
	  					?>
	  				</div>
	  			</div>
	  			<?php echo br(2); ?>
	  			
	  		<?php echo form_close();?>
	  	</div>
	</div>
</div>