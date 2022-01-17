<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Jenis</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                  <th>ID Jenis</th>
                  <th>Nama Jenis</th>
                  <th>Aksi</th>
                </thead>

                <?php
                $no=0;
                foreach($arr as $dt_jenis) {
                  $no++;
                  echo '<tr>
                  <td>'.$dt_jenis->id_jenis.'</td>
                  <td>'.$dt_jenis->nama_jenis.'</td>
                  <td><a href="#" onclick="prepare_update_jenis('.$dt_jenis->id_jenis.')"
                                  data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>

                  <a href="'.base_url().'index.php/jenis_talent/delete_jenis/'.$dt_jenis->id_jenis.'"
                                  class="btn btn-danger btn-md" onclick="return confirm(\'Anda Yakin\')">Hapus</a>
                  </tr>';
                }
                 ?>

                 <!-- MODAL TAMBAH -->
                 <div class="modal fade" id="tambah">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="card-header">
                         <div class="modal-header">
                         <h4 class="card-title" id="myModalLabel">Tambah jenis</h4>
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       </div>
                       </div>
                       <div class="modal-body">
                         <form action="<?php echo base_url() ?>index.php/jenis_talent/add_jenis" method="post">
                           Nama jenis
                           <input type="text" name="nama_jenis" class="form-control"><br>
                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                         </form>
                       </div>
                   </table>
                   <?php
                     $pesan = $this->session->flashdata('pesan');
                     if(!empty($pesan)) {
                         echo '<div class="alert alert-primary">'.$pesan.'</div>';
                     }
                    ?>
                    <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
                 </div>
               </div>
           </div>

        <!-- MODAL UBAH -->
        <div class="modal fade" id="ubah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="card-header">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Ubah jenis</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url() ?>index.php/jenis_talent/update_jenis" method="post">
                  <input type="hidden" name="id_jenis_edit" id="id_jenis_edit"> <!-- fungsi nya untuk where -->

                  Nama jenis
                  <input type="text" name="nama_jenis_edit" id="nama_jenis_edit" class="form-control"><br>
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>
              </div>
        </div>
      </div>
      </div>

      <script type="text/javascript">
        function prepare_update_jenis(id_jenis)
        {
          $.getJSON('<?php echo base_url() ?>index.php/jenis_talent/json_jenis_by_id/'+id_jenis, function(data){

            $("#nama_jenis_edit").val(data.nama_jenis);
            $("#id_jenis_edit").val(data.id_jenis);
          });
        }
      </script>

          </div>
        </div>
      </div>
    </div>
