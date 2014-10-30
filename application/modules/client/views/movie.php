<div id="page-content" class="block" style="min-height:500px;">
	<div class="row">
		<div class="col-sm-12">
			<div class="block full" style="margin-top:10px;">
				<div class="row">
					<div class="col-sm-12">
						<blockquote>
							<p><i class="icon-file-text"></i> Informasi Film Film</p>
						</blockquote>
						<!-- <a href="<?php echo base_url($this->module).'/admin_master/form_film'; ?>" class="btn btn-success">
							<i class="icon-plus icon-white"></i> Add
						</a><br><br> -->
						<div class="container">
  							<label>Tanggal Tayang : </label>
  							<div class="form-group">
								<label class="col-md-1 control-label">Dari</label>
								<div class="col-md-3">
									<input type="text" id="tgl_from" name="tgl_from" class="form-control date-picker text-center" data-date-format="yyyy-mm-dd" placeholder="Dari">
								</div>
								<label class="col-md-1 control-label text-center">Sampai</label>
								<div class="col-md-3">
									<input type="text" id="tgl_to" name="tgl_to" class="form-control date-picker text-center" data-date-format="yyyy-mm-dd" placeholder="Sampai">
								</div>
							</div><br>
							<div class="form-group">
								<a id="cari_film" class="btn btn-primary">Tampilkan</a>
							</div><br><br>
							<div class="panel panel-default">
							  	<div class="panel-heading">
							    	<h3 class="panel-title">Jadwal Film</h3>
							  	</div>
							  	<div class="panel-body" id="target">
							    	
							  	</div>
							</div>
  						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(
		function(){
   			$( ".date-picker" ).datepicker({ dateFormat: 'yy-mm-dd' });

   			$("#cari_film").on('click',function(){
   				var tgl_from = $('#tgl_from').val();
   				var tgl_to = $('#tgl_to').val();
   				$.ajax({
					type: "POST",
					url: "<?php echo base_url($this->module).'/'.$this->cname.'/load_film'; ?>",
					data: {	tgl_from:tgl_from,
							tgl_to:tgl_to},
					success: function(msg)
					{
						 // alert(msg);
						$('#target').html(msg);
						// $('#print_daftar_pembelian').show();
					}
				});
   			});
  		});
</script>