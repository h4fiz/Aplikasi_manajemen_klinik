<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Dashboard</h4>
  </div>
</div>
<div class="row">
  <div class="pull-right">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahpasien">
      Tambah Pasien
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
          <th>Nama Pasien</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
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
              <?php echo $a['nama_pasien'];?>
            </td>
            <td>
              <?php echo $a['tgl_lahir'];?>
            </td>
            <td>
              <?php echo $a['jenis_kelamin'];?>
            </td>
            <td>
              <?php echo $a['alamat_pasien'];?>
            </td>
            <td style="text-align:center;">
              <a class="btn btn-xs btn-warning" href="#modalEditPasien<?php echo $a['id_pasien'];?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
              <a class="btn btn-xs btn-danger" href="#modalHapusPasien<?php echo $a['id_pasien'];?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="tambahpasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pasien</h4>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'pasien/tambah_pasien'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3">Nama Pasien</label>
            <div class="col-xs-9">
              <input name="nama_pasien" class="form-control" type="text" placeholder="Nama Pasien" style="width:280px;" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Tanggal Lahir</label>
            <div class="col-xs-9">
              <input type='text' class="form-control" id='datetimepicker4' name="tgl_lahir" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Jenis Kelamin</label>
            <div class="col-xs-9 radio">
              <label>
                <input type="radio" name="jenis_kelamin" id="L" value="L" checked="">Laki-laki
              </label>
              <label>
                <input type="radio" name="jenis_kelamin" id="P" value="P" >Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">alamat</label>
            <div class="col-xs-9">
              <textarea name="alamat" id="" cols="30" rows="5"></textarea>
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
  <div class="modal fade" id="modalEditPasien<?php echo $a['id_pasien'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Pasien</h4>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'pasien/edit_pasien'?>">
          <div class="modal-body">
            <input name="id_pasien" type="hidden" value="<?php echo $a['id_pasien'];?>">
            <div class="form-group">
              <label class="control-label col-xs-3">Nama Pasien</label>
              <div class="col-xs-9">
                <input name="nama_pasien" class="form-control" type="text" style="width:280px;" value="<?php echo $a['nama_pasien']?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3">Tanggal Lahir</label>
              <div class="col-xs-9">
                <input type='text' class="form-control" id='datetimepicker4' name="tgl_lahir" style="width:280px;" value="<?php echo $a['tgl_lahir']?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3">Jenis Kelamin</label>
              <div class="col-xs-9 radio">
                <label>
                  <input type="radio" name="jenis_kelamin" id="L" value="L" <?php echo ($a['jenis_kelamin']== 'L') ? "checked": "" ;?>>Laki-laki
                </label>
                <label>
                  <input type="radio" name="jenis_kelamin" id="P" value="P" <?php echo ($a['jenis_kelamin']== 'P') ? "checked": "" ;?>>Perempuan
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3">alamat</label>
              <div class="col-xs-9">
                <textarea name="alamat" id="" cols="30" rows="5"><?php echo $a['alamat_pasien']?></textarea>
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
  <div id="modalHapusPasien<?php echo $a['id_pasien'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="myModalLabel">Hapus Pasien</h3>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'pasien/delete_pasien'?>">
          <div class="modal-body">
            <p>Yakin mau menghapus data..?</p>
            <input name="id_pasien" type="hidden" value="<?php echo $a['id_pasien']; ?>">
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