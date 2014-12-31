<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Complain</p>
							</blockquote>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="100px">Oleh</th>
									<th width="200px">Pesan</th>
									<th width="150px">Status</th>
									<th width="120">ID_User</th>
									<th class="text-center" width="120px">ID_Thread</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($complain as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->com_by;?></td>
									<td><?php echo $value->message;?></td>
									<td><?php echo $value->status;?></td>
									<td><?php echo $value->id_thread_comp;?></td>
									<td><?php echo $value->id_user_comp;?></td>
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