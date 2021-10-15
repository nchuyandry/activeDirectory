<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['account_suffix'] = '@intranet.tvip';
$config['base_dn'] = 'DC=intranet,DC=tvip';
$config['domain_controllers'] = array ("login.intranet.tvip");
$config['ad_username'] = 'Administrator@intranet.tvip';
$config['ad_password'] = 'Databa53';
$config['real_primarygroup'] = true;
$config['use_ssl'] = false;
$config['use_tls'] = false;
$config['recursive_groups'] = true;
