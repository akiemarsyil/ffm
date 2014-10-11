<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-4">
			<h2>Login</h2>
            <?php echo $this->session->flashdata('flash_message'); ?>
			<form method="post" action="<?php echo base_url().'client/do_login';?>">
  				<div class="form-group">
    				<label>Username</label>
    				<input type="text" class="form-control" id="username" name="username">
  				</div>
  				<div class="form-group">
    				<label class="control-la">Password</label>
    				<input type="password" class="form-control" id="passwd" name="passwd">
  				</div>
  				<div class="form-group">
  					<div class="pull-right">
  						<a href="<?php echo base_url().'client/register';?>">Register ?</a>
  					</div><br>
                        <div class="row">
                            <div class="col-xs-12 text-right">
  					            <button type="submit" class="btn btn-sm btn-primary"><i class="icon-angle-right"></i> Submit</button>
                            </div>
                        </div>
  				</div>
  			</form>
		</div>
	</div>
</div>