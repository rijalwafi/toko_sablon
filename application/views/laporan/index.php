<!-- main content -->
    <div class="row dashboard">
      <h5><?= $judul ?></h5>
      
      <!-- tabel karyawan -->
      <div
        class="col s11 dashboard-main"
        style="background: white; margin-left: 50px;"
      >
       

              <div class="col s6">
                <label for="dari">Bulan</label>
				<select id="bulan" class="form-control show-tick" onchange="tgl()">
					<option value="">--Pilih Bulan--</option>
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Maret</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Agustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
              <a href="javascript:cetak('tabel-laporan');" class="btn btn-primary waves-effect">
	            <i class="material-icons">print</i>
	            <span>Print</span>
	          </a>
              </div>
              <div class="col s6">
                <label for="sampai">Tahun</label>
				<select id="tahun" class="form-control" onchange="tgl()">
					<?php
						$mulai= date('Y') - 19;
						for($i = $mulai;$i<$mulai + 20;$i++){
						    $sel = $i == date('Y') ? ' selected="selected"' : '';
						    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
						}
					?>
				</select>
              </div>
        
        
      </div>
      <!-- end of tabel karyawan -->
    </div>

<div id="tabel-laporan">
	
</div>
<script type="text/javascript">
	function tgl() {
		$.ajax({
			url : "<?= site_url('laporan/laporan') ?>",
			type : "POST",
			data : {
				bulan : $("#bulan").val(),
				tahun : $("#tahun").val()
			},
			success:function(data) {
				$("#tabel-laporan").html(data);
				// alert("berhasil");
			}
		})
	}
</script>