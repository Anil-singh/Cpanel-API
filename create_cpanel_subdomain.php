<?php

	//including congifuration files
	include_once "third_party/config.php";
	//including third party xmlapi
	include_once "third_party/xmlapi.php";	
    $xmlapi = new xmlapi(SERVER_IP);
    $xmlapi->set_port(SERVER_PORT); // the ssl port for cpanel

	///{{{ Start - creating subdomain
    $subdomain_name = "abc" // if your subdmoain is acb.domainname.com then subdomian name should be abc
    $xmlapi->password_auth(CPANEL_USER, CPANEL_PASSWORD);
    $xmlapi->set_output('json');        
    $xmlapi->set_debug(0);
    try {
        $xmlapi->set_port(CPANEL_PORT);
        $xmlapi->set_output("json");
        $result = $xmlapi->api1_query(CPANEL_USER, 'SubDomain', 'addsubdomain', array(
            $subdomain_name,
            SERVER_IP,
            0,
            0,
            '/public_html'
        ));
        $result = json_decode($result);
		if (isset($result->cpanelresult->data[0])) {		
			if ($result->cpanelresult->data[0]->result == '1') {
				echo "Subdomain created successfully";
			} else {
				echo "Error while creating this subdomain.See below details";
				echo "<pre>";
				print_r(cpanelresult->data[0]);
			}
		} else {
				echo "Unable to create this subdomain domain.";
				echo "<pre>";
				print_r($result);	
		}
    }
    catch (Exception $e) {
        echo "<pre>";
        print_r($e);
    }
	///}}} End - creating subdomain

?>