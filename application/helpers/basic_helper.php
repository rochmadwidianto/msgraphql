<?php 

/**
  * Function to get site url
  * uses site_url() function
  *
  * @param string $url any slug
  *
  * @return string site_url
  * 
  */
if (!function_exists('url')) {

	function url($url='')
	{
		return site_url($url);
	}

}

/**
  * Function to get url of assets folder
  *
  * @param string $url any slug 
  *
  * @return string url
  * 
  */
if (!function_exists('assets_url')) {

	function assets_url($url='')
	{
		return base_url('assets/'.$url);
	}

}

/**
  * Function to get url of upload folder
  *
  * @param string $url any slug 
  *
  * @return string url
  * 
  */
if (!function_exists('urlUpload')) {

	function urlUpload($url='')
	{
		return base_url('uploads/'.$url);
	}

}

/**
  * Function for user profile url
  *
  * @param string $id - user id of the user
  *
  * @return string profile url
  * 
  */
if (!function_exists('userProfile')) {

	function userProfile($id)
	{
		$url = urlUpload('users/'.$id.'.png?'.time());

		return $url;
	}

}

/**
  * Function to check and get 'post' request
  *
  * @param string $key - key to check in 'post' request
  *
  * @return string value - uses codeigniter Input library 
  * 
  */
if (!function_exists('post')) {

	function post($key)
	{
		$CI =& get_instance();
		return !empty($CI->input->post($key)) ? $CI->input->post($key) : false;
	}

}

/**
  * Function to check and get 'get' request
  *
  * @param string $key - key to check in 'get' request
  *
  * @return string value - uses codeigniter Input library 
  * 
  */
if (!function_exists('get')) {

	function get($key)
	{
		$CI =& get_instance();
		return !empty($CI->input->get($key)) ? $CI->input->get($key) : false;
	}


}

/**
  * Die/Stops the request if its not a 'post' requetst type
  *
  * @return boolean
  * 
  */
if (!function_exists('postAllowed')) {

	function postAllowed()
	{
		$CI =& get_instance();
		if(count($CI->input->post()) <= 0)
			die('Invalid Request');

		return true;

	}


}


/**
  * Function to dump the passed data
  * Die & Dumps the whole data passed
  *
  * uses - var_dump & die together
  *
  * @param all $key - All Accepted - string,int,boolean,etc
  *
  * @return boolean
  * 
  */
if (!function_exists('dd')) {

	function dd($key)
	{
		die(var_dump($key));
		return true;
	}


}


/**
  * Function to check if the user is loggedIn
  *
  * @return boolean
  * 
  */
if (!function_exists('is_logged')) {

	function is_logged()
	{
		$CI =& get_instance();

		$isLogged = !empty($CI->session->userdata('login')) ? $CI->session->userdata('login') : false;

		if(!$isLogged)
			$isLogged = get_cookie('login') ? true: false;

		return $isLogged;
	}


}


/**
  * Function that returns the data of loggedIn user
  *
  * @param string $key Any key/Column name that exists in users table
  *
  * @return boolean
  * 
  */
if (!function_exists('logged')) {

	function logged($key = false)
	{
		$CI =& get_instance();

		$logged = !empty($CI->session->userdata('login')) ? $CI->users_model->getById($CI->session->userdata('logged')['id']) : false;

		if(!$logged)
			$logged = $CI->users_model->getById( json_decode(get_cookie('logged'))->id );

		return (!$key)?$logged:$logged->{$key};

	}


}

/**
  * Returns Path of view
  *
  * @param string $path - path/file info
  *
  * @return boolean
  * 
  */
if (!function_exists('viewPath')) {

	function viewPath($path)
	{
		return VIEWPATH.'/'.$path.'.php';
	}


}

/**
  * Returns Path of view
  *
  * @param string $date any format
  *
  * @return string date format Y-m-d that most mysql db supports
  * 
  */
if (!function_exists('DateFomatDb')) {

	function DateFomatDb($date)
	{
		return date( 'Y-m-d', strtotime($date));
	}


}

/**
  * Currency formating
  *
  * @param int/float/string $amount
  *
  * @return string $amount formated amount with currency symbol
  * 
  */
if (!function_exists('currency')) {

	function currency($amount)
	{
		return '$ '. $amount;
	}


}

/**
  * Find & returns the vlaue if exists in db
  *
  * @param string $key key which is used to check in db - Refrence: settings table - key column
  *
  * @return string/boolean $value if exists value else false
  * 
  */
if (!function_exists('setting')) {

	function setting($key = '')
	{
		$CI =& get_instance();
		return !empty($value = $CI->settings_model->getValueByKey($key)) ? $value : false;
	}


}


/**
  * Generates teh html for breadcrumb - Supports AdminLte
  *
  * @param array $args Array of values
  * 
  */
if (!function_exists('breadcrumb')) {

	function breadcrumb($args = '')
	{
		$html = '<ol class="breadcrumb">';
		$i = 0;
		foreach ($args as $key => $value) {
			if(count($args) < $i)
				$html .= '<li><a href="'.url($key).'">'.$value.'</a></li>';
			else
				$html .= '<li class="active">'.$value.'</li>';
			$i++;
		}
		    
		    
		$html .= '</ol>';
		echo $html;
	}


}


/**
  * Finds and return the ipaddres of client user
  *
  * @param array $ipaddress IpAddress
  * 
  */
if (!function_exists('ip_address')) {

	function ip_address() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

}

/**
  * Provides the shortcodes which are available in any email template
  *
  * @return array $data Array of shortcodes
  * 
  */
if (!function_exists('getEmailShortCodes')) {

	function getEmailShortCodes() {

		$data = [
			'site_url' => site_url(),
			'company_name' => setting('company_name'),
		];

		return $data;
	}

}




/**
  * Redirects with error if user doesnt have the permission to passed key/module
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('ifPermissions')) {

	function ifPermissions($code = '') {

		$CI =& get_instance();

		if ( hasPermissions($code) ) {
			return true;
		}

		$CI->session->set_flashdata('alert-type', 'danger');
		$CI->session->set_flashdata('alert', 'You dont have permissions to this Section !');


		redirect('/', 'refresh');

		return false;
	}

}

/**
  * Check and return boolean if user have the permission to passed key or not
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('hasPermissions')) {

	function hasPermissions($code = '') {

		$CI =& get_instance();

		if ( !empty( $CI->role_permissions_model->getByWhere([ 'role' => logged('role'), 'permission' => $code ]) ) ) {

			return true;
			
		}

		return false;

	}

}

/**
  * Redirects with error if user doesnt have the permission to passed key/module
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('notAllowedDemo')) {

	function notAllowedDemo($url = '') {

		$CI =& get_instance();

		$CI->session->set_flashdata('alert-type', 'danger');
		$CI->session->set_flashdata('alert', 'This action is disabled in <strong>Demo</strong> !');

		redirect($url);

		return false;
	}

}

/* --------------------------------------------------------------------------------------------------------------------------------- */
function tanggal(){
    return date('Y-m-d');
}

function tanggal_indo() {
    return date('d-m-Y H:i');
}

function tanggal_new() {
    /* script menentukan hari */  
     $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
     $hr = $array_hr[date('N')];

    /* script menentukan tanggal */    
    $tgl= date('j');
    /* script menentukan bulan */ 
      $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
      $bln = $array_bln[date('n')];
    /* script menentukan tahun */ 
    $thn = date('Y');
    /* script perintah keluaran*/ 
    //  return $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
     return $hr . ", " . $tgl . " " . $bln . " " . $thn;
}

function rupiah($angka) {
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

function date_set_default($tgl) {
    $tanggal = date('Y-m-d', strtotime($tgl));
    return $tanggal;
}

// from dd/mm/yyyy
function date_slash_to_default($tgl) {
    $tanggal = substr($tgl, 0, 2);
    $bulan = substr($tgl, 3, 2);
    $tahun = substr($tgl, 6, 4);
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

function default_to_month_year($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    $time = substr($tgl, 11, 5);
    return eng_bulan_long($bulan) . ' ' . $tahun;
}

function tgl_indo($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    $time = substr($tgl, 11, 5);
    return $tanggal . ' ' . bulan($bulan) . ' ' . $tahun;
}

function tgl_indo_short($tgl) {
    $tanggal = date('d-m-Y', strtotime($tgl));
    return $tanggal;
}

function tgl_indo_long($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    $time = substr($tgl, 11, 5);
    return $tanggal . ' ' . bulan_long($bulan) . ' ' . $tahun;
}

function tgl_lengkap($tanggals) {

    $tanggal = substr($tanggals, 8, 2);
    $bulan = substr($tanggals, 5, 2);
    $tahun = substr($tanggals, 0, 4);
    $time = substr($tanggals, 11, 5);

    return $tanggal . ' ' . bulan($bulan) . ' ' . $tahun . ' ' . $time;
}

function tgl_lengkap_long($tanggals) {

    $tanggal = substr($tanggals, 8, 2);
    $bulan = substr($tanggals, 5, 2);
    $tahun = substr($tanggals, 0, 4);
    $time = substr($tanggals, 11, 5);

    return $tanggal . ' ' . bulan_long($bulan) . ' ' . $tahun . ' ' . $time;
}

function tgl_slash($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal . '/' . $bulan . '/' . $tahun;
}

function bulan($bln) {
    switch ($bln) {
        case 1:
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Agt";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Okt";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Des";
            break;
    }
}

function bulan_long($bln) {
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function eng_bulan_long($bln) {
    switch ($bln) {
        case 1:
            return "January";
            break;
        case 2:
            return "February";
            break;
        case 3:
            return "March";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "May";
            break;
        case 6:
            return "June";
            break;
        case 7:
            return "July";
            break;
        case 8:
            return "August";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "October";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "December";
            break;
    }
}

function eng_bulan_to_int($bln) {
    switch ($bln) {
        case 'January':
            return 1;
            break;
        case 'February':
            return 2;
            break;
        case 'March':
            return 3;
            break;
        case 'April':
            return 4;
            break;
        case 'May':
            return 5;
            break;
        case 'June':
            return 6;
            break;
        case 'July':
            return 7;
            break;
        case 'August':
            return 8;
            break;
        case 'September':
            return 9;
            break;
        case 'October':
            return 10;
            break;
        case 'November':
            return 11;
            break;
        case 'December':
            return 12;
            break;
    }
}

function nama_hari($tanggal) {
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];

    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $nama_hari = "";
    if ($nama == "Sunday") {
        $nama_hari = "Minggu";
    } else if ($nama == "Monday") {
        $nama_hari = "Senin";
    } else if ($nama == "Tuesday") {
        $nama_hari = "Selasa";
    } else if ($nama == "Wednesday") {
        $nama_hari = "Rabu";
    } else if ($nama == "Thursday") {
        $nama_hari = "Kamis";
    } else if ($nama == "Friday") {
        $nama_hari = "Jumat";
    } else if ($nama == "Saturday") {
        $nama_hari = "Sabtu";
    }
    return $nama_hari;
}
