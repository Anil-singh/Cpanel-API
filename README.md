## Cpanel API - Create Subdomain, Email Account, ParkDomain etc.
Cpanel provides different api by using we can access account information and dynamically create/modify/delete subdmain,cpanel email accounts,parkdomain,addondomain etc.Cpanel API includes code samples in php for creating cpanel email account,subdmain,parkdomain.

## Example
### Create cpanel email account
    $email          = "mail";  // if email address is mail@dmainname.com then email should be mail
    $email_password = "@!#@!123"; // password to access email account in cpanel
    $email_quota    = '250';  // email quota
    //Authenticating cpanel user for api calls
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
    }   catch (Exception $e) {
        echo "<pre>";
        print_r($e)
    }
### Create parkdomain
    $xmlapi = new xmlapi(SERVER_IP);
    $xmlapi->set_port(SERVER_PORT); // the ssl port for cpanel          
    $top_domain = "abc.com"; // Domain name of existing account in cpanel
    $park_domain = "abcd.com"; // New domain name which need to parke on abc.com
    //Authenticating cpanel user for api calls
    $xmlapi->password_auth(CPANEL_USER, CPANEL_PASSWORD);
    $xmlapi->set_output('json');        
    $xmlapi->set_debug(0);
    try {
        $result = $xmlapi->park(CPANEL_USER, $park_domain, $top_domain);    
    }   catch (Exception $e) {
        echo "<pre>";
        print_r($e)
    }
### Create subdomain

    $xmlapi = new xmlapi(SERVER_IP);
    $xmlapi->set_port(SERVER_PORT); // the ssl port for cpanel
    $subdomain_name = "abc" // if your subdmoain is acb.domainname.com then subdomian name should be abc
    //Authenticating cpanel user for api calls
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
    }
    catch (Exception $e) {
        echo "<pre>";
        print_r($e);
    }

## Installation
### Replace config parameter in include/config.php
    Following config parameter need to replace with real one.
    define('SERVER_IP', '199.123.143.23.46'); // your server ip address
    define('SERVER_PORT', '2083'); // your server port number
    define('DOMAIN_NAME', 'domainname.com'); // Your domain name
    define('CPANEL_USER', 'cpaneluser'); // Your cpanel User Name 
    define('CPANEL_PASSWORD', '2#@324324'); // Your cpanel Password 
### Replace email,password and quota in create_cpanel_email.php to create email
    $email          = "mail";  // if email address is mail@dmainname.com then email should be mail
    $email_password = "@!#@!123"; // password to access email account in cpanel
    $email_quota    = '250';  // email quota
### Replace top domain,park domain in create_cpanel_parkdomain.php to create park domain
    $top_domain = "abc.com"; // Domain name of existing account in cpanel
    $park_domain = "abcd.com"; // New domain name which need to parke on abc.com
### Replace subdomain_name in create_cpanel_subdomain.php to create subdomain
    $subdomain_name = "abc" // if your subdmoain is acb.domainname.com then subdomian name should be abc
## API Reference
Used third party xmlapi client library for cpanel api calls