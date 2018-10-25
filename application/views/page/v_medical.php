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
          <th>Tekanan Darah</th>
          <th>Dianogsa</th>
          <th>Tanggal Periksa</th>
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
              <?php echo $a['sistolik'];?>
            </td>
            <td>
              <?php echo $a['diastolik'];?>
            </td>
            <td>
              <?php echo $a['tgl_periksa'];?>
            </td>
            <td style="text-align:center;">
              <a class="btn btn-xs btn-warning" href="#modalEditMedical<?php echo $a['id_mck'];?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
              <a class="btn btn-xs btn-danger" href="#modalHapusMedical<?php echo $a['id_mck'];?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
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
      <form class="form-horizontal" method="post" action="<?php echo base_url().'medical/tambah_medical'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3">Nama Pasien</label>
            <div class="col-xs-9">
              <select name="id_pasien" class="form-control" required>
                <option value="">Pilih Pasien</option>
                <?php 
                foreach ($pasein->result_array() as $value) :
                  ?>
                  <option value="<?php echo $value['id_pasien'] ?>"><?php echo $value['nama_pasien'] ?></option>
                  <?php endforeach ?>
              </select>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="control-label col-xs-3">Tanggal Periksa</label>
            <div class="col-xs-9">
              <input type='text' class="form-control" id='datetimepicker5' name="tgl_lahir" placeholder="Tanggal Periksa" />
            </div>
          </div> -->
          <div class="form-group">
            <label class="control-label col-xs-3">Tekanan Darah</label>
            <div class="col-xs-9">
              <input type="text" class="form-control" name="sistolik" placeholder="Tekanan Darah">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Dianogsa</label>
            <div class="col-xs-9">
              <input type="text" class="form-control" name="diastolik" placeholder="Dianogsa">
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
  <div class="modal fade" id="modalEditMedical<?php echo $a['id_mck'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Pasien</h4>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'medical/edit_medical'?>">
          <div class="modal-body">
            <input name="id_mck" type="hidden" value="<?php echo $a['id_mck'];?>">
            <div class="form-group">
              <label class="control-label col-xs-3">Nama Pasien</label>
              <div class="col-xs-9">
                <select name="id_pasien" class="form-control" required>
                  <option value="<?php echo $a['id_pasien'] ?>"><?php echo $a['nama_pasien'] ?></option>
                  <?php 
                  foreach ($pasein->result_array() as $value) :
                    ?>
                  <option value="<?php echo $value['id_pasien'] ?>"><?php echo $value['nama_pasien'] ?></option>
                  <?php endforeach ?>
              </select>
              </div>
            </div>
            <div class="form-group">
            <label class="control-label col-xs-3">Tekanan Darah</label>
            <div class="col-xs-9">
              <input type="text" class="form-control" name="sistolik" placeholder="Tekanan Darah" value="<?php echo $a['sistolik']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3">Dianogsa</label>
            <div class="col-xs-9">
              <input type="text" class="form-control" name="diastolik" placeholder="Dianogsa" value="<?php echo $a['diastolik']?>">
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
  <div id="modalHapusMedical<?php echo $a['id_mck'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title" id="myModalLabel">Hapus Pasien</h3>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'medical/delete_medical'?>">
          <div class="modal-body">
            <p>Yakin mau menghapus data..?</p>
            <input name="id_mck" type="hidden" value="<?php echo $a['id_mck']; ?>">
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