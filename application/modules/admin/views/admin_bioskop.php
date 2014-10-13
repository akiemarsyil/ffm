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
						<table id="example-datatable" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="50px" class="text-center">No</th>
									<th width="180px">Nama</th>
									<th width="150px">Keterangan</th>
									<th width="150px">No Telp</th>
									<th width="">Alamat</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	webApp.datatables(),
	$("#example-datatable").dataTable({
		// aoColumnDefs:[{
		// 	bSortable:!1,
		// 	aTargets:[4]
		// }],
		fnDrawCallback: function ( oSettings ) {
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
				{
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
				}
			}
		},
		aoColumnDefs: [
			{ "bSortable": false, "aTargets": [ 0,5 ] }
		],
		bProcessing:true,
		bServerSide:true,
		sAjaxSource: "<?php echo base_url($this->module); ?>/_datatable/bioskop/",
		iDisplayLength:15,
		aLengthMenu:[[15,30,50,-1],[15,30,50,"All"]],
		"fnServerData": function(sSource, aoData, fnCallback){
		    $.ajax(
		       	{
		       	  'dataType': 'json',
		       	  'type'  : 'POST',
		       	  'url'    : sSource,
		       	  'data'  : aoData,
		       	  'success' : fnCallback
		       	}
		    );
		} 
	}),
	$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")
});
});