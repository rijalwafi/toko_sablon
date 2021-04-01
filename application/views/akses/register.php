<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body class="yellow lighten-4 ">

    <div class="row  ">
        <div class="col s12 ">
            <div class="col s12 m8">
                <div class=" card teal darken-1" style="margin: 60px 10px 0 10px; ">
                    <div class=" card-content white-text center">

                        <span><img src="<?php echo base_url() ?>assets/image/eclooth.png" alt="logo"
                                style="width:100%;margin:10px 10px;"></span>
                        <div class="row">
                            <h4> Mau Custom Design dan Bahan? Kontak kita aja :</h4>
                            <div class="input-field col s12 m4 center">
                                <a target="_blank" rel="noopener noreferrer"
                                    href="https://api.whatsapp.com/send/?phone=6289632714288&text&app_absent=0"><i
                                        class="fab fa-whatsapp-square prefix" style="color: green;cursor:pointer;"></i>
                                    <input placeholder="089632714288" disabled /></a>
                                <!--  <label for="nohp ">NomerHP</label> -->
                            </div>
                            <div class="input-field col s12 m4 ">
                                <a target="_blank" rel="noopener noreferrer"
                                    href="https://www.instagram.com/eclooth/?igshid=bdycz2kezqxz"><i
                                        class="fab fa-instagram prefix" style="color: red;cursor:pointer;"></i>
                                    <input placeholder="@eclooth" disabled /></a>
                                <!-- <label for="password">Password</label> -->
                            </div>
                            <div class="input-field col s12 m4">
                                <a target="_blank" rel="noopener noreferrer"
                                    href="https://www.facebook.com/ecloothsablonkonveksi"><i
                                        class="fab fa-facebook-f prefix" style="color: blue;cursor:pointer;"></i>
                                    <input placeholder="Eclooth" disabled /></a>



                                <!-- <label for="password">Password</label> -->
                            </div>


                        </div>

                    </div>

                </div>
            </div>
            <div class="col s12 m4">
                <div class=" card   teal ">
                    <div class=" card-content white-text center">

                        <?= form_open_multipart(site_url('akses/indexRegister')); ?>
                        <h3 class="card-title"> Silakan Daftar Disini
                        </h3>
                        <?php echo validation_errors(); ?>
                        <div class="row">


                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="username" name="username" type="text" class="validate"
                                    placeholder="username" />


                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" name="password" type="password" class="validate"
                                    placeholder="password" />

                                <!-- <label for="password">Password</label> -->
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">home</i>
                                <input id="address" name="address" type="text" class="validate" placeholder="alamat" />

                                <!--  <label for="nohp ">NomerHP</label> -->
                            </div>

                            <div class="input-field col s12">

                                <select name="gender" id="gender">
                                    <option value="" selected disabled>Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="phone_number" name="phone_number" type="number" class="validate"
                                    placeholder="Nomer Handphone" />
                                <!--  <label for="nohp ">NomerHP</label> -->
                            </div>
                        </div>
                        <div class="input-field col s12">

                            <input id="level_user" name="level_user" type="text" class="validate" hidden
                                placeholder="level_usr" value="konsumen" />
                            <!--  <label for=gende"nohp ">NomerHP</label> -->
                        </div>
                    </div>

                </div>
                <div class="card-action center" style="margin-top: -3rem;z-index:100;">

                    <button type="submit" class="btn blue lighten-1 waves-light">Daftar <i
                            class="material-icons medium left">arrow_forward</i></button>

                </div>
                <?php form_close() ?>

            </div>
        </div>

    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?php base_url('assets/js/app.js') ?>" type="module"></script>
</body>

</html>