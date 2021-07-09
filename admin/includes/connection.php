<?php
define('JAZZCASH_MERCHANT_ID', 'MC18444');
define('JAZZCASH_PASSWORD', 'ug19t2f090');
define('JAZZCASH_INTEGERITY_SALT', '9wz84g2331');
define('JAZZCASH_CORRENCY_CODE', 'PKR');
define('JAZZCASH_LANGUAGE', 'EN');
define('JAZZCASH_API_VERSION_1', '1.1');
define('JAZZCASH_API_VERSION_2', '1.2');


define('JAZZCASH_RETURN_URL', 'https://solutions.techstep.com');
define('JAZZCASH_HTTP_POST_URL', 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/2.0/Purchase/DoMWalletTransaction');

$connection=mysqli_connect("localhost","root","","fms");
// if($connection)
// {
//     echo "good"
// }

?>