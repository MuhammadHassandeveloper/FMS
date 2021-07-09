<?php 
session_start();

require_once("../admin/includes/connection.php");
require_once("../payment/jazz.php");

$name=$_POST['name'];
$s_id=$_POST['s_id'];
$fname=$_POST['fname'];
$phone=$_POST['phone'];
$semester=$_POST['semester'];
$amount=$_POST['amount'];
$type=$_POST['type'];
$total=$_POST['total'];


//jazz response from file
$form_data['cnic']=$_POST['jazzCnic'];
$form_data['phone']=$_POST['jazzPhone'];
$form_data['paymentMethod']='jazzcash';
$form_data['total']=$total;



$code=0;
$jc_api=new jazzcashapi();
$response=$jc_api->createCharge($form_data);
if($response->pp_ResponseCode==000){
    // $code=1
    $payment_id=$response->pp_TxnRefNo;
    $amount=$response->pp_Amount;

$sql="INSERT INTO `fine_challans`(`s_id`,`name`, `fname`, `phone`, `semester`, `amount`,`payment_id`, `type`, `total`,`status`) VALUES ('$s_id','$name','$fname','$phone','$semester','$amount','$payment_id','$type','$total','success')";
  $res=mysqli_query($connection,$sql);
//   if($res)
//   {
//       echo "success";
//   }
}
$response=array('message'=>$response->pp_ResponseMessage,'code'=>$code);
echo json_encode($response);

