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
        <form action="<?= base_url('produk/add_produk') ?>" enctype="multipart/form-data" method="post">
              <!-- <?php echo form_open_multipart('produk/add_produk'); ?> -->
          
        <div class="modal-content">
          <h4>Create Product</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="name_product" name="name_product" type="text" class="validate" />
                  <label for="name_product">Name Product</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">home</i>
                  <input id="purchase_price" name="purchase_price" type="number" class="validate" />
                  <label for="purchase_price">Purchase Price</label>
                </div>
              </div>

              
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="stock_product" name="stock_product" type="number" class="validate" />
                  <label for="stock_product">Stock</label>
                </div>
                 <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="selling_price" name="selling_price" type="number" class="validate" />
                  <label for="selling_price">Selling Price</label>
                </div>
                
              </div>
              <div class="row">
                
                 <div class="input-field col s6">
                  <input type="file" name="image" id="image" >
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="submit"
            class="modal-close waves-effect waves-green btn-flat blue lighten-1"
            onclick="M.toast({html: 'Tambah produk berhasil'})"
            >Comfirm</button>
          <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
            >close</a
          >
        </div>
      </form>
      </div>
      <!-- end of modal tambah karyawan-->
      <!-- modal edit karyawan -->
      <?php $no=0; foreach($produk as $tb_produk): $no++; ?>
      <div id="modalEditKaryawan<?= $tb_produk['id_product'] ?>" class="modal modal-fixed-footer">
      <form action="<?php echo base_url('produk/edit_produk') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-content">
          <h4>Edit Data Karyawan</h4>
          <div class="row">
            <div class="col s12">
              <div class="row">
              <input type="hidden" readonly value="<?= $tb_produk['id_product'];?>" name="id_product" id="id_product" class="form-control" >
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="name_product" name="name_product" type="text" value="<?= $tb_produk['name_product'];?>" class="validate" />
                  <label for="name_product">Name Produk</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">home</i>
                  <input id="purchase_price" name="purchase_price" value="<?= $tb_produk['purchase_price'] ?>" type="text" class="validate" />
                  <label for="purchase_price">Purchase Price</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="stock_product" name="stock_product" value="<?= $tb_produk['stock_product'] ?>" type="number" class="validate" />
                  <label for="stock_product">Stock</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="selling_price" name="selling_price" value="<?= $tb_produk['selling_price'] ?>" type="number" class="validate" />
                  <label for="selling_price">Selling Price</label>
                </div>
                
                
              </div>
              <div class="row">
                
                 <div class="input-field col s6">
                  <input type="file" name="image" id="image" >
                  <input type="hidden" name="current_image" id="current_image" value="<?= $tb_produk['image'] ?>">
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
        <table class="striped" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Product</th>
              <th>Purchase</th>
              <th>Selling</th>
              <th>Stok</th>
              <th>Image</th>
              <th>action</th>
            </tr>
          </thead>

          <tbody>
            <?php $i=1; ?>
            <?php foreach($produk as $tb_produk): ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $tb_produk['name_product'] ?></td>
              <td><?= $tb_produk['purchase_price'] ?></td>
              <td><?= $tb_produk['selling_price'] ?></td>
              <td><?= $tb_produk['stock_product'] ?></td>
              <td><img src="<?= base_url('assets/image/').$tb_produk['image'] ?>" style="width: 60px;" alt=""></td>
              <td>
                <span
                  ><div
                    class="btn-floating btn-small red darken-5 tooltipped"
                    data-tooltip="Edit data produk"
                  >
                    <a
                      href="#modalEditKaryawan<?= $tb_produk['id_product'] ?>"
                      class="modal-trigger waves-circle"
                    >
                      <i class="material-icons">edit</i></a
                    >
                  </div></span
                >
                <span
                  ><div
                    class="btn-floating btn-small teal lighten-1 tooltipped"
                    data-tooltip="Hapus data produk"
                  >
                    <a href="#modalHapus<?= $tb_produk['id_product'] ?>" class="modal-trigger">
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
      <?php $no=0; foreach($produk as $tb_produk): $no++; ?>
        <div id="modalHapus<?= $tb_produk['id_product'] ?>" class="modal">
          <form action="<?php echo base_url('produk/delete_produk') ?>" method="post">
          <div class="modal-content">
            <p>Anda yakin ingin menghapus data ini?</p>
            <input type="hidden" readonly value="<?= $tb_produk['id_product'];?>" name="id_product" id="id_product" class="form-control" >
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