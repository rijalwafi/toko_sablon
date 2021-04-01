<!-- end of navbar header  -->

<!-- main content -->
<main class="row">
    <div class="container ">

        <form action="<?php echo base_url('home/send_transaction') ?>" enctype="multipart/form-data" method="post"
            class="col s12">
            <div class="card">
                <div class="card-content">
                    <span>
                        <div class="card-title center">
                            <h4>Silakan Selesaikan Pembayaran Anda</h4>
                        </div>
                    </span>
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="username" id="username" type="text" class="validate"
                                value="<?php echo $user['username'] ?>" disabled>
                            <label for="username" class="text-darken-4">Nama</label>
                            <input placeholder="id_user" id="id_user" name="id_user" type="text"
                                value="<?php echo $user['id_user'] ?>" class="validate" hidden>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="address" id="address" type="text" value="<?php echo $user['address'] ?>"
                                class="validate" disabled>
                            <label for="address">Alamat Pengiriman</label>
                        </div>
                    </div>
                    <div class="row">


                        <div class="input-field col s12 m6">
                            <input placeholder="name_product" id="name_product" type="text"
                                value="<?php echo $product['name_product'].' '.'Rp '.$product['selling_price'] ?>"
                                class="validate" disabled>
                            <input placeholder="selling_price" id="selling_price" type="hidden"
                                value="<?php echo $product['selling_price'] ?>" class="validate">
                            <input placeholder="id_product" name="id_product" id="id_product" type="hidden"
                                value="<?php echo $product['id_product'] ?>" class="validate">

                            <label for="">Barang yang dibeli</label>
                        </div>

                        <div class="input-field col s12 m6">
                            <input placeholder="masukan jumlah barang yang ingin dibeli" name="total_beli"
                                id="total_beli" type="text" value="<?=$product['jumlah_beli']?>" class="validate">
                            <label for="total_beli">Jumlah </label>
                        </div>
                        <div class="input-field col s12 m6" style="margin-top: -5px;">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="bukti_bayar" id="bukti_bayar">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                    <label for="total_beli">Upload Bukti Pembayaran</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-field col s12 m6" style="margin-top: -5px;">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="design_sablon" id="design_sablon">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                    <label for="total_beli">Upload Design</label>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="input-field col s12 m6  ">
                        <input placeholder="0" id="total_harga" name="total_harga" type="number" class="validate"
                            readonly>
                        <label for="total_harga">Total Pembayaran</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12 center-align">
                        <button type="submit" class="btn waves-effect blue lightern-1 center-align"><span><i
                                    class="material-icons left">arrow_forward</i> Check Out</span></button>
                    </div>
                </div>
            </div>
    </div>
    </form>

    </div>
</main>
<!-- end of main content -->

<!-- footer content -->