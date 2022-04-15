<?php
namespace Programs\Program\Controller\SampleController;

class Callapi extends \Magento\Framework\App\Action\Action
{

    public function __construct(
		\Magento\Framework\App\Action\Context $context
        )
	{
		return parent::__construct($context);
	}

	public function execute()
	{
    // $url ="http://rickandmortyapi.com/api/character";
    // $geocodeFromAddr = file_get_contents($url);
    // $output = json_decode($geocodeFromAddr);
    // echo("<pre>");
    // print_r($output);
    // die();

    $url ="http://rickandmortyapi.com/api/character";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);
    curl_close($curl);
    $outputs = json_decode($data, true);
    // echo("<pre>");
    // print_r($outputs);
    // echo("</pre>");

      foreach($outputs as $key=>$value){
        echo("<pre>");
        if(array_key_exists(0, $value)){
            echo($value[0]['name']."<br><br>");
            print_r($value[0]);

       if(is_array($value[0])){
        //   $value[0]['origin'] 
          foreach($value[0]['origin']  as $k=>$v){
            // print_r($value[0]['name']);
            echo($v);

        }
       }
            

        }
        // echo ($output['count']);
        
        
    }
    
    die;
    // $curl_handle=curl_init();    
    // curl_setopt($curl_handle, CURLOPT_URL,'http://###.##.##.##/mp/get?mpsrc=http://mybucket.s3.amazonaws.com/11111.mpg&mpaction=convert format=flv');
    // curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    // curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
    // $query = curl_exec($curl_handle);
    // curl_close($curl_handle);
    }
}
