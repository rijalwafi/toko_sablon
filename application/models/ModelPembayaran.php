<?php
    class ModelPembayaran extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function lihat_pembayaran(){
        
        return $this->db->query("SELECT `tb_user`.`username`,`tb_user`.`address`, `tb_product`.`name_product`,`tb_product`.`size`, `tb_sales`.`amount`, `tb_sales`.`sales_date`, `tb_sales`.`status`, `tb_sales`.`id_sales`, `tb_sales`.`id_product` , `tb_sales`.`jumlah_beli`,`tb_pembayaran`.`bukti_bayar` ,`tb_pembayaran`.`nama_ekspedisi` ,`tb_sales`.`design_sablon`,`tb_sales`.`warna`
        FROM `tb_user` JOIN `tb_sales` 
        ON `tb_user`.`id_user` = `tb_sales`.`id_user` JOIN `tb_product` 
        ON `tb_sales`.`id_product` = `tb_product`.`id_product`  JOIN `tb_pembayaran`
        ON `tb_user`.`id_user`=`tb_pembayaran`.`id_user` where `tb_pembayaran`.`id_sales`=`tb_sales`.`id_sales`
        ORDER BY `tb_pembayaran`.`tgl_pembayaran` DESC ");
    }
    
    }
?>