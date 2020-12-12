<div class="row dashboard">
    <div class="col s12 ">
        <div class="card">
            <div class="body">
				<div class="head">
					<h3>laporan transaksi Depot Air</h3>
					<h3>jl. Dukuh Zambrud no. 117</h3>
					<p style="font-weight: normal;text-transform: capitalize;">No Telepon : (025) XXX-XXX-XXX Email : <span style="text-transform: none;">koperasi-kowi@gmail.com</span> no Handphone : 089-XXX-XXX-XXX</p>
					<p style="font-weight: normal;">========================================================================================================</p>
				</div>
				<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Konsumen</th>
							<th>Produk</th>
							<th>Tgl Transaksi</th>
							<th>Harga</th>
							<!-- <th>Total</th> -->
						</tr>
					</thead>
					<tbody>
					<?php 
						$no= 1; 
						foreach ($val as $data) {
					 ?>
						<tr>
							<td><?= $no++; ?>.</td>
							<td><?= $data['username']; ?></td>
							<td><?= $data['name_product']; ?></td>
							<td><?= date("Y-m-d",strtotime($data['sales_date'])); ?></td>
							<td><?= $data['amount']; ?></td>
							
						</tr>
					<?php } ?>
						<tr>
							<td colspan="7" style="text-align: center;font-weight: bold;">Total seluruh transaksi</td>
							<td>Rp. <?= number_format($dt['t_transaksi'],0,".",".") ?></td>
						</tr>
					</tbody>
				</table>

				<i>Periode <?= date("F", strtotime($data['sales_date']))  ?> <?= date("Y", strtotime($tahun)) ?></i>
				<div class="row clearfix">
					<div class="ttd">
						<p>Bekasi, <?= date('d F Y'); ?></p>
						<p>Mengetahui</p>
						<p>Pimpinan</p>
						<br><br><br>
						<p style="font-weight: bold;"><?= $this->session->userdata['username'] ?></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Core Css -->
<style type="text/css">
	.head{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		margin:20px 0;
	}
	h2,h3,p{
		margin: 0;
		padding: 0;
	}
	.ttd{
		float: right;
		margin: 20px;
	}
</style>