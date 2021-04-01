<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
  $provinsi= json_decode($response,true);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p>provinsi</p>
    <select name="id_provinsi" id="id_provinsi">
        <option>Pilih Provinsi</option>
        <?php
        if($provinsi['rajaongkir']['status']['code'] ==200){
            foreach($provinsi['rajaongkir']['results'] as $pv){
                echo "<option value='$pv[province_id]'>$pv[province]</option>";
            }
        }
            ?>

    </select>
    <p>kota</p>
    <select name="kota" id="kota">
        <option value=""></option>
    </select>


    <script>
    document.getElementById('id_provinsi').addEventListener('change', function() {
        fetch('<?='ongkir/kota/'?>' +
            this.value, {
                method: 'GET',
            }).then((response) => response.text()).then((data) => {
            console.log(data);
            document.getElementById('kota').innerHTML = data
        })



    })
    </script>


</body>

</html>