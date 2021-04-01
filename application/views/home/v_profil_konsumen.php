<!-- end of navbar header  -->

<!-- main content -->
<main class="row">
    <div class="container ">


        <div class="card">
            <div class="card-content">
                <span>
                    <div class="card-title center">
                        <h4>Profil anda</h4>
                    </div>
                </span>
                <div class="row">
                    <div class="input-field col s6 " hidden>

                        <input placeholder="id_user" id="id_user" name="id_user" type="text"
                            value="<?php echo $user['id_user'] ?>" class="validate" hidden>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="username" id="username" type="text" class="validate"
                            value="<?php echo $user['username'] ?>" readonly>
                        <label for="username" class="text-darken-4">Nama</label>

                    </div>
                    <div class="input-field col s6">
                        <input placeholder="address" id="address" type="text" value="<?php echo $user['address'] ?>"
                            class="validate" readonly>
                        <label for="address">Alamat</label>
                    </div>
                </div>
                <div class="row">


                    <div class="input-field col s12 m6">
                        <input placeholder="name_product" id="name_product" type="password"
                            value="<?php echo $user['password']?>" class="validate" readonly>
                    </div>

                    <div class="input-field col s12 m6">
                        <div class="input-field col s12 m6">
                            <input placeholder="name_product" id="name_product" type="text"
                                value="<?= $user['gender'] ?>" class="validate" readonly>
                        </div>
                        <label for="total_beli">Jenis Kelamin </label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="masukan jumlah barang yang ingin dibeli" name="total_beli" id="total_beli"
                            type="text" class="validate" readonly value="<?php echo $user['phone_number']?>">
                        <label for="total_beli">Nomer Handphone</label>
                    </div>

                </div>

            </div>


            <div class="row">
                <div class="input-field col s12 center-align">

                    <a href="<?= site_url('home/p') ?>" class="btn waves-effect blue lightern-1 center-align"><span><i
                                class="material-icons left">arrow_back</i> Kembali Belanja</span></a>
                    <span><a href="#modalEditKaryawan<?= $user['id_user'];?>"
                            class="btn yellow darken-4 modal-trigger">Edit Profil <span><i
                                    class="left material-icons  ">assignment</i></span></a></span>
                </div>

            </div>
            <!-- modal edit karyawan -->

            <div id="modalEditKaryawan<?= $user['id_user'] ?>" class="modal modal-fixed-footer">
                <form action="<?php echo base_url('konsumen/edit_user') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <h4>Edit Profil</h4>
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <input type="hidden" readonly value="<?= $user['id_user'];?>" name="id_user"
                                        id="id_user" class="form-control">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">person</i>
                                        <input id="username" name="username" type="text"
                                            value="<?php echo $user['username'] ?>" class="validate" />
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">home</i>
                                        <input id="address" name="address" value="<?= $user['address'] ?>" type="text"
                                            class="validate" />
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="password" name="password" value="" type="text" class="validate" />
                                        <label for="address">new password</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <select name="gender" id="gender">
                                            <option value="" disabled selected>Jenis Kelamin</option>
                                            <option value="Pria"
                                                <?php echo ($user['gender'] == 'Pria' ? ' selected' : ''); ?>>Pria
                                            </option>
                                            <option value="Wanita"
                                                <?php echo ($user['gender'] == 'Wanita' ? ' selected' : ''); ?>>Wanita
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">contact_phone</i>
                                        <input id="phone_number" name="phone_number"
                                            value="<?= $user['phone_number'] ?>" type="number" class="validate" />
                                        <label for="phone_number">Nomer Hp</label>
                                    </div>
                                </div>


                                <div class="col s6" hidden>
                                    <select name="level_user" id="level_user">
                                        <option value="" disabled selected></option>
                                        <option value="konsumen"
                                            <?php echo ($user['level_user'] == 'konsumen' ? ' selected' : ''); ?>>
                                            konsumen</option>
                                    </select>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-close waves-effect waves-green btn-flat blue lighten-1"
                            onclick="M.toast({html: 'edit berhasil'})">Confirm</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat red">close</a>
                    </div>
                </form>
            </div>

            <!-- end of modal edit karyawan-->
        </div>
    </div>
    </div>
</main>
<!-- end of main content -->

<!-- footer content -->