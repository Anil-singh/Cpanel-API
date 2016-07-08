<?php

	//including congifuration files
	include_once "third_party/config.php";
	//including third party xmlapi
	include_once "third_party/xmlapi.php";	
    $xmlapi = new xmlapi(SERVER_IP);
    $xmlapi->set_port(SERVER_PORT); // the ssl port for cpanel

	//{{{ Start - creating cpanel email account
    $email          = "mail";  // if email address is mail@dmainname.com then email should be mail
    $email_password = "@!#@!123"; // password to access email account in cpanel
    $email_quota    = '250';  // email quota
    $xmlapi->password_auth(CPANEL_USER, CPANEL_PASSWORD);
    $xmlapi->set_output('json');        
    $xmlapi->set_debug(0);
    try {
	    $result = $xmlapi->api1_query(CPANEL_USER, "Email", "addpop", array(
	        $email_user,
	        $email_password,
	        $email_quota,
	        $email_domain
	    ));
		$result = json_decode($result);
		if (isset($result->cpanelresult->data[0])) {		
			if ($result->cpanelresult->data[0]->result == '1') {
				echo "Email account created successfully";
			} else {
				echo "Error while creating this email account.See below details";
				echo "<pre>";
				print_r(cpanelresult->data[0]);
			}
		} else {
				echo "Unable to create this email account.";
				echo "<pre>";
				print_r($result);	
		}
	}   catch (Exception $e) {
		echo "<pre>";
    	print_r($e)
    }
	//}}} End - creating cpanel email account