<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="tambah-div">
					<div class="row">
						<div class="col-sm-4">
							<blockquote>
								<p><i class="icon-file-text"></i> Pendaftaran Film Malang</p>
							</blockquote>
						</div>
					</div>
					<?php echo $this->session->flashdata('flash_message'); ?>
					<?php
						if($aksi == 'add'){

					?>
					<form action="<?php echo base_url($this->module).'/admin_master/tambah_film';?>" method="post" enctype="multipart/form-data">
					<?php 
						}else{
					?>
					<form action="<?php echo base_url($this->module).'/admin_master/edit_film';?>" method="post" enctype="multipart/form-data">
					<?php } ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Nama</span>
								<input type="text" id="name" name="name" value="<?php echo @$film[0]->name; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-expand"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Direktor</span>
								<input type="text" id="director" name="director" value="<?php echo @$film[0]->director; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Kategori</span>
								<input type="text" id="categories" name="categories" value="<?php echo @$film[0]->categories; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<textarea id="content" name="content" class="form-control"><?php echo @$film[0]->content; ?></textarea>
								<span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
							</div>
							<br>
							<div class="input-group">
  								<span class="input-group-addon">Bioskop</span>
  								<select name="cinema" class="chosen-select form-control">
  									<option value=""></option>
  									<?php
  										foreach ($bioskop as $key => $value):
  									?>
  									<option value="<?php echo $value->idCinemas; ?>"><?php echo $value->name; ?></option>
  									<?php
  										endforeach
  									?>
  								</select>
  								<span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
  							</div>
  							<br>
  							<div class="input-group">
  								<span class="input-group-addon">Tanggal Tayang</span>
  								<input type="text" id="play" name="play" class="form-control date-picker text-center" placeholder="Tanggal Tayang" >
  								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  							</div>
							<br>
							<div class="input-group">
    							<label>Image</label>
    							<?php 
    								if(@$film[0]->images){
    							?>
    							<br><img src="<?php echo base_url().'public/assets/movie/'.$film[0]->images;?>" style="height:150px;widht:150px">
    							<?php } ?>
    							<input type="file" id="images" name="images">
    							<span class="help-block">Max file size = 1 Mb</span>
  							</div>
						</div>
						<div class="form-group">
							<!-- Untuk menu edit -->
							<input hidden id="img_old" name="img_old" value="<?php echo @$film[0]->images;?>">
							<input hidden id="id_current" name="id_current" value="<?php echo @$film[0]->idMovies;?>">
							<!-- Tombol aksi -->
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url($this->module).'/film'; ?>" class="btn btn-warning">Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(
			function(){
    			$( ".date-picker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  			});
	</script>