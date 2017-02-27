<?php

  require_once('../private/initialize.php');

  $plain_text = '';
  $public_key = '';
  $encrypted_text = '';
  $cipher_text = '';
  $private_key = '';
  $decrypted_text = '';
  $checksum='';
  $checksum_status = '';

  if(isset($_POST['submit'])) {
  
    if(isset($_POST['public_key'])) {
    
      // This is an encode request
      $plain_text = isset($_POST['plain_text']) ? $_POST['plain_text'] : nil;
      $public_key = isset($_POST['public_key']) ? $_POST['public_key'] : nil;
      $encrypted_text =$cipher_text= pkey_encrypt($plain_text, $public_key);

      if(isset($_POST['checksum_generate'])) {
        $checksum= sha1($cipher_text);
      }
    } else {
    
      // This is a decode request
      $cipher_text = isset($_POST['cipher_text']) ? $_POST['cipher_text'] : nil;
      $private_key = isset($_POST['private_key']) ? $_POST['private_key'] : nil;
       $plain_text=$decrypted_text = pkey_decrypt($cipher_text, $private_key);
     $checksum = isset($_POST['checksum']) ? $_POST['checksum'] : nil;
      
      if(isset($_POST['checksum_check'])){
        $check_temp = sha1($cipher_text);
        if($check_temp==$checksum){
          $checksum_status = 'Valid';
        }
        else{
          $checksum_status='invalid';
        }
    }
  }
}

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Asymmetric Encryption: Encrypt/Decrypt</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>
    
    <a href="index.php">Main menu</a>
    <br/>

    <h1>Asymmetric Encryption</h1>
    
    <div id="encoder">
      <h2>Encrypt</h2>

      <p>Plain text may not exceed 245 characters.</p>

      <form action="" method="post">
        <div>
          <label for="plain_text">Plain text</label>
          <textarea name="plain_text" maxlength="245"><?php echo h($plain_text); ?></textarea>
        </div>
        <div>
          <label for="public_key">Public Key</label>
          <textarea name="public_key"><?php echo h($public_key); ?></textarea>
        </div>
        <div>
            <input id="checkbox" type="checkbox" name="checksum_generate">
            Generate Check Sum
            <div>
             <?php if(!$checksum=='') {echo 'Checksum is: '. $checksum;} ?>
             </div>
       </div>
        <div>
          <input type="submit" name="submit" value="Encrypt">
        </div>
      </form>
    
      <div class="result"><?php echo h($encrypted_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
    <hr />
    
    <div id="decoder">
      <h2>Decrypt</h2>

      <form action="" method="post">
        <div>
          <label for="cipher_text">Cipher text</label>
          <textarea name="cipher_text"><?php echo h($cipher_text); ?></textarea>
        </div>
        <div>
          <label for="private_key">Private Key</label>
          <textarea name="private_key"><?php echo h($private_key); ?></textarea>
        </div>
        <div>
            <input id="checkbox" type="checkbox" name="checksum_check">
            Verify Check Sum
            <input type="text" name="checksum" value="<?php echo h($checksum); ?>">
             <div>
             <?php if(!$checksum_status=='') {echo 'Checksum is: '. $checksum_status;} ?>
          </div>
          </div>
        <div>
          <input type="submit" name="submit" value="Decrypt">
        </div>
      </form>

      <div class="result"><?php echo h($decrypted_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
  </body>
</html>
