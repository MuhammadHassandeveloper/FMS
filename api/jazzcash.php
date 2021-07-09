<?php 
session_start();
require_once("../admin/includes/connection.php");
require_once("../payment/jazz.php");

$total=$_POST['total'];
$name=$_POST['name'];
$s_id=$_POST['s_id'];
$fname=$_POST['fname'];
$semester=$_POST['semester'];
$degree=$_POST['degree'];
$course=$_POST['course'];
$subjects=$_POST['subjects'];
$regFee=$_POST['regFee'];
$semFee=$_POST['semFee'];


//jazz response from file
$form_data['cnic']=$_POST['jazzCnic'];
$form_data['phone']=$_POST['jazzPhone'];
$form_data['paymentMethod']='jazzcash';
$form_data['total']=$total;





$code=0;
$jc_api=new jazzcashapi();
$response=$jc_api->createCharge($form_data);
if($response->pp_ResponseCode==000){
    // $code=1;
 
    $payment_id=$response->pp_TxnRefNo;
    $amount=$response->pp_Amount;
$sql="INSERT  INTO `challans`(`s_id`,`payment_type`, `name`,`fname`,`semester`,`degree`,`course`,`subjects`,`reg_fee`,`sem_fee`,`payment_id`,`paying_amount`,`balance_transaction`, `total`, `status`) values('$s_id','jazzcash','$name','$fname','$semester','$degree','$course','$subjects','$regFee','$semFee','$payment_id','$total','$amount','$amount','success')";

  $res=mysqli_query($connection,$sql);
//   if($res)
//   {
//       echo "success";
//   }
}
$response=array('message'=>$response->pp_ResponseMessage,'code'=>$code);
echo json_encode($response);

