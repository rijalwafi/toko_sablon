<!-- main content -->
    <div class="row dashboard">
      <h5><?= $judul ?></h5>
      
      <!-- tabel karyawan -->
      <div
        class="col s11 dashboard-main"
        style="background: white; margin-left: 50px;"
      >
        <table class="striped" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Produk</th>
              <th>Alamat</th>
              <th>Jumlah Beli</th>
              <th>TotalBayar</th>

              <th>Tanggal Beli</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $i=1; ?>
            <?php foreach($sales as $tb_sales): ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $tb_sales['username'] ?></td>
              <td><?= $tb_sales['name_product'] ?></td>
              <td><?= $tb_sales['address'] ?></td>
              <td><?= $tb_sales['jumlah_beli'] ?></td>
              <td><?= $tb_sales['amount'] ?></td>
              <td><?= $tb_sales['sales_date'] ?></td>
              <td><?= $tb_sales['status'] ?></td>
              <td>
                <span>
                  <div class="btn-floating btn-small teal lighten-1  tooltipped" data-tooltip="kirim barang">
                  <a href="#modalKirim<?= $tb_sales['id_sales'] ?>" class="modal-trigger"><i class="material-icons">send</i></a>
                  </div>
                </span>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
          <tfoot class="right"></tfoot>
        </table>

        <!-- modal kirim -->
          <?php $no=0; foreach($sales as $tb_sales): $no++; ?>
            <div id="modalKirim<?= $tb_sales['id_sales'] ?>" class="modal">
              <form action="<?php echo base_url('penjualan/update_status')?>" method="post">
                <div class="modal-content">
                  <p>Silahkan ganti status saat ini.</p>
                  <input type="hidden" readonly value="<?= $tb_sales['id_sales'];?>" name="id_sales" id="id_sales" class="form-control" >
                  <input type="hidden" readonly value="<?= $tb_sales['id_product'];?>" name="id_product" id="id_product" class="form-control" >

                    <select name="status" id="status">
                      <option value="kirim" <?php echo ($tb_sales['status'] == 'kirim' ? ' selected' : ''); ?>>kirim</option>
                      <option value="done" <?php echo ($tb_sales['status'] == 'done' ? ' selected' : ''); ?>>done</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button
                    type="submit"
                    class="modal-close waves-effect waves-green btn-flat green lighten-2"
                    >YA</button>
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
                    >Tidak</a>
                </div>
              </form>
            </div>
          <?php endforeach; ?>

            <!-- end of modal kirim -->
        
        
      </div>
      <!-- end of tabel karyawan -->
    </div>