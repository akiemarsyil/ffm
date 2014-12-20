
<form id="form_pesan" action="<?php echo base_url().$this->module.'/'.$this->cname;?>/cetak_ticket" method="post">
	<div id="flash_message"> </div>
	<div class="row">
		<div class="col-md-2">
			<label>Nama</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="name" name="name" class="form-control" value="<?php echo @$user[0]->name;?>" readonly>
			<input style="display:none" type="text" id="username" name="username" class="form-control" value="<?php echo @$user[0]->username;?>" >
			<input style="display:none" type="text" id="us_id" name="us_id" class="form-control" value="<?php echo @$usr;?>" >
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Alamat</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="address" name="address" class="form-control" value="<?php echo @$user[0]->address;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Kota</label>
		</div>
		<div class="col-md-4">
			<input type="city" id="city" name="address" class="form-control" value="<?php echo @$user[0]->city;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Email</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="email" name="email" class="form-control" value="<?php echo @$user[0]->email;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Jenis Kelamin</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?php echo @$user[0]->jenis_kelamin;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Bioskop</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="cinema" name="cinema" class="form-control" value="<?php echo @$cinema[0]->name;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Film</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="movie" name="movie" class="form-control" value="<?php echo @$movie[0]->name;?>" readonly>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Hari</label>
		</div>
		<div class="col-md-4">
			<select id="hari" name="hari" class="form-control chosen-select">
				<?php foreach ($jadwal as $key => $value) {
				?>
				<option value="<?php echo $value->hari;?>"><?php echo $value->hari;?></option>
				<?php }?>
			</select>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Pukul</label>
		</div>
		<div class="col-md-4">
			<select id="pukul" name="pukul" class="form-control chosen-select">
				<?php foreach ($jadwal as $key => $value) {
				?>
				<option value="<?php echo $value->pukul;?>"><?php echo $value->pukul;?></option>
				<?php }?>
			</select>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Harga</label>
		</div>
		<div class="col-md-4">
			<select id="harga" name="harga" class="form-control chosen-select">
				<?php foreach ($stock as $key => $value) {
				?>
				<option value="<?php echo $value->harga;?>"><?php echo $value->harga;?></option>
				<?php }?>
			</select>
		</div>
	</div><br>
	
	<div class="row">
		<div class="col-md-2">
			<label>Jumlah</label>
		</div>
		<div class="col-md-4">
			<input type="text" id="jml" name="jml" class="form-control">
		</div>
	</div><br>
	<div id="flash_message"></div><br>
	<div class="row">
		<div class="col-md-4">
			<button id="sub" class="btn btn-success">Submit</button>
			<button type="submit" class="btn btn-default" id="print" name="print">Print</button>
		</div>
	</div>
</form>
<script type="text/javascript">
	// $('#print').hide();
	$('#print').show();
	$("#sub").on('click',function(){
		var url = "<?php echo base_url().$this->module.'/'.$this->cname;?>/pesan_ticket"
		$.ajax({
            type: "POST",
            url: url,
            data: $('#form_pesan').serialize(),
            success: function(msg)
            {
                // alert(msg);
                data = msg.split("|");
                if(data[0]==1){
                    $('#print').show();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
	});
	// $('#print').on('click',function(){
	// 	var url = "<?php echo base_url().$this->module.'/'.$this->cname;?>/cetak_ticket"
	// 	$.ajax({
 //            type: "POST",
 //            url: url,
 //            data: $('#form_pesan').serialize(),
 //            success: function(msg)
 //            {
 //                // alert(msg);
 //                // data = msg.split("|");
 //                // if(data[0]==1){
 //                //     // $('#print').show();
 //                // }
 //                // $("#flash_message").show();
 //                // $("#flash_message").html(data[1]);
 //                // setTimeout(function() {$("#flash_message").hide();}, 5000);
 //            }
 //        });
 //        return false;
	// });
</script>