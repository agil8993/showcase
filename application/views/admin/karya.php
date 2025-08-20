<div class="container mt-4">
  <h4>Daftar Karya</h4>
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKarya">Tambah Karya</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>User</th>
        <th>File</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($karya as $row): ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$row->judul?></td>
        <td><?=$row->deskripsi?></td>
        <td><?=$row->nama_kategori?></td>
        <td><?=$row->nama_user?></td>
        <td>
          <?php if($row->file_path): ?>
            <a href="<?=base_url($row->file_path)?>" target="_blank">Lihat</a>
          <?php endif; ?>
        </td>
        <td>
          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKarya<?=$row->karya_id?>">Edit</button>
          <a href="<?=base_url('admin/karya/delete/'.$row->karya_id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus karya ini?')">Delete</a>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="editKarya<?=$row->karya_id?>" tabindex="-1">
        <div class="modal-dialog">
          <form method="post" action="<?=base_url('admin/karya/edit/'.$row->karya_id)?>" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header"><h5>Edit Karya</h5></div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" value="<?=$row->judul?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?=$row->deskripsi?></textarea>
              </div>
              <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control">
                  <?php foreach($kategori as $kat): ?>
                    <option value="<?=$kat->kategori_id?>" <?=$kat->kategori_id==$row->kategori_id?'selected':''?>><?=$kat->nama_kategori?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control">
                  <?php foreach($user as $usr): ?>
                    <option value="<?=$usr->id_user?>" <?=$usr->id_user==$row->user_id?'selected':''?>><?=$usr->nama?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label>File</label><br>
                <?php if($row->file_path): ?><a href="<?=base_url($row->file_path)?>" target="_blank">File lama</a><br><?php endif; ?>
                <input type="file" name="file_path" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addKarya" tabindex="-1">
  <div class="modal-dialog">
    <form method="post" action="<?=base_url('admin/karya/add')?>" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header"><h5>Tambah Karya</h5></div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori_id" class="form-control">
            <?php foreach($kategori as $kat): ?>
              <option value="<?=$kat->kategori_id?>"><?=$kat->nama_kategori?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label>User</label>
          <select name="user_id" class="form-control">
            <?php foreach($user as $usr): ?>
              <option value="<?=$usr->user_id?>"><?=$usr->nama?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label>File</label>
          <input type="file" name="file_path" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>
