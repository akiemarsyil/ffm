<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Thread Forum</p>
							</blockquote>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="100px">Judul</th>
									<th width="200">Kategori</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($forum as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->title;?></td>
									<td><?php echo $value->categories;?></td>
									<td>
										<a onclick="actDel('<?php echo $value->idForums;?>')" href="#">
										<span class="label label-danger"><i class="glyphicon glyphicon-remove"></i> Delete</span>
                                	    </a>
                                	</td>
								</tr>
								<?php
									$i++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function actDel(object){
		alertify.confirm("Are you sure ?", function (e) {
		   if (e) {
		        $.ajax({
		            type : "post",
		            url : "<?php echo base_url().$this->module.'/'.$this->cname.'/delete_forum/'; ?>",
		            data : {id : object},
		            success : function(msg)
		            {
		                // $('#example').dataTable().fnDraw();
		            }
		        });
		   	}
		});
	}
	// $(document).ready(function() {
    	$('#example').dataTable();
	// });
</script>