<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')  ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <script type="text/javascript">
   
</script> -->

    <title>Riwaba.co</title>
</head>

<body>
    <!-- navbar header content -->
    <header class="col s12">
        <nav class="navbar-top nav-wrapper blue lighten-1" id="navbarTop">
            <a href="index.html" class="brand-logo">Berkah<span>Selalu</span></a>

            <ul class="right">
                <li class="center"><a href="<?= site_url('home/p') ?>">Home</a></li>
                <!-- <li class="center"><a href=""><?= $this->session->userdata['level_user'] ?></a></li> -->
                <li class="center"><a href="<?= site_url('akses/logout') ?>">Logout</a></li>
            </ul>
            <a href="#" class="menu-icon-container right fixed sidenav-trigger" data-target="mobile-demo"
                onclick="myFunction();">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </a>
        </nav>
        <ul class="sidenav left blue lighten-1" id="mobile-demo">
            <li>
                <a class="sidenav-close" href="#!"><i class="ma material-icons">close</i></a>
            </li>
            <!-- <li class=""><a href="/index.html">Home</a></li> -->
            <li class=""><a href="/index.html">Home</a></li>
            <li class=""><a href="/about.html">About</a></li>
        </ul>
    </header>
    <!-- end of navbar header  -->

    <!-- slider content -->
    <main>
        <div class="row">
            <div class="col s12">
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="https://lorempixel.com/580/250/nature/4" />
                            <!-- random image -->
                            <div class="caption center-align">
                                <h3 class="teal-text">Berkah Selalu</h3>
                                <h5 class="light text-accent-1">
                                    Penyedia air isi ulang, aqua, Gas 3 KG dan 12 KG
                                </h5>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url('assets/image/aqua.jpg') ?>" />
                            <!-- random image -->
                            <div class="caption center-align">
                                <h3 class="teal-text">Air Galon Aqua</h3>
                                <h5 class="grey-text text-darken-3">
                                    Air Sehat pilihan dari mata air bersih di gunung salak
                                </h5>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url('assets/image/gas12kg.jpg') ?>" />
                            <!-- random image -->
                            <div class="caption left-align">
                                <h3 class="teal-text">Gas 12 kg</h3>
                                <h5 class="grey-text text-darken-3">
                                    Persiapkan Gas di rumah untuk kebutuhan dapur setiap hari
                                </h5>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url('assets/image/gas3kg.jpg') ?>" />
                            <!-- random image -->
                            <div class="caption right-align">
                                <h3 class="teal-text">gas 3 KG</h3>
                                <h5 class="grey-text text-darken-3">
                                    Gas Ekonomis untuk rakyat miskin
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
            <?php foreach($product as $tb_product): ?>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url('assets/image/').$tb_product['image'] ?>" alt="galon aqua"
                            class="i responsive-img" style="max-height: 300px;" />
                        <span class="card-title grey-text text-darken-3"><?= $tb_product['name_product'] ?></span>
                    </div>
                    <div class="card-content">
                        <span>
                            <p><?= $tb_product['selling_price'] ?></p>
                            <button class="bt btn-floating medium right red modal-trigger"
                                data-target="mod1<?= $tb_product['id_product'] ?>" style="margin-top: -30px;">
                                <i class="material-icons">add_shopping_cart</i>
                            </button>
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
                <h4><?= $tb_product['name_product'] ?></h4>
                <div class="row blue lighten-4">
                    <!-- image modal -->
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo base_url('assets/image/').$tb_product['image'] ?>" alt="galon aqua"
                                    class="i responsive-img" style="max-height: 300px;" />
                            </div>
                            <div class="card-content">
                                <p>Rp <?= $tb_product['selling_price'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- end of image modal -->

                    <!-- modal description -->
                    <div class="col s12 m8">
                        <h6 class="grey-text darken-4">
                            Descrtiption
                        </h6>
                        <ul class="collapsible">
                            <li>
                                <div class="co collapsible-header">Nama: <?= $tb_product['name_product'] ?></div>
                                <input type="hidden" name="id_product" id="id_product"
                                    value="<?= $tb_product['id_product'] ?>">
                                <input type="hidden" name="id_user" id="id_user"
                                    value="<?= $this->session->userdata['id_user']?>">
                                <input type="hidden" name="amount" id="amount"
                                    value="<?= $tb_product['selling_price'] ?>">

                            </li>
                            <li>



                                <div class="co collapsible-header">
                                    Harga: <?= $tb_product['selling_price'] ?>

                                    <!-- <input type="hidden" name="selling_price" id="selling_price"
                                        value="<?= $tb_product['selling_price'] ?>" placeholder="Jumlah Beli"> -->

                                </div>

                            </li>
                            <!-- <li>
                                <div class="co collapsible-header">
                                    <input type="number" name="total_beli" id="total_beli" placeholder="total harga">
                                    <label for="">Total</label>

                                    <input type="number" name="total_harga" value="" id="total_harga" disabled>
                                </div>
                            </li> -->


                        </ul>

                    </div>
                    <!-- end of modal description -->
                </div>
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
    <!-- footer content -->
    <footer class="page-footer blue lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Berkah Selalu</h5>
                    <p class="grey-text text-lighten-4">
                        Kepuasan pelanggan prioritas kami
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright center">
            <div class="container">
                © 2020 Copyright berkah selalu
            </div>
        </div>
    </footer>
    <!-- end of footer -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="<?= base_url('assets/js/app.js') ?>" type="module"></script>
    <script>
    //animation for hamburger icon
    function myFunction(x) {
        x.classList.toggle('change');
    }
    // $(document).ready(function() {
    //     $('#total_beli, #selling_price').keyup(function() {
    //         var selling_price  = $('#selling_price').val();
    //         var total_beli = $('#total_beli').val();

    //         var total_harga = parseInt(selling_price) * parseInt(total_beli);
    //         $('#total_harga').val(total_harga);
    //     });
    // });
    </script>

</body>

</html>