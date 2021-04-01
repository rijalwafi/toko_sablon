<?php
class pembayaran extends CI_Controller{
    
       
            public function __construct()
            {
                parent::__construct();
                $this->load->model('modelpembayaran');
                $this->load->model('modelpenjualan');
            }
       
            public function p(){

                $data['sales']=$this->modelpembayaran->lihat_pembayaran()->result_array();
                $data['jual']=$this->modelpenjualan->sales()->row_array();
                $p = $this->uri->segment(3);
                $data['title'] = "Eclooth";
                $data['judul'] = "Kelola Pembayaran";
                $data['folder'] = "pembayaran";
                if (empty($p)) {
                    $p = "index";
                }
                $data['p'] = $p;
                $this->load->view('beranda',$data);
                }
                public function cetak($id_sales){
                    // $data['sales']=$this->lihat_pembayaran()->result_array();
                    $data['title']="Cetak Invoice";
                    $data['payment']=$this->db->get_where('tb_pembayaran',['id_pembayaran'=>'id_pembayaran'])->row_array();
                    $data['sales'] = $this->modelpenjualan->sales($id_sales)->row_array();
                    $data['product'] = $this->db->get_where('tb_product')->row_array();
                    $data['user'] = $this->db->get_where('tb_user',['id_user'=>'id_user'])->row_array();
                    // $data['title']="print invoice";
                    // $data['judul']="print invoice";
                    $this->load->library('pdf');
                    $this->pdf->setPaper('A4', 'potrait');
                    // $this->pdf->set_option('isRemoteEnabled',true);
                    $this->pdf->filename = "laporan-petanikode.pdf";
                    $this->pdf->load_view('pembayaran/cetak_invoice',$data);

                }
}
?>