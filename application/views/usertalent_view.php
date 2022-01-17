<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data User</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                  <th>ID User</th>
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Aksi</th>
                </thead>

                <?php
                $no=0;
                foreach($arr as $dt_user) {
                  $no++;
                  echo '<tr>
                  <td>'.$dt_user->id_user.'</td>
                  <td>'.$dt_user->nama_user.'</td>
                  <td>'.$dt_user->username.'</td>
                  <td><a href="#" onclick="prepare_update_user('.$dt_user->id_user.')"
                                  data-toggle="modal" data-target="#ubah" class="btn btn-info btn-nd">Ubah</a>

                  <a href="'.base_url().'index.php/user_talent/delete_user/'.$dt_user->id_user.'"
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
                         <h4 class="card-title" id="myModalLabel">Tambah User</h4>
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       </div>
                       </div>
                       <div class="modal-body">
                         <form action="<?php echo base_url() ?>index.php/User_talent/add_user" method="post">
                           Nama User
                           <input type="text" name="nama_user" class="form-control"><br>
                           Username
                           <input type="text" name="username" class="form-control"><br>
                           Password
                           <input type="password" name="password" class="form-control"><br>
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
               <h4 class="modal-title" id="myModalLabel">Ubah user</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url() ?>index.php/user_talent/update_user" method="post">
                  <input type="hidden" name="id_user_edit" id="id_user_edit"> <!-- fungsi nya untuk where -->

                  Nama User
                  <input type="text" name="nama_user_edit" id="nama_user_edit" class="form-control"><br>
                  Username
                  <input type="text" name="username_edit" id="username_edit" class="form-control"><br>
                  Password
                  <input type="password" name="password_edit" id="password_edit" class="form-control"><br>
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </form>
              </div>
        </div>
      </div>
      </div>

      <script type="text/javascript">
        function prepare_update_user(id_user)
        {
          $.getJSON('<?php echo base_url() ?>index.php/User_talent/json_user_by_id/'+id_user, function(data){

            $("#nama_user_edit").val(data.nama_user);
            $("#username_edit").val(data.username);
            $("#id_user_edit").val(data.id_user);
          });
        }
      </script>

          </div>
        </div>
      </div>
    </div>
