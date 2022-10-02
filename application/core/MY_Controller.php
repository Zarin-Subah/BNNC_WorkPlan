<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_other');
        date_default_timezone_set('Asia/Almaty');
    }

    public function get_max_code($table) {
        $get_code = $this->mod_other->get_max_code($table);
        foreach ($get_code as $get_code)
            $max_code = $get_code['code'];
        return $max_code;
    }

    public function period_from_month($month) {
        $period = "";
        $month_check = $month % 2;
        if ($month_check == 1) {
            $next_month = $month + 1;
            $period = "'" . date("M", mktime(null, null, null, $month)) . "-" . date("M", mktime(null, null, null, $next_month)) . "'";
        } elseif ($month_check == 0) {
            $next_month = $month - 1;
            $period = date("M", mktime(null, null, null, $next_month)) . "-" . date("M", mktime(null, null, null, $month));
        }
        $period = str_replace("'", "", $period);
        return $period;
    }

    public function send_sms_api($send_list, $sms_body) {
        $to = "{$send_list}";
        $token = "f94823207b6ac36867a4f8c430169f33";
        $message = $sms_body;

        $url = "http://sms.greenweb.com.bd/api.php";


        $data = array(
            'to' => "$to",
            'message' => "$message",
            'token' => "$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        return $smsresult;
        //sendsms end//
    }

    public function send_email_api($to, $cc, $subject, $message, $path, $file_name) {
        $store_name = $this->mod_other->store_name();
        if ((!empty($path)) && (!empty($file_name))) {
            $filename = $file_name;
            $path = $path;
            $file = $path . "/" . $filename;
            $content = file_get_contents($file);
            $content = chunk_split(base64_encode($content));
        }


        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (RFC)
        $eol = "\r\n";

        // main header (multipart mandatory)        
        $headers = "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= "From: ma.mozid26@gmail.com" . $eol;

        // message
        $full_message = '
        <html>
        <head>
        <style>
        table{border-collapse: collapse;}
        .tbl thead tr th
        {
            background-color: #a9cce3;
            border-color: darkgray;	
        }

        .tbl tbody tr:nth-child(odd) td,
        .tbl tbody tr:nth-child(odd) th {
            background-color: #eee;
            border-color: darkgray;
        }

        .tbl tbody tr:nth-child(even) td,
        .tbl tbody tr:nth-child(even) th {
            background-color: #FFF;
            border-color: darkgray;
            color:#000;
        }
        td,th{font-size:14px;}
        </style>
        </head>
        <body>
                Dear Sir/Madam,
                <br/>
                <br/>' .
                $message
                . '<br/>
                <br/>
                It is a System Generated Email.<br/>
                From,<br/>
                <font style="font-size:15px;font-weight: bold;color:#6B9300;">' . $store_name . '</font><br/>
            </body>
        </html>
        ';
        $body = $full_message . $eol;
//        if ((!empty($path)) && (!empty($file_name))) {
//            // attachment
//            $body .= "--" . $separator . $eol;
//            $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
//            $body .= "Content-Transfer-Encoding: base64" . $eol;
//            $body .= "Content-Disposition: attachment" . $eol;
//            $body .= $content . $eol;
//            $body .= "--" . $separator . "--";
//        }
        //SEND Mail
        $mailto = $to . ',' . $cc;
        if (mail($mailto, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public function bn2en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }

    public function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }

    public function month_en2bn($month) {
        $month_en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $month_bn = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
        $converted_month = str_replace($month_en, $month_bn, $month);
        return $convertedDATE;
    }

    public function month_bn2en($month) {
        $month_bn = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
        $month_en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $converted_month = str_replace($month_bn, $month_en, $month);
        return $convertedDATE;
    }

}
