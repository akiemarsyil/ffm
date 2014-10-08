<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-4">
			<h2>Login</h2>
			<form role="form" method="post" action="<?php base_url().'/client/doLogin;'?>">
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
  					<button type="submit" class="btn btn-default pull-right">Submit</button>
  				</div>
  			</form>
		</div>
	</div>
</div>