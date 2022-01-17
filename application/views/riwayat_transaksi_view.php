<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="card">
<div class="main-content">
	<div class="container-fluid">
		<br>
		<h3 class="page-title">Data Riwayat Transaksi</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Penyewa</th>
									<th>Tgl.Sewa</th>
									<th>Total</th>
									<th>Manajer</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($riwayat as $r) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$r->nama_cust.'</td>
											<td>'.$r->tgl_transaksi.'</td>
											<td>'.$r->total.'</td>
											<td>'.$r->id_manajer.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_detil_transaksi" onclick="prepare_detil_transaksi('.$r->id_transaksi.')">Lihat Detil</a>
											</td>
										</tr>
									';
									$no++;
								}
							?>
							</tbody>
						</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<div id="modal_detil_transaksi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
		 <div class="card-header">
      <div class="modal-header">
				<h4 class="modal-title">Detil Transaksi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
			</div>
      <form action="<?php echo base_url('index.php/user_talent/update_user'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	
	      </div>
	      <div class="modal-footer">
	        <a href="#" class="btn btn-warning" id="cetak_nota" target="_blank">CETAK NOTA</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	
	function prepare_detil_transaksi(id_cart)
	{
		$(".modal-body").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/transaksi/get_detil_transaksi_by_id/' + id_cart,  function(data){
			$(".modal-body").html(data.show_detil);
		});

		$('#cetak_nota').attr('href','<?php echo base_url();?>index.php/transaksi/cetak_nota/' + id_cart);
	}
</script>
