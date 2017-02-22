<?php

// Symmetric Encryption

// Cipher method to use for symmetric encryption
const CIPHER_METHOD = 'AES-256-CBC';

function key_encrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  $key = str_pad($key, 32, '*');
  $iv_len = openssl_cipher_iv_length ($cipher_method );
  $iv = openssl_random_pseudo_bytes($iv_len); // get random $iv
  $cypher_text = openssl_encrypt($string,$cipher_method,$key, OPENSSL_RAW_DATA ,$iv);
  return base64_encode($iv.$cypher_text);
}

function key_decrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  $key = str_pad($key, 32, '*');

  // since output of encryption was binary, to decrypt turn the cyphertext to binary
  $ciphertext_str = base64_decode($string);

  // extract iv
  $iv_len = openssl_cipher_iv_length ($cipher_method );
  $iv = substr($ciphertext_str,0, $iv_len);

  // extract cypher text
  $cypher_text = substr($ciphertext_str, $iv_len);

  // decrypt
  $plain_text= openssl_decrypt($cypher_text, $cipher_method, $key, OPENSSL_RAW_DATA, $iv);
  return $plain_text;
}


// Asymmetric Encryption / Public-Key Cryptography

// Cipher configuration to use for asymmetric encryption
const PUBLIC_KEY_CONFIG = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

function generate_keys($config=PUBLIC_KEY_CONFIG) {
   $resource = openssl_pkey_new($config);

  // Extract private key from the pair
  openssl_pkey_export($resource, $private_key);

  // Extract public key from the pair
  $key_details = openssl_pkey_get_details($resource);
  $public_key = $key_details["key"];
  return array('private' => $private_key, 'public' => $public_key);
}

function pkey_encrypt($string, $public_key) {
   if(!openssl_public_encrypt($string, $encrypted, $public_key)){
     exit("error encrypting");
   }

  // Use base64_encode to make contents viewable/sharable
  $message = base64_encode($encrypted);

  return $message;
}

function pkey_decrypt($string, $private_key) {
  $ciphertext = base64_decode($string);
  
  if (!openssl_private_decrypt($ciphertext, $decrypted, $private_key)) {
    exit("error decrypting");
  }

  return $decrypted;
  }


// Digital signatures using public/private keys

function create_signature($data, $private_key) {
  // A-Za-z : ykMwnXKRVqheCFaxsSNDEOfzgTpYroJBmdIPitGbQUAcZuLjvlWH
  return 'RpjJ WQL BImLcJo QLu dQv vJ oIo Iu WJu?';
}

function verify_signature($data, $signature, $public_key) {
  // Vigenère
  return 'RK, pym oays onicvr. Iuw bkzhvbw uedf pke conll rt ZV nzxbhz.';
}

?>
