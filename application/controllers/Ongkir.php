<?php
class ongkir extends CI_Controller{
    // function __construct()
	// 	{
	// 		parent::__construct();
	// 		$this->load->library('rajaongkir');
	// 	}
    public function ongkirpengiriman(){
        $this->load->view('coba_ongkir_v');
        
        }
    public function kota($provinsi){

            $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: a67130847602f2b23e711b21b9a22c0e"
                ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                        $kota= json_decode($response,true);
                        if($kota['rajaongkir']['status']['code']==200){
                            foreach($kota['rajaongkir']['results'] as $kt){
                                echo "<option value='$kt[city_id]'>$kt[city_name]</option>";
                            }
                        }

            }
    }
    public function prov(){
      
        $data['prov']=$this->rajaongkir->province();
        $this->load->view('coba_ongkir_v',$data);
    }
    public function province(){
		$provinces = $this->rajaongkir->province(); // output json
        print_r($provinces);
        // $this->load->view('coba_ongkir_v',$provinces);
	}
  
  	// http://example.com/rajaongkir/city
  	public function city(){
		$cities = $this->rajaongkir->city(); // output json
		print_r($cities);
	}
  
  	// http://example.com/rajaongkir/subdistrict
  	public function subdistrict(){
		$subdistrict = $this->rajaongkir->subdistrict(151); // output json
		print_r($subdistrict);
	}
  
  	// http://example.com/rajaongkir/cost
  	public function cost(){
		$cost = $this->rajaongkir->cost(501, 114, 1000, "jne"); // output json
		print_r($cost);
	}
        
}