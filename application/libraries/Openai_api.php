<?php 

class Openai_api 
{
    public function open_ai_completion($api_key,$prompt){


      $data['model']= "text-davinci-003";
      $data['prompt']= $prompt;
      $data['max_tokens']= 1500;
      $data['temperature']= 0.4;
      $data['top_p']= 1;
      $data['frequency_penalty']= 0;
      $data['presence_penalty']= 0;

       $data=json_encode($data);


        $headers=array("Content-Type: application/json","Authorization: Bearer {$api_key}");

        $url="https://api.openai.com/v1/completions";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        return $result;



    }


}