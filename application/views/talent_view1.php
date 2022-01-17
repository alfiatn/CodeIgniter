<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Talent</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th> No. </th>
                <th> ID Talent </th>
                <th> Nama Talent </th>
                <th> Jenis Kelamin </th>
                <th> Genre </th>
                <th> Jenis Talent </th>
                <th> Harga </th>
                <th> Jam </th>
                <th> Aksi </th>
              </thead>
              <?php
              $no=0;
              foreach($arr as $t) {
                $no++;
                echo '<tr>
                <td>'.$no.'</td>
                <td>'.$t->id_talent.'</td>
                <td>'.$t->nama_talent.'</td>
                <td>'.$t->jenis_kelamin.'</td>
                <td>'.$t->genre.'</td>
                <td>'.$t->nama_jenis.'</td>
                <td>'.$t->harga.'</td>
                <td>'.$t->stok.'</td>
                <td><a href="#" onclick="prepare_update_talent('.$t->id_talent.')"
                                data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>

                <a href="'.base_url().'index.php/Talent/delete_talent/'.$t->id_talent.'"
                                class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin\')">Hapus</a>
                </tr>';
              }
               ?>

            </table>

            <?php
              $pesan = $this->session->flashdata('pesan');
              if(!empty($pesan)) {
                  echo '<div class="alert alert-primary">'.$pesan.'</div>';
              }
             ?>

            <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a>

            <!-- MODAL TAMBAH -->
            <div class="modal fade" id="tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="card-header">
                  <div class="modal-header">
                  <h4 class="card-title" id="myModalLabel">Tambah Talent</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
                  </div>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url() ?>index.php/Talent/add_talent" method="post" enctype="multipart/form-data">
                      ID Talent
                      <input type="text" name="id_talent" class="form-control"><br>
                      Nama Talent
                      <input type="text" name="nama_talent" class="form-control"><br>
                      Jenis Kelamin
                      <input type="enum" name="jenis_kelamin" class="form-control"><br>
                      Genre
                      <input type="text" name="genre" class="form-control"><br>
                      Jenis Talent
                      <select name="tb_jenis" class="form-control">
				            	<?php
					              	foreach ($tb_jenis as $j) {
							            echo '
							          	<option value="'.$j->id_jenis.'">'.$j->nama_jenis.'</option>
						            	';
					              	}
			            		?>	        		
	                	</select><br>
                    Harga
                    <input type="text" name="harga" class="form-control"><br>
                    Jam
                    <input type="text" name="stok" class="form-control"><br>

                      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
                    </form>
              </div>
            </div>
          </div>
      </div>

      <!-- MODAL UBAH -->
      <div class="modal fade" id="ubah">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="card-header">
               <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel">Ubah Talent</h4>
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url() ?>index.php/talent/update_talent" method="post">

                <input type="hidden" name="id_talent_edit" id="id_talent_edit"> <!-- fungsi nya untuk where -->

                Nama Talent
                <input type="text" name="nama_talent_edit" id="nama_talent_edit" class="form-control"><br>
                Jenis Kelamin
                <input type="enum" name="jenis_kelamin_edit" id="jenis_kelamin_edit" class="form-control"><br>
                Genre
                <input type="text" name="genre_edit" id="genre_edit" class="form-control"><br>
                Jenis Talent
                <select name="tb_jenis_edit" id="tb_jenis_edit" class="form-control">
                <?php
                    foreach ($tb_jenis as $j) {
                    echo '
                    <option value="'.$j->id_jenis.'">'.$j->nama_jenis.'</option>
                    ';
                    }
                ?>	        		
              </select><br>
              Harga
              <input type="text" name="harga_edit" id="harga_edit" class="form-control"><br>
              Jam
              <input type="text" name="stok_edit" id="stok_edit" class="form-control"><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-block">
              </form>
            </div>
         </div>
       </div>
    </div>

    <script type="text/javascript">
      function prepare_update_talent(id_talent)
      {
        $.getJSON('<?php echo base_url(); ?>index.php/talent/json_talent_by_id/'+id_talent, function(data){

          $("#nama_talent_edit").val(data.nama_talent);
          $("#jenis_kelamin_edit").val(data.jenis_kelamin);
          $("#genre_edit").val(data.genre);
          $("#tb_jenis_edit").val(data.id_jenis);
          $("#harga_edit").val(data.harga);
          $("#stok_edit").val(data.stok);
          $("#id_talent_edit").val(data.id_talent);
        });
      }
    </script>

          </div>
        </div>
      </div>
    </div>
