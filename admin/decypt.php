<?php
$input = "SmackFactory";

$encrypted = encryptIt( $input );
$decrypted = decryptIt( $encrypted );

echo $encrypted . '<br />' . $decrypted;

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a8';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
echo "$qDecoded";   
   return( $qDecoded );
}
?>