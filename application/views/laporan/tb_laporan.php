<div class="row dashboard">
    <div class="col s12 ">
        <div class="card">
            <div class="body">
                <div class="head">
                    <h5>laporan Penjualan Eclooth</h5>
                    <h5>jl. RA KARTINI</h5>
                    <p style="font-weight: normal;text-transform: capitalize;"> no Handphone :0896-3271-4288
                    </p>
                    <p style="font-weight: normal;">
                        ========================================================================================================
                    </p>
                </div>
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Konsumen</th>
                            <th>Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Tgl Transaksi</th>
                            <th>Total Harga</th>
                            <!-- <th>Total</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$no= 1;
                        $kosong=""; 
						foreach ($val as $data): 
					 ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $data['username']; ?></td>
                            <td><?= $data['name_product']; ?></td>
                            <td><?=$data['jumlah_beli'];?></td>
                            <td><?= date("Y-m-d",strtotime($data['sales_date'])); ?></td>
                            <td><?= $data['amount']; ?></td>

                        </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="7" style="text-align: center;font-weight: bold;">Total seluruh transaksi</td>
                            <td>Rp. <?= number_format($dt['t_transaksi'],0,".",".") ?></td>
                        </tr>
                    </tbody>
                </table>


                <?php if($date['sales_date']==$kosong) :?>
                <center>
                    <h3>Tidak ada data Transaksi</h3>
                </center>
                <?php else:?>
                <i>Periode <?= date("Y",strtotime($date['sales_date'])); ?></i>
                <?php endif?>

                <div class="row clearfix">
                    <div class="ttd">
                        <p>Bekasi, <?= date('d F Y'); ?></p>
                        <p>Mengetahui</p>
                        <p>Pimpinan</p>
                        <br><br><br>
                        <p style="font-weight: bold;">Ahmad Zulkarnain F</p>
                        <p>Owner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Core Css -->
<style type="text/css">
.head {
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    margin: 20px 0;
}

h2,
h3,
p {
    margin: 0;
    padding: 0;
}

.ttd {
    float: right;
    margin: 20px;
}
</style>