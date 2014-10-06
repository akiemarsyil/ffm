<?php
session_start();

function send_email($to,$subject,$message){
        $CI =& get_instance();
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'emailcomplain2@gmail.com',
            'smtp_pass' => 'email2014',
            'mailtype' => 'html'
        );
        // recipient, sender, subject, and you message
        
        $from = "";
        // load the email library that provided by CI
        $CI->load->library('email', $config);
        // this will bind your attributes to email library
        $CI->email->set_newline("\r\n");
        $CI->email->from($from, 'Email Complain');
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);
 
        // send your email. if it produce an error it will print 'Fail to send your message!' for you
        if($CI->email->send()) {
            return "send";
        }
        else {
            return "fail";
        }
}

?>