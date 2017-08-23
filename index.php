<?php
    // this line loads the library 
    require_once('Twilio.php'); 
    
    $account_sid = 'AC6ffa8c3b35decdcab1987621b7dd5d67';  
    $auth_token = 'edb22a903581f1a4eb4ceb83ddf51c3d'; 
    $from_num = "+19473339675";
    $to_num="+919544818558";
  
    
    $result=file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD,INR');
    
    $response=json_decode($result,true); 
    $message="1 Ether = $".$response['USD'].' / Rs.'.$response['INR'] ;  
    
    
    
    $client = new Services_Twilio($account_sid, $auth_token); 
    try { 
    $message = $client->account->messages->create(array( 
        'To' => $to_num, 
        'From' => $from_num,         
        'Body' => $message,   
    ));    
    }    
    catch (Services_Twilio_RestException $e) {
   
}

//    if($message)
//    {
//        return "success msg sent";
//    }
//    else
//    {
//        return "error msg sending";
//    }
?>