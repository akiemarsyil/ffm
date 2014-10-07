<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Register</h2>
			<form role="form" method="post" action="<?php base_url().'/doRegister;'?>" enctype="multipart/form-data">
  				<div class="form-group">
    				<label>Nama</label>
    				<input type="text" class="form-control" id="nama" name="nama">
  				</div>
  				<div class="form-group">
    				<label>Username</label>
    				<input type="text" class="form-control" id="username" name="username">
  				</div>
  				<div class="form-group">
    				<label>Password</label>
    				<input type="password" class="form-control" id="passwd" name="passwd">
  				</div>
  				<div class="form-group">
    				<label>Confirm Password</label>
    				<input type="password" class="form-control" id="cfPasswd" name="cfPasswd">
  				</div>
  				<div class="form-group">
    				<label>Email</label>
    				<input type="text" class="form-control" id="email" name="email" placeholder="nama@mail.com">
  				</div>
  				<div class="form-group">
    				<label>Alamat</label>
    				<input type="text" class="form-control" id="alamat" name="alamat">
  				</div>
  				<div class="form-group">
    				<label>Kota</label>
    				<input type="text" class="form-control" id="kota" name="kota">
  				</div>
  				<div class="form-group">
    				<label>Jenis Kelamin</label><br>
    				<input type="radio" id="jk" name="jk" value="pria">Pria
    				<input type="radio" id="jk" name="jk" value="perempuan">Perempuan
  				</div>
  				<div class="form-group">
    				<label>Image</label>
    				<input type="file" id="img" name="img">
    				<span class="help-block">Max file size = 1 Mb</span>
  				</div>
  				<input type="hidden" id="isAktif" name="isAktif" class="form-control" value="1">
  				<input type="hidden" id="level" name="level" class="form-control" value="0">
  				<div class="form-group">
  					<button type="submit" class="btn btn-default pull-right">Submit</button>
  				</div>
  			</form>
		</div>
	</div>
</div>