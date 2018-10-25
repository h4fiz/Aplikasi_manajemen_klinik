<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Dashboard</h4>
  </div>
</div>
<div class="row">
  <div class="pull-right">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahuser">
      Tambah Users
    </button>
  </div>
  <br>
  <br>
  <br>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered" id="mydata">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama User</th>
          <th>Username</th>
          <th>Group User</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no=0;
        foreach ($tampil->result_array() as $a):
          $no++;
          ?>
          <tr>
            <td style="text-align:center;">
              <?php echo $no;?>
            </td>
            <td>
              <?php echo $a['nama_user'];?>
            </td>
            <td>
              <?php echo $a['username'];?>
            </td>
            <td>
              <?php if ($a['group_user']== "1"){
                  echo "Admin";
              }elseif ($a['group_user'] == "2") {
                echo "Dokter";
              }

              ?>

            </td>
            <td style="text-align:center;">
              <a class="btn btn-xs btn-warning" href="#modalEditUsers<?php echo $a['iduser'];?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
              <a class="btn btn-xs btn-danger" href="#modalHapusUsers<?php echo $a['iduser'];?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Users</h4>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'users/tambah_user'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3">Nama Users</label>
            <div class="col-xs-9">
              <input name="nama_user" class="form-control" type="text" placeholder="Nama Users" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Username</label>
            <div class="col-xs-9">
              <input name="username" class="form-control" type="text" placeholder="Username" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Password</label>
            <div class="col-xs-9">
              <input name="password" class="form-control" type="password" placeholder="Password" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Group User</label>
            <div class="col-xs-9 radio">
              <label>
                <input type="radio" name="group_user" id="L" value="1" checked="">Admin
              </label>
              <label>
                <input type="radio" name="group_user" id="P" value="2" >Dokter
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ============ MODAL EDIT =============== -->
<?php foreach ($tampil->result_array() as $a): ?>
  <div class="modal fade" id="modalEditUsers<?php echo $a['iduser'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'users/edit_user'?>">
          <div class="modal-body">
            <input name="iduser" type="hidden" value="<?php echo $a['iduser'];?>">
            <div class="form-group">
            <label class="control-label col-xs-3">Nama Users</label>
            <div class="col-xs-9">
              <input name="nama_user" class="form-control" type="text" value="<?php echo $a['nama_user'];?>" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Username</label>
            <div class="col-xs-9">
              <input name="username" class="form-control" type="text" value="<?php echo $a['username'];?>" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Password</label>
            <div class="col-xs-9">
              <input name="password" class="form-control" type="password" value="" style="width:280px;">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Group User</label>
            <div class="col-xs-9 radio">
              <label>
                <input type="radio" name="group_user" value="1" <?php echo ($a['group_user']== '1') ? "checked": "" ;?>>Admin
              </label>
              <label>
                <input type="radio" name="group_user" value="2" <?php echo ($a['group_user']== '2') ? "checked": "" ;?>>Dokter
              </label>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>
<!-- ============ MODAL HAPUS =============== -->
<?php
foreach ($tampil->result_array() as $a) {
  ?>
  <div id="modalHapusUsers<?php echo $a['iduser'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="myModalLabel">Hapus Pasien</h3>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'users/delete_user'?>">
          <div class="modal-body">
            <p>Yakin mau menghapus data..?</p>
            <input name="iduser" type="hidden" value="<?php echo $a['iduser']; ?>">
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}
?>