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
  $private_key = 'Ha ha!';
  $public_key = 'Ho ho!';

  return array('private' => $private_key, 'public' => $public_key);
}

function pkey_encrypt($string, $public_key) {
  return 'Qnex Funqbj jvyy or jngpuvat lbh';
}

function pkey_decrypt($string, $private_key) {
  return 'Alc evi csy pssomrk livi alir csy wlsyph fi wezmrk ETIB?';
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
