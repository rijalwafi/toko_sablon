<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
  </head>
  <body>
    <?= form_open_multipart(site_url('akses/login')); ?>
    <div class="row">
      <div class="col s12">
        <div class="col s4" style="margin-left: 450px; margin-top: 100px;">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Silakan Login</span>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">contact_phone</i>
                  <input id="phone_number" name="phone_number" type="number" class="validate" placeholder="No.HP" />
                 <!--  <label for="nohp ">NomerHP</label> -->
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" name="password" type="password" class="validate" placeholder="password" />
                  <!-- <label for="password">Password</label> -->
                </div>
              </div>
            </div>
            <div class="card-action">
              <button type="submit" class="btn green lighten-1">Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>
   <?php form_close() ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?php base_url('assets/js/app.js') ?>" type="module"></script>
  </body>
</html>
