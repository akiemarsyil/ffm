<?php $user = $this->session->userdata('swhpsession'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<h1>Selamat datang di<strong>Film Fantasy Malang</strong></h1>
			<br>

			<div class="row" id="awal">
				<!-- menampilkan avatar -->
				<div class="col-md-3">
					<img src="<?php echo base_url().'public/assets/uploads/'.$user[0]->images;?>" alt="avatar">
				</div>
				<!-- menampilkan biodata user -->
				<div class="col-md-8">
					<div class="row">
						<div class="form-group">
							<label class="col-md-2 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" name="username" readonly="readonly" class="form-control" value="<?php echo $user[0]->username; ?>">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-6">
								<input type="text" name="nama" readonly="readonly" class="form-control" value="<?php echo $user[0]->name; ?>">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-6">
								<input type="text" name="alamat" readonly="readonly" class="form-control" value="<?php echo $user[0]->address; ?>">
							</div>
						</div>
					</div>
					<br>
				</div>
				<!-- tombol edit -->
				<div class="row">
					<div class="form-group">
						<div class="col-md-5">
							<button type="button" class="btn btn-info pull-right" name="edit" id="edit">Edit Profile</button>
						</div>
					</div>
				</div>
			</div>

			<!-- tampilan edit -->
			<div class="row" id="info">
				<div class="col-md-8">
				<?php echo $this->session->flashdata('flash_message'); ?>
					<form method="post" action="<?php echo base_url().'client/do_register';?>" enctype="multipart/form-data">
  						<div class="form-group">
    						<label>Nama</label>
    						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user[0]->name;?>">
  						</div>
  						<div class="form-group">
    						<label>Username</label>
    						<input type="text" class="form-control" id="username" name="username" value="<?php echo $user[0]->username;?>">
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
    						<input type="text" class="form-control" id="email" name="email" value="<?php echo $user[0]->email;?>">
  						</div>
  						<div class="form-group">
    						<label>Alamat</label>
    						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user[0]->address;?>">
  						</div>
  						<div class="form-group">
    						<label>Kota</label>
    						<input type="text" class="form-control" id="kota" name="kota" value="<?php echo $user[0]->city;?>">
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
    						<?php 
    							if($user[0]->images!=null)
    						?>
    						<img class="col-md-3" src="<?php echo base_url().'public/assets/uploads/'.$user[0]->images; ?>">
    						<input type="file" id="img" name="img">
    						<span class="help-block">Max file size = 1 Mb</span>
  						</div>
  						<input type="hidden" id="isAktif" name="isAktif" class="form-control" value="yes">
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
	</div>
</div>

<script type="text/javascript">
	$("#info").hide();
	$("#edit").click(function(){
		$("#awal").hide();
		$("#info").show();
	});
</script>