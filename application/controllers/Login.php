<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	
	public function auth()
	{

			$post = $this->input->post();
			$username = $post["username"];
			$password = $post["password"];
			
			//$AD_server = "ldap://login.intranet.tvip";
			$AD_server = "ldap://192.168.4.150";
			$ldap_con = ldap_connect($AD_server);
			$ldaprdn = 'INTRANET' . "\\" . $username;
			
			ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap_con, LDAP_OPT_REFERRALS, 0);

			$bind = @ldap_bind($ldap_con, $ldaprdn, $password);
			if ($bind) {
				$filter="(sAMAccountName=$username)";
				$result = ldap_search($ldap_con,"dc=INTRANET,dc=TVIP",$filter);
				//ldap_sort($ldap_con, $result, "sn");
				$info = ldap_get_entries($ldap_con, $result);
				for ($i=0; $i<$info["count"]; $i++)
				{
					if($info['count'] > 1)
						break;
					$datasession = array(
						'username' => $username,
						'name'	   => $info[$i]["cn"][0],
						'status'   => "login"
					);
					$this->session->set_userdata($datasession);
					$this->session->set_flashdata("success","Welcome  ". $datasession['name']);
					redirect('Home');
				}
				//@ldap_close($ldap);
				/* $datasession = array(
					'username' => $username,
					'status'   => "login"
				);
				$this->session->set_userdata($datasession);
				$this->session->set_flashdata("success","Welcome  ". $datasession['username']);
				redirect('Home');	 */
			} else{
				$this->session->set_flashdata("errorlogin" , "User Not found or Password incorrect!");
				redirect(base_url('login'));
			}
			ldap_close($ldap_con);
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
