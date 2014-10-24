<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Ticket</p>
							</blockquote>
							<a href="<?php echo base_url($this->module).'/admin_master/form_ticket'; ?>" class="btn btn-success">
								<i class="icon-plus icon-white"></i> Add
							</a><br><br>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="100px">Film</th>
									<th width="200px">Harga</th>
									<th width="150px">Bioskop</th>
									<th width="200">Stok</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($film as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->nama;?></td>
									<td><?php echo $value->harga;?></td>
									<td><?php echo $value->bioskop;?></td>
									<td><?php echo $value->stock;?></td>
									<td>
										<a href="<?php echo base_url($this->module).'/admin_master/form_ticket/'.$value->idMovies; ?>"><span class="label label-success">
                                	        <i class="glyphicon glyphicon-pencil"></i> Edit</span>
                                	    </a>
                                	    <a href="<?php echo base_url($this->module).'/admin_master/delete_ticket/'.$value->idMovies; ?>">
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
	$(document).ready(function() {
    	$('#example').dataTable();
	});
</script>