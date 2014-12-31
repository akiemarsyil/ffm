<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Member</p>
							</blockquote>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="10px" class="text-center">ID</th>
									<th width="100px">Nama</th>
									<th width="200">Alamat</th>
									<th width="150px">Jenis Kelamin</th>
									<th width="200px">Status</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($user as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->idUser;?></td>
									<td><?php echo $value->name;?></td>
									<td><?php echo $value->address;?></td>
									<td><?php echo $value->jenis_kelamin;?></td>
									<td><?php echo $value->isAktif;?></td>
									<td>
										<a href="<?php echo base_url($this->module).'/'.$cname.'/edit/'.$value->idUser; ?>"><span class="label label-success">
                                	        <i class="glyphicon glyphicon-pencil"></i> Edit</span>
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