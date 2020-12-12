<!-- main content -->
    <div class="row dashboard">
      <h5><?= $judul ?></h5>
      <span>
        <!-- tombol tambah karyawan -->
        <a
          class="btn btn-penjualan btn-small modal-trigger"
          href="#modalKaryawan"
          >Add <i class="large material-icons left">add</i></a
        ></span
      >
      <!-- end of tombol tambah karyawan -->
      <!-- modal tambah karyawan -->
      <div id="modalKaryawan" class="modal modal-fixed-footer">
        <form action="<?= base_url('user/add_user') ?>" method="post">
        <div class="modal-content">
          <h4>Create Employe</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="username" name="username" type="text" class="validate" />
                  <label for="username">Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">home</i>
                  <input id="address" name="address" type="text" class="validate" />
                  <label for="address">Address</label>
                </div>
              </div>

              <div class="col s6">
                <select name="level_user" id="level_user">
                  <option value="" >Level User</option>
                  <option value="owner">owner</option>
                  <option value="karyawan">karyawan</option>
                  <option value="konsumen">konsumen</option>
                </select>
              </div>
              <div class="col s6">
                <select name="gender" id="gender">
                  <option value="" >Jenis Kelamin</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="phone_number" name="phone_number" type="number" class="validate" />
                  <label for="phone_number">Nomer Hp</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" name="password" type="password" class="validate" />
                  <label for="password">password</label>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="submit"
            class="modal-close waves-effect waves-green btn-flat blue lighten-1"
            onclick="M.toast({html: 'pendaftaran berhasil'})"
            >Comfirm</button>
          <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
            >close</a
          >
        </div>
      </form>
      </div>
      <!-- end of modal tambah karyawan-->
      <!-- modal edit karyawan -->
      <?php $no=0; foreach($user as $tb_user): $no++; ?>
      <div id="modalEditKaryawan<?= $tb_user['id_user'] ?>" class="modal modal-fixed-footer">
      <form action="<?php echo base_url('user/edit_user') ?>" method="post">
        <div class="modal-content">
          <h4>Edit Data Karyawan</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
              <input type="hidden" readonly value="<?= $tb_user['id_user'];?>" name="id_user" id="id_user" class="form-control" >
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="username" name="username" type="text" value="<?= $tb_user['username'];?>" class="validate" />
                  <label for="username">Username</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">home</i>
                  <input id="address" name="address" value="<?= $tb_user['address'] ?>" type="text" class="validate" />
                  <label for="address">Address</label>
                </div>
              </div>

              
              <div class="col s6">
                <select name="gender" id="gender">
                  <option value="" disabled selected>Jenis Kelamin</option>
                  <option value="Pria" <?php echo ($tb_user['gender'] == 'Pria' ? ' selected' : ''); ?>>Pria</option>
                  <option value="Wanita" <?php echo ($tb_user['gender'] == 'Wanita' ? ' selected' : ''); ?>>Wanita</option>
                </select>
              </div>
              <div class="col s6">
                <select name="level_user" id="level_user">
                  <option value="" disabled selected>Jenis Kelamin</option>
                  <option value="owner" <?php echo ($tb_user['level_user'] == 'owner' ? ' selected' : ''); ?>>owner</option>
                  <option value="karyawan" <?php echo ($tb_user['level_user'] == 'karyawan' ? ' selected' : ''); ?>>karyawan</option>
                  <option value="konsumen" <?php echo ($tb_user['level_user'] == 'konsumen' ? ' selected' : ''); ?>>konsumen</option>
                </select>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="phone_number" name="phone_number" value="<?= $tb_user['phone_number'] ?>" type="number" class="validate" />
                  <label for="phone_number">Nomer Hp</label>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="submit"
            class="modal-close waves-effect waves-green btn-flat blue lighten-1"
            onclick="M.toast({html: 'edit berhasil'})"
            >Comfirm</button>
          <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
            >close</a
          >
        </div>
      </form>
      </div>
      <?php endforeach; ?>
      <!-- end of modal edit karyawan-->

      <!-- tabel karyawan -->
      <div
        class="col s11 dashboard-main"
        style="background: white; margin-left: 50px;"
      >
        <table class="striped " id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Usename</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Level</th>
              <th>action</th>
            </tr>
          </thead>

          <tbody>
            <?php $i=1; ?>
            <?php foreach($user as $tb_user): ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $tb_user['username'] ?></td>
              <td><?= $tb_user['gender'] ?></td>
              <td><?= $tb_user['phone_number'] ?></td>
              <td><?= $tb_user['address'] ?></td>
              <td><?= $tb_user['level_user'] ?></td>
              <td>
                <span
                  ><div
                    class="btn-floating btn-small red darken-5 tooltipped"
                    data-tooltip="Edit data karyawan"
                  >
                    <a
                      href="#modalEditKaryawan<?= $tb_user['id_user'] ?>"
                      class="modal-trigger waves-circle"
                    >
                      <i class="material-icons">edit</i></a
                    >
                  </div></span
                >
                <span
                  ><div
                    class="btn-floating btn-small teal lighten-1 tooltipped"
                    data-tooltip="Hapus data karyawan"
                  >
                    <a href="#modalHapus<?= $tb_user['id_user'] ?>" class="modal-trigger">
                      <i class="material-icons">delete</i></a
                    >
                  </div></span
                >
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot class="right"></tfoot>
        </table>
        
        <!-- modal hapus data karyawan -->
      <?php $no=0; foreach($user as $tb_user): $no++; ?>
        <div id="modalHapus<?= $tb_user['id_user'] ?>" class="modal">
          <form action="<?php echo base_url('user/delete_user') ?>" method="post">
          <div class="modal-content">
            <p>Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" readonly value="<?= $tb_user['id_user'];?>" name="id_user" id="id_user" class="form-control" >
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="modal-close waves-effect waves-green btn-flat green lighten-1"
              onclick="M.toast({html: 'Data berhasil di hapus'})"
              >YES</button>
            <a
              href="#!"
              class="modal-close waves-effect waves-green btn-flat red"
              >NO</a
            >
          </div>
        </form>
        </div>
      <?php endforeach; ?>
        <!-- end of modal hapus karyawan -->
      </div>
      <!-- end of tabel karyawan -->
    </div>