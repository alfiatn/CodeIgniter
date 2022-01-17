<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Talent</h4>
		</div>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>

		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="card-heading">CARI TALENT</div>
					<div class="card-body">
						<form action="<?php echo base_url('index.php/transaksi/cari_talent') ?>" method="post">
							<div class="row">
								<div class="col-md-9">
									<input type="text" class="form-control input-lg" placeholder="NAMA TALENT" name="nama_talent" required>
								</div>
								<div class="col-md-3">
									<input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="TAMBAH">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>

		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
			<div class="card">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<br>
					<div class="panel-heading">JUMLAH PENYEWAAN</div>
					<div class="card-body">

						<form action="<?php echo base_url('index.php/transaksi/bayar'); ?>" method="post">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Talent</th>
										<th>Jenis Kelamin</th>
										<th>Genre</th>
										<th>Harga</th>
										<th>Jam Tersedia</th>
										<th>Jumlah Jam</th>
										<th>Sub Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								
								<?php
									$no = 1;
									if($cart_transaksi != NULL){
										foreach ($cart_transaksi as $cart) {

											echo '
												<tr>
													<input type="hidden" name="id_talent[]" value="'.$cart->id_talent.'">
													<td>'.$no.'</td>
													<td>'.$cart->nama_talent.'</td>
													<td>'.$cart->jenis_kelamin.'</td>
													<td>'.$cart->genre.'</td>
													<td>'.$cart->harga.'</td>
													<td>'.$cart->stok.'</td>
													<td>
														<input type="number" name="jumlah[]" class="form-control" onchange="hitung_subtotal('.$cart->id_cart.','.$cart->harga.',this.value,'.$cart->id_talent.')" value="'.$cart->jumlah.'">
													</td>
													<td><span id="subtot_'.$cart->id_cart.'">'.$cart->harga*$cart->jumlah.'</span></td>
													<td>
														<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_cart" onclick="prepare_hapus_cart('.$cart->id_cart.')">Hapus</a>
													</td>
												</tr>
											';
											$no++;
										}
									} else {
										echo '
											<tr>
												<td colspan="9">
													Keranjang belanja kosong.
												</td>
											</tr>
										';
									}
								?>
								</tbody>
							</table>
							<?php
								if($cart_transaksi != NULL)
								{
									echo '
										<div class="row">
											<div class="col-md-4">
												<h2 style="margin:0">Rp <span id="total_belanja">0</span>,-</h2>
											</div>
											<div class="col-md-5">
												<input type="text" name="nama_cust" placeholder="NAMA CUSTOMER" class="form-control input-lg" required>
											</div>
								
											<div class="col-md-3">
												<input type="submit" name="submit" value="BAYAR" class="btn btn-lg btn-block btn-primary">
											</div>

										';
								}
							?>
						</form>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>


<div id="modal_hapus_cart" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
	 <div class="card-header">
      <div class="modal-header">
	  	<h4 class="modal-title">Konfirmasi Hapus Item Cart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  </div>
      <form action="<?php echo base_url('index.php/transaksi/hapus_item_cart'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id"  id="hapus_id">
	        	<p>Apakah anda yakin menghapus produk ini di cart ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	$.getJSON("<?php echo base_url('index.php/transaksi/get_total_belanja') ?>", function(data){
        $("#total_belanja").text(data.total);
    });

	function prepare_hapus_cart(id_cart)
	{
		$("#hapus_id").val(id_cart);
	}

	function hitung_subtotal(id_cart,harga,qty,id_talent)
	{
		var price;
		price = harga*qty;
		$("#subtot_"+id_cart).text(price);
		//update qty ke tabel cart
		$.post("<?php echo base_url('index.php/transaksi/ubah_jumlah_cart') ?>",
	    {
	    	id_cart : id_cart,
	    	id_talent: id_talent,
	        jumlah: qty
	    }, function(data, status){
	    	console.log(data);
	    	if(data == '0'){
	    		alert("Jam tampil talent tidak mencukupi!");
	    	}
	    });
		//mengganti total belanja di cart
	    $.getJSON("<?php echo base_url('index.php/transaksi/get_total_belanja') ?>", function(data){
	        $("#total_belanja").text(data.total);
	    });
	}
</script>
