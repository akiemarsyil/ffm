<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Register</h2>
			<?php echo $this->session->flashdata('flash_message'); ?>
			<form method="post" action="<?php echo base_url().'client/do_register';?>" enctype="multipart/form-data">
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
    				<select id="jk" name="jk" class="form-control" placeholder="Pilih Jenis">
						<!-- <option value="">Pilih Jenis</option> -->
						<option value="pria">Pria</option>
						<option value="perempuan">Perempuan</option>
					</select>
  				</div>
  				<div class="form-group">
    				<label>Image</label>
    				<input type="file" id="img" name="img">
    				<span class="help-block">Max file size = 1 Mb</span>
  				</div>
  				<input type="hidden" id="isAktif" name="isAktif" class="form-control" value="no">
  				<input type="hidden" id="level" name="level" class="form-control" value="0">
  				<div class="form-group">
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