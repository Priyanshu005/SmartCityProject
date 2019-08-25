<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ManageOrderOtpModel extends CI_Model{
    function __construct() {
        $this->userTbl = 'users';

    }
    /*
     * get rows from the mk_suborder table
     */	 
	 
    function sendotpGET($mobileNumber,$otp) {
        
        $senderId="TECHFI";
        $serverUrl="msg.msgclub.net";
        $authKey="c35b6d3e2bb6769b86536f1ac249a69";
        $routeId="1";
        $message="Your Otp is " .$otp."";
        
        $getData = 'mobileNos='.$mobileNumber.'&message='.urlencode($message).'&senderId='.$senderId.'&routeId='.$routeId;

        //API URL
        $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey."&".$getData;


        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0

        ));


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }
    
}
