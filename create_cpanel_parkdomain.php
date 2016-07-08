<?php

	//including congifuration files
	include_once "third_party/config.php";
	//including third party xmlapi
	include_once "third_party/xmlapi.php";	
    $xmlapi = new xmlapi(SERVER_IP);
    $xmlapi->set_port(SERVER_PORT); // the ssl port for cpanel

	//{{{ Start - creatting a park domain in cpanel on a domain        	
	$top_domain = "abc.com"; // Domain name of existing account in cpanel
	$park_domain = "abcd.com"; // New domain name which need to parke on abc.com
    $xmlapi->password_auth(CPANEL_USER, CPANEL_PASSWORD);
    $xmlapi->set_output('json');        
    $xmlapi->set_debug(0);
    try {
        $result = $xmlapi->park(CPANEL_USER, $park_domain, $top_domain);
    	$result = json_decode($result);
		if (isset($result->cpanelresult->data[0])) {		
			if ($result->cpanelresult->data[0]->result == '1') {
				echo "Domain parked successfully";
			} else {
				echo "Error while parking this domain account.See below details";
				echo "<pre>";
				print_r(cpanelresult->data[0]);
			}
		} else {
				echo "Unable park this domain.";
				echo "<pre>";
				print_r($result);	
		}
    } catch (Exception $e) {
        return false;
    }        
	//}}} End - creatting a park domain in cpanel on a domain 