<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata("errorlog","You have to Log in First!");
			redirect(base_url("login"));
		}
		
	}
	public function index()
	{
		
		$this->load->view('home');
	}
	public function Adduser()
	{
		$this->load->view('adduser');
	}
	public function datauser()
	{
		
		$this->load->view('datatable');
	}
	public function saveuser()
	{
		$post = $this->input->post();
		$givenName = $post['givenname'];
		$SN = $post['sn'];
		$CN = $post['cn'];
		$email = $post['mail'];
		$description = $post['description'];
		$office = $post['physicalDeliveryOfficeName'];
		$sAMAccountName = $post['sAMAccountName'];
		$newPassw = $post['cpassword'];
		
		//$AD_server = "ldap://login.intranet.tvip"; // Local Stunnel --> http://www.stunnel.org/
		$AD_server = "ldap://192.168.4.150"; // Local Stunnel --> http://www.stunnel.org/
		$AD_Auth_User = "administrator@intranet.tvip"; //Administrative user
		$AD_Auth_PWD = "Databa53"; 
		$ldap_con = ldap_connect($AD_server);
		
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		
		if($ldapbind = ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) == true)
		{
			$ldaprecord['cn'] = $CN;
			$ldaprecord['givenName'] = $givenName;
			$ldaprecord['sn'] = $SN;	
			$ldaprecord['DisplayName'] = $CN;
			$ldaprecord['Description'] = $description;
			$ldaprecord['physicalDeliveryOfficeName'] = $office;			
			// $ldaprecord['mail'] = $email;
			$ldaprecord['objectclass'][0] = "top";
			$ldaprecord['objectclass'][1] = "person";
			$ldaprecord['objectclass'][1] = "organizationalPerson";
			$ldaprecord['objectclass'][2] = "user";
			$ldaprecord['userPassword'] = $newPassw;
			//$ldaprecord['pwdLastSet'] = $newPassw;
			$ldaprecord["sAMAccountName"] = $sAMAccountName;	
			$ldaprecord['userprincipalname'] = $sAMAccountName."@intranet.tvip";
			$ldaprecord["UserAccountControl"] = "544"; // 546 is disabled 		//This is to prevent the user from beeing disabled. -->
				//print '{MD5}' . base64_encode(pack('H*',"544"));
				
			$ldaprdn = $sAMAccountName."@intranet.tvip";

			$bind = @ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) or die ("Error trying to bind: ".ldap_error($ldap_con));//BIND 
			$dn = "CN=". $ldaprecord['cn'] .",CN=users,DC=intranet,DC=tvip";
			//ldap_add($ldap_con, $dn, $ldaprecord) or die ("Error trying to bind: ".ldap_error($ldap_con));
			

			if(ldap_add($ldap_con, $dn, $ldaprecord) == true)
			{

			// The user is added and should be ready to be logged
			// in to the domain.
				echo "User added!<br>";
				$this->session->set_flashdata("successsave" , "User Data Saved!!");
				redirect(base_url('adduser'));
			}else{

				// This error message will be displayed if the user
				// was not able to be added to the AD structure.
				$this->session->set_flashdata("errorsave" , "User already exist!");
				redirect(base_url('adduser'));
				echo "Sorry, the user was not added.<br>Error Number: ";
				echo ldap_errno($ldap_con) . "<br />Error Description: ";
				echo ldap_error($ldap_con) . "<br />";
			}
		}else{
			echo "Could not bind to the server. Check the username/password.<br />";
			echo "Server Response:"

			// Error number.
			. "<br />Error Number: " . ldap_errno($ldap_conn)

			// Error description.
			. "<br />Description: " . ldap_error($ldap_conn);
		}

		// Always make sure you close the server after
		// your script is finished.
		ldap_close($ldap_con);

	}
	public function updateuser()
	{
		$post = $this->input->post();
		$givenName = $post['givenname'];
		$SN = $post['sn'];
		$CN = $post['cn'];
		$email = $post['mail'];
		$description = $post['description'];
		$office = $post['physicalDeliveryOfficeName'];
		
		
		//$AD_server = "ldap://login.intranet.tvip"; // Local Stunnel --> http://www.stunnel.org/
		$AD_server = "ldap://192.168.4.150"; // Local Stunnel --> http://www.stunnel.org/
		$AD_Auth_User = "administrator@intranet.tvip"; //Administrative user
		$AD_Auth_PWD = "Databa53"; 
		$ldap_con = ldap_connect($AD_server);
		
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		
		if($ldapbind = ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) == true)
		{
			/* $ldaprecord = array(
				'cn' => $CN,
				'givenName' => $givenName,
				'sn' => $SN,
				'DisplayName' => $CN,
				'Description' => $description,
				'physicalDeliveryOfficeName' => $office,
				'mail' => $email				
			); */
			$dn = "CN=". $CN .",CN=users,DC=intranet,DC=tvip";
			$ldaprecord['givenName'] = $givenName;
			$ldaprecord['sn'] = $SN;
			$ldaprecord['DisplayName'] = $CN;
			$ldaprecord['Description'] = $description;
			$ldaprecord['physicalDeliveryOfficeName'] = $office;
			$ldaprecord['mail'] = $email;
			//$ldaprdn = $sAMAccountName."@intranet.tvip";
			print_r("<pre>");			
			var_dump($ldaprecord);
			print_r("</pre>");
			
			//ldap_modify($ldap_con, $dn, $ldaprecord);
			var_dump(ldap_modify($ldap_con, "CN=". $CN .",CN=users,DC=intranet,DC=tvip", $ldaprecord));
			//$this->session->set_flashdata("successsave" , "User Data Updated!!");
			//redirect(base_url('adduser'));  
			
		}else{
			$this->session->set_flashdata("errorsave" , "User cannot be update!");
			redirect(base_url('adduser'));
		}
		ldap_close($ldap_con);

	}
	public function disable($user)
	{
		echo $user;
		$AD_server = "ldap://192.168.4.150"; // Local Stunnel --> http://www.stunnel.org/
		$AD_Auth_User = "administrator@intranet.tvip"; //Administrative user
		$AD_Auth_PWD = "Databa53"; 
		$ldap_con = ldap_connect($AD_server);
		//$dn = "CN=". $ldaprecord['cn'] .",CN=users,DC=intranet,DC=tvip";
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		
		if($ldapbind = ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) == true)
		{
			$filter="(sAMAccountName=$user)";
			$result = ldap_search($ldap_con,"dc=INTRANET,dc=TVIP",$filter);
				//ldap_sort($ldap_con, $result, "sn");
			$info = ldap_get_entries($ldap_con, $result);
			for ($i=0; $i<$info["count"]; $i++)
			{
				
				echo '</br>'.$info[$i]['cn'][0];
				$cn = $info[$i]['cn'][0];
				$dn = "CN=". $cn .",CN=users,DC=intranet,DC=tvip";
				$ldaprecord["UserAccountControl"] = "546";			
				
			}
			$result = ldap_modify($ldap_con, $dn, $ldaprecord);
			if($result){
				$this->session->set_flashdata("sucdis","User Has Been Disabled");
				redirect('users');
			}else{
				$this->session->set_flashdata("fail","Operation Failed");
				redirect('users');
			}
		}
	}
	public function enable($user)
	{
		echo $user;
		$AD_server = "ldap://192.168.4.150"; // Local Stunnel --> http://www.stunnel.org/
		$AD_Auth_User = "administrator@intranet.tvip"; //Administrative user
		$AD_Auth_PWD = "Databa53"; 
		$ldap_con = ldap_connect($AD_server);
		//$dn = "CN=". $ldaprecord['cn'] .",CN=users,DC=intranet,DC=tvip";
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		
		if($ldapbind = ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) == true)
		{
			$filter="(sAMAccountName=$user)";
			$result = ldap_search($ldap_con,"dc=INTRANET,dc=TVIP",$filter);
				//ldap_sort($ldap_con, $result, "sn");
			$info = ldap_get_entries($ldap_con, $result);
			for ($i=0; $i<$info["count"]; $i++)
			{
				
				echo '</br>'.$info[$i]['cn'][0];
				$cn = $info[$i]['cn'][0];
				$dn = "CN=". $cn .",CN=users,DC=intranet,DC=tvip";
				$ldaprecord["UserAccountControl"] = "544";			
				
			}
			$result = ldap_modify($ldap_con, $dn, $ldaprecord);
			if($result){
				$this->session->set_flashdata("sucdis","User Has Been Enabled");
				redirect('users');
			}else{
				$this->session->set_flashdata("fail","Operation Failed");
				redirect('users');
			}
		}
	}
	
	public function edituser($user)
	{
		$AD_server = "ldap://192.168.4.150"; // Local Stunnel --> http://www.stunnel.org/
		$AD_Auth_User = "administrator@intranet.tvip"; //Administrative user
		$AD_Auth_PWD = "Databa53"; 
		$ldap_con = ldap_connect($AD_server);
		//$dn = "CN=". $ldaprecord['cn'] .",CN=users,DC=intranet,DC=tvip";
		ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);
		
		if($ldapbind = ldap_bind($ldap_con, $AD_Auth_User, $AD_Auth_PWD) == true)
		{
			$filter="(sAMAccountName=$user)";
			$result = ldap_search($ldap_con,"dc=INTRANET,dc=TVIP",$filter);
				//ldap_sort($ldap_con, $result, "sn");
			$info = ldap_get_entries($ldap_con, $result);
			for ($i=0; $i<$info['count']; $i++)
			{
				$data['givenname'] = $info[$i]['givenname'][0];
				if (!empty($info[$i]['sn'][0])) {
					$data['sn'] = $info[$i]['sn'][0];
					if ($info[$i]['sn'][0] == "NULL"){
						$data['sn'] = "";
					}
				}
				$data['cn'] = $info[$i]['cn'][0];
				if (!empty($info[$i]['cn'][0])) {
					$data['cn'] = $info[$i]['cn'][0];
					if ($info[$i]['cn'][0] == "NULL"){
						$data['cn'] = "";
					}				
				}
				if (!empty($info[$i]['mail'][0])) {
					$data['mail'] = $info[$i]['mail'][0];
					if ($info[$i]['mail'][0] == "NULL"){
						$data['mail'] = "";
					}				
				}
				if (!empty($info[$i]['description'][0])) {
					$data['description'] = $info[$i]['description'][0];
					if ($info[$i]['description'][0] == "NULL"){
						$data['description'] = "";
					}				
				}
				if (!empty($info[$i]['physicaldeliveryofficename'][0])) {
					$data['physicaldeliveryofficename'] = $info[$i]['physicaldeliveryofficename'][0];
					if ($info[$i]['physicaldeliveryofficename'][0] == "NULL"){
						$data['physicaldeliveryofficename'] = "";
					}				
				}
				$data['samaccountname'] = $info[$i]['samaccountname'][0];
				$this->load->view('edituser', $data);
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}