<?php
        //sample php code

        $mobile_number = $_POST['mobile_number']; 
        $account_number = $_POST['account_number'];
        $ifsc = $_POST['ifsc'];
        $client_id = "09919190"; //(your system unique id. that you can check in pay2all);
        //end of data collection from form

        $parameters = array(
                'mobile_number' => $mobile_number,
                'provider_id' => 127 // Provider id check in pay2all
                'account_number' => $account_number, // Recharge or payment Amount
                'ifsc' => $ifsc // your system unique id
        );

        $access_token = ""; //you have to add personal access token  (check after login) www.pay2all.in

        $header = ["Accept:application/json", "Authorization:Bearer ".$access_token];

        $method = 'POST';

        $url = 'https://pay2all.in/api/dmr/v2/get_name';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        echo $response;  //[JSON RESPONSE]


     


?>