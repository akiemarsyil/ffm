<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Bioskop</p>
							</blockquote>
							<a href="<?php echo base_url($this->cname).'/form_bioskop'; ?>" class="btn btn-success">
								<i class="icon-plus icon-white"></i> Add
							</a><br><br>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="100px">Nama</th>
									<th width="200px">Keterangan</th>
									<th width="150px">No Telp</th>
									<th width="200">Alamat</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($bioskop as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->name;?></td>
									<td><?php echo $value->description;?></td>
									<td><?php echo $value->telephone;?></td>
									<td><?php echo $value->address;?></td>
									<td>
										<a href="<?php echo base_url($this->cname).'/form_bioskop/'.$value->idCinemas; ?>"><span class="label label-success">
                                	        <i class="icon-pencil icon-white"></i> Edit</span>
                                	    </a>
                                	    <a href="<?php echo base_url($this->cname).'/delete_bioskop/'.$value->idCinemas; ?>">
                                	        <span class="label label-danger"><i class="icon-remove icon-white"></i> Delete</span>
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