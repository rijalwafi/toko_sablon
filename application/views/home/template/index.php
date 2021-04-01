 <!-- slider content -->
 <main>
     <div class="row">
         <div class="col s12">
             <div class="slider">
                 <ul class="slides">
                     <li>
                         <img src="<?= base_url('assets/image/c1.jpg') ?>" style="display: block;
                                   margin-left: auto;
                                   margin-right: auto;
                                   height:auto;
                                   width: 50%;" />
                         <!-- random image -->
                         <div class="caption center-align">
                             <h3 class="blue-text blue-darken-1">Hoodie Keren</h3>
                             <h5 class="purple-text text-deep-purple accent-1">
                                 Upgrade your Style with New design hoodie from our store
                             </h5>
                         </div>
                     </li>
                     <li>
                         <img src="<?= base_url('assets/image/c2.jpg') ?>" style="display: block;
                                   margin-left: auto;
                                   margin-right: auto;
                                   height:auto;
                                   width: 50%;" />
                         <!-- random image -->
                         <div class="caption center-align">
                             <h3 class="blue-text blue-darken-1">Hoodie Keren</h3>
                             <h5 class="purple-text text-deep-purple accent-1">
                                 Upgrade your Style with New design hoodie from our store
                             </h5>
                         </div>
                     </li>
                     <li>
                         <img src="<?= base_url('assets/image/Hoodie.png') ?>" style="display: block;
                                   margin-left: auto;
                                   margin-right: auto;
                                   height:auto;
                                   width: 50%;" />
                         <!-- random image -->
                         <div class="caption left-align">
                             <h3 class="blue-text blue-darken-1">Hoodie Keren</h3>
                             <h5 class="purple-text text-deep-purple accent-1">
                                 Upgrade your Style with New design hoodie from our store
                             </h5>
                         </div>
                     </li>
                     <li>
                         <img src="<?= base_url('assets/image/Kaos Panjang.png') ?>" style="display: block;
                                   margin-left: auto;
                                   margin-right: auto;
                                   height:auto;
                                   width: 50%;" />
                         <!-- random image -->
                         <div class="caption right-align">
                             <h3 class="blue-text blue-darken-1">Hoodie Keren</h3>
                             <h5 class="purple-text text-deep-purple accent-1">
                                 Upgrade your Style with New design hoodie from our store
                             </h5>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!-- end of slider content -->

     <!-- main content -->

     <div class="row grey lighten-3">
         <h1 class="center teal-text text-lighten-1 ">Upgrade <span class="black-text">Your Style</span></h1>
         <?php foreach($product as $tb_product): ?>

         <div class="col s12 m4">
             <div class="card">
                 <div class="card-image">
                     <img src="<?php echo base_url('assets/image/').$tb_product['image'] ?>" alt="galon aqua"
                         class="i responsive-img" style="max-height: 300px;" />

                 </div>
                 <div class="card-content">
                     <span>
                         <p>Rp. <?= $tb_product['selling_price'] ?></p>
                         <span class="card-title teal-text text-lighten-2"><?= $tb_product['name_product'] ?></span>
                         <?php $id_user='id_user';$user=$this->session->userdata($id_user);
                         if($user==""): ?>
                         <a class="btn right blue lighten-1 waves-effect" href="<?= site_url('akses/index');?>"
                             style="margin-top: -30px;">Silakan Login</a>
                         <?php else: ?>
                         <button class=" btn right blue lighten-1 modal-trigger waves-effect"
                             data-target="mod1<?= $tb_product['id_product'] ?>" style="margin-top: -30px;">
                             Beli
                         </button>
                         <?php endif;?>
                     </span>
                 </div>
             </div>
         </div>

         <?php endforeach; ?>

     </div>
 </main>
 <!-- modal content -->
 <?php foreach($product as $tb_product): ?>
 <form action="<?php echo base_url('home/send_transaction') ?>" method="post">
     <div id="mod1<?= $tb_product['id_product'] ?>" class="modal modal-fixed-footer">
         <div class="modal-content">

             <div class="row grey lighten-1">
                 <!-- image modal -->
                 <div class="col s12 m4">
                     <div class="card">
                         <div class="card-image">
                             <img src="<?php echo base_url('assets/image/').$tb_product['image'] ?>" alt="galon aqua"
                                 class="i responsive-img buktibayar" style="max-height: 300px; cursor:pointer;" />
                         </div>
                         <div class="card-content">
                              <p>Rp. <?= $tb_product['selling_price'] ?></p>
                         </div>
                     </div>
                 </div>
                 <!-- end of image modal -->

                 <!-- modal description -->
                 <div class="col s12 m8">
                     <h4 class="black-text darken-1" style="margin-top: 2rem;">
                         <?= $tb_product['name_product'] ?>
                     </h4>

                   
                   
                       <h1 class="white-text text-lighten-2">Rp. <?= $tb_product['selling_price'] ?></h1>

                    
                   
                     <input type="hidden" name="id_product" id="id_product" value="<?= $tb_product['id_product'] ?>">

                     <input type="hidden" name="id_user" id="id_user" value="<?php if($this->session->userdata('id_user')){
                                        echo $this->session->userdata('id_user');
                                    }else{echo "";}?>">
                     <input type="hidden" name="amount" id="amount" value="<?= $tb_product['selling_price'] ?>">



                 </div>
                 <!-- end of modal description -->

             </div>
              <h5>Deskripsi</h5>
                     <pre class="black-text darken-1">
                     <?= $tb_product['keterangan'] ?>
                     </pre>
         </div>
         <div class="modal-footer">
             <a class="modal-close waves-effect waves-green btn-flat blue lighten-1"
                 href="<?= base_url('home/sukses/').$tb_product['id_product'];?>">Beli</a>
             <a class="modal-close waves-effect waves-green btn-flat red">Close</a>
         </div>
     </div>
 </form>
 <?php endforeach; ?>
 <!-- end of main content -->