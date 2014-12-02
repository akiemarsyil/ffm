<div class="container">
	<div class="block full" style="margin-top:10px;">
		<blockquote>
			<p><i class="icon-file-text"></i> Posting Thread</p>
		</blockquote>
		<form id="form_forum" method="post">
			<div id="flash_message"> </div>
				<div class="row">
					<div class="col-md-2">
						<label>Judul : </label>
					</div>
					<div class="col-md-4">
						<input type="text" id="title" name="title" class="form-control" value="<?php //echo @$user[0]->address;?>">
					</div>
				</div><br>

				<div class="row">
					<div class="col-md-2">
						<label>Kategori : </label>
					</div>
					<div class="col-md-4">
						<!-- <input type="text" id="address" name="address" class="form-control" value="<?php //echo @$user[0]->address;?>"> -->
						<select id="categories" name="categories" class="form-control chosen-select">
							<option></option>
							<option value="action">Action</option>
							<option value="drama">Drama</option>
							<option value="comdey">Comedy</option>
							<option value="horor">Horor</option>
							<option value="thriller">Thriller</option>
						</select>
					</div>
				</div><br>
	
				<div class="row">
					<div class="col-md-2">
						<label>Content : </label>
					</div>
					<div class="col-md-12">
						<textarea name="isi" id="isi" class="ckeditor" cols="80"   rows='8' ><?php //echo @$admin_content[0]->fulltext; ?></textarea>
					</div>
				</div><br>
	
				<div class="row">
					<div class="col-md-4">
						<button id="sub" type="submit" class="btn btn-success">Submit</button>
						<!-- <a class="btn btn-default" id="print" name="print">Print</a> -->
					</div>
				</div>
			</form>
	</div>
</div>
<script type="text/javascript">
	$('#form_forum').submit(function(){
		var url = "<?php echo base_url().$this->module.'/'.$this->cname;?>/do_forum";
		var title = $('#title').val();
		var cat = $('#categories').val();
		var isi = $('#isi').val();
		$.ajax({
            type: "POST",
            url: url,
            // data: $('#form_forum').serialize(),
            data:{title:title,cat:cat,isi:isi},
            success: function(msg)
            {
                // alert(msg);
                data = msg.split("|");
                if(data[0]==1){
                    // $('#print').show();
                }
                $("#flash_message").show();
                $("#flash_message").html(data[1]);
                // setTimeout(function() {$("#flash_message").hide();}, 5000);
            }
        });
        return false;
	})
</script>