<?php
include_once("resources/config.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
$date_now=date('Y-m-d H:i:s');


// $sql = "
//   SELECT * from ci_setting_status
// ";
// $query_=mysqli_query($conn,$sql);
// $days_complete=0;
// if(mysqli_num_rows($query) > 0)
// {
//   $days_complete=mysqli_fetch_row($query);
// }else{
//   $days_complete=7;
// }
//
// echo $days_complete;

// $sql="select
//       os.order_status_id,os.seller_id,os.order_id,os.order_status,ct.transaction_id,ct.transaction_status,ct.transaction_record,ct.next_transaction
//       from ci_order_status os join ci_transaction ct on os.order_status_id=ct.order_status_id where os.order_status=3";
  $sql = "
  SELECT
    os.*,
    tbl2.transaction_id,
    tbl2.transaction_status,
    tbl2.transaction_record,
    tbl2.next_transaction
  FROM
    ci_order_status os
  JOIN(
    SELECT tt.*
    FROM
        ci_transaction tt
    INNER JOIN(
        SELECT
            order_status_id,
            MAX(transaction_id) AS transaction_id
        FROM
            ci_transaction
        GROUP BY
            order_status_id
    ) trx
  ON
    tt.order_status_id = trx.order_status_id AND tt.transaction_id = trx.transaction_id
  ) tbl2
  ON
    tbl2.order_status_id = os.order_status_id
  WHERE
    os.order_status = 3
  ";
      $query=mysqli_query($conn,$sql);
      $n_of_row = mysqli_num_rows($query);
      $row=mysqli_fetch_array($query);

      if($n_of_row > 0)
      {
        while($row){
          if($date_now > $row['next_transaction'])
          {
            $sql2="UPDATE ci_order_status SET order_status=4 WHERE order_status_id='".$key['order_status_id']."' ";
          	$query2=mysqli_query($conn,$sql2);

          	$sql3 = "INSERT INTO ci_transaction (transaction_status,transaction_record,next_transaction,order_status_id) VALUES ('4','".$date_now."',NULL,'".$key['order_status_id']."')";
          	$query3=mysqli_query($conn,$sql3);


          	if($query2 && $query3){
          	    echo 'Success';
          	}else{
          	    echo "Not success";
          	}
          }
        }
      }


?>
