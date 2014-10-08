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

function cut_word($sentence,$word_count)
{
    $space_count = 0;
    $print_string = '';
    $last_string = '';
    for($i=0;$i<strlen($sentence);$i++) {
        if($sentence[$i]==' ')
        $space_count ++;
        $print_string .= $sentence[$i];
        if($space_count == $word_count) {
            $last_string= '';
            break;
        }
    }
    
    return preg_replace('/<img[^>]+./','',$print_string.$last_string);
}

// untuk KRIPTOGRAFI
define('CLASS_ENCRYPT', dirname(__FILE__));
include('cryptography/AES.class.php');
include('cryptography/class.hash_crypt.php');

// $keypass=md5('inv'.md5('store'));
// $key1=md5('inv');

function keypass()
{
    return md5('inv'.md5('store'));
}

function paramEncrypt($x)
{
    
    $first_output = '';
    $count = 0;
    
    
    $Cipher = new AES();
    $key_256bit = keypass();
    
    $n = ceil(strlen($x)/16);
    $encrypt = "";

    for ($i=0; $i<=$n-1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i*16, 16)),$key_256bit);
        $encrypt .= $cryptext;   
    }

    return $encrypt;
}

function paramDecrypt($x)
{
    $Cipher = new AES();
    $key_256bit = keypass();
      
    $n = ceil(strlen($x)/32);
    $decrypt = "";

    for ($i=0; $i<=$n-1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i*32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }
   
    return $decrypt;
}

function decode($x)
{

    $pecahURI = explode('?', $x);
    $parameter = $pecahURI[1];
  
    $pecahParam = explode('&', paramDecrypt($parameter));

    for ($i=0; $i <= count($pecahParam)-1; $i++) {
        $decode = explode('=', $pecahParam[$i]);
        $var[$decode[0]] = $decode[1];  
    }

    return $var;
}


function encoder($x)
{
    $value = new hash_encryption($keypass1);
    $first = $value->encrypt($x);
    
    $first_output = '';
    $count = 0;

    while($count<strlen($encrypted)) {
        $enc_output .= substr($first,$count,80) . "<br>";
        $count+=80;
    }
    
    $Cipher = new AES();
    $key_256bit = $keypass;
    
    $n = ceil(strlen($first)/16);
    $encrypt = "";

    for ($i=0; $i<=$n-1; $i++) {
      $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($first, $i*16, 16)),$key_256bit);
      $encrypt .= $cryptext;   
    }
   
    return $encrypt;
}

function decoder($x)
{
    $Cipher = new AES();
    $key_256bit = keypass();
  
    $n = ceil(strlen($x)/32);
    $decrypt = "";

    for ($i=0; $i<=$n-1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i*32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    $value = new hash_encryption('');
    $decrypted = $value->decrypt($decrypt); 
   
    return $decrypted;
}

?>