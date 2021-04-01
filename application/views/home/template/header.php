<?php ?>

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
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome/css/all.css">
    <link rel="shortcut icon" href="<?= base_url('assets/image/design_sablon/arrasy.png'); ?>" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <script type="text/javascript">
   
</script> -->

    <title>Eclotch.CO</title>
</head>

<body>
    <!-- navbar header content -->
    <header class="col s12">
        <nav class="navbar-top nav-wrapper grey lighten-1 " id="navbarTop">
            <a href="<?php echo site_url('home/p')?>" class="brand-logo">
                <img src="<?= base_url('assets/image/eclooth.png') ?>" style="height: 50px;margin:0.5rem 0 0 0;" />
            </a>

            <ul class=" right">


                <li class="center"><a href="<?= site_url('home/p') ?>">Home</a></li>

                <?php $id_user='level_user'; $user=$this->session->userdata($id_user); if($user=="" ): ?>
                <li class="center"><a href="<?= site_url('akses/index') ?>">Login</a></li>
                <!-- <li class="center"><a href=""><?= $this->session->userdata['level_user'] ?></a></li> -->
                <?php else : ?>
                <li class="center"><a href="<?= site_url('konsumen/profil_konsumen') ?>">Profil</a></li>

                <li class="center"><a
                        href="<?= base_url('konsumen/status_pesanan/').$user=$this->session->userdata('id_user')?>">Status
                        Pesanan</a></li>


                <li class="center"><a href="<?= site_url('akses/logout') ?>">Logout</a></li>
                <?php endif;?>

            </ul>
            <a href="#" class="menu-icon-container right fixed sidenav-trigger" data-target="mobile-demo"
                onclick="myFunction();">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </a>
        </nav>
        <ul class="sidenav left " id="mobile-demo">
            <li>
                <a class="sidenav-close" href="#!"><i class="ma material-icons">close</i></a>
            </li>
            <!-- <li class=""><a href="/index.html">Home</a></li> -->
            <li class="center"><a href="<?= site_url('home/p') ?>">Home</a></li>

            <?php $id_user='level_user'; $user=$this->session->userdata($id_user); if($user=="" ): ?>
            <li class="center"><a href="<?= site_url('akses/login') ?>">Login</a></li>
            <!-- <li class="center"><a href=""><?= $this->session->userdata['level_user'] ?></a></li> -->
            <?php else : ?>
            <li class="center"><a href="<?= site_url('akses/logout') ?>">Logout</a></li>
            <?php endif;?>
        </ul>
    </header>