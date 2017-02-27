<?php
  require_once('../private/initialize.php');

  $plain_text = '';
  $encode_key = '';
  $encrypted_text = '';
  $cipher_text = '';
  $decode_key = '';
  $decrypted_text = '';
  $checksum='';
  $checksum_status = '';

  if(isset($_POST['submit'])) {
  
    if(isset($_POST['encode_key'])) {
    
      // This is an encode request
      $plain_text = isset($_POST['plain_text']) ? $_POST['plain_text'] : nil;
      $encode_key = isset($_POST['encode_key']) ? $_POST['encode_key'] : nil;
      $encrypted_text=$cipher_text = key_encrypt($plain_text, $encode_key);
      
      if(isset($_POST['checksum_generate'])) {
        $checksum= sha1($cipher_text);
      }
    } else {
    
      // This is a decode request
      $plain_text=$decrypted_text;
      $cipher_text = isset($_POST['cipher_text']) ? $_POST['cipher_text'] : nil;
      $decode_key = isset($_POST['decode_key']) ? $_POST['decode_key'] : nil;
      $decrypted_text = key_decrypt($cipher_text, $decode_key);
      $checksum = isset($_POST['checksum']) ? $_POST['checksum'] : nil;
      $plain_text=$decrypted_text;
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
    <title>Symmetric Encryption: Encrypt/Decrypt</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>
    
    <a href="index.php">Main menu</a>
    <br/>

    <h1>Symmetric Encryption</h1>
    
    <div id="encoder">
      <h2>Encrypt</h2>

      <form action="" method="post">
        <div>
          <label for="encode_algorithm">Algorithm</label>
          <select name="encode_algorithm">
            <option value="AES-256-CBC">AES-256-CBC</option>
          </select>
        </div>
        <div>
          <label for="plain_text">Plain text</label>
          <textarea name="plain_text"><?php echo h($plain_text); ?></textarea>
        </div>
        <div>
          <label for="encode_key">Key</label>
          <input type="text" name="encode_key" value="<?php echo h($encode_key); ?>" />
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
          <label for="decode_algorithm">Algorithm</label>
          <select name="decode_algorithm">
            <option value="AES-256-CBC">AES-256-CBC</option>
          </select>
        </div>
        <div>
          <label for="cipher_text">Cipher text</label>
          <textarea name="cipher_text"><?php echo h($cipher_text); ?></textarea>
        </div>
        <div>
          <label for="decode_key">Key</label>
          <input type="text" name="decode_key" value="<?php echo h($decode_key); ?>" />
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
          <input type="submit" name="submit" value="Decrypt"/>
        </div>
      </form>

      <div class="result"><?php echo h($decrypted_text); ?></div>
      <div style="clear:both;"></div>
    </div>   
  </body>
</html>