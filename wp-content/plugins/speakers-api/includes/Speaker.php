<?php
class Speaker{

    /*
     * Start.
     */
    public function start(){
        $speaker = $this->getSpeakerAll();
        $this->speakers_save_post($speaker);
    }

    /*
     * Get All Speakers
     */
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
            $res = json_decode($response);
            return $res->sectionList[0]->items;
        }
    }

    /*
     * Create and update speakers post.
     */
    public function speakers_save_post($speakers){
        foreach($speakers as $item){
            $args = array(
                'post_type' => 'post',
                'meta_query' => array(
                    array(
                        'key' => 'spk_id',
                        'value' => $item->speakerId,
                        'compare' => 'WHERE'
                    ),
                ),
            );
            $result = query_posts($args);
            $post_item = array(
                'post_title' => $item->fullName,
                'post_status' => 'publish',
                'spk_name' => $item->firstName,
                'spk_last_name' => $item->lastName,
                'spk_company' => $item->companyName,
                'spk_bio' => isset($item->bio) ? $item->bio : '',
                'spk_job' => $item->jobTitle,
                'spk_id' => $item->speakerId,
            );
            if (empty($result)) {
                $post_id = wp_insert_post($post_item);
                $this->speakers_update_post($post_id, $post_item);
            }else{
                $update_title = array(
                    'ID' => $result[0]->ID,
                    'post_title' => $item->fullName,
                );
                wp_update_post($update_title);
                $this->speakers_update_post($result[0]->ID, $post_item);
            }
        }
    }

    /*
     * Update custom fields speaker post
     */
    public function speakers_update_post($post_id, $fields){
        foreach ( $fields as $field => $value) {
            update_post_meta($post_id, $field, $value);
        }
    }

}