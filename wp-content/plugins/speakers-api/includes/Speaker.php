<?php
class Speaker{

    public function getSpeakerAll(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://events.rainfocus.com/api/rfdemo/v2/speakerData?rfApiProfileId=32xv1SceNoKjhsrYsD5lZgLY3kT3zXQVSparks&myData=true&type=combined",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 7bde6066-71e9-ac76-88ff-da49592389f8"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

}