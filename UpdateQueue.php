<?php


if (isset($_POST['QNumber']) && ($_POST['Qdate']))
  require 'conn.php';



$sql =  "UPDATE queue 
        SET QStatus = :QStatus,
        pid =:pid
          WHERE QNumber =:QNumber and  Qdate =:Qdate";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':QStatus', $_POST['QStatus']);
$stmt->bindParam(':pid', $_POST['pid']);
$stmt->bindParam(':QNumber', $_POST['QNumber']);
$stmt->bindParam(':Qdate', $_POST['Qdate']);


echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stmt->execute()) {
  echo '
      <script type="text/javascript">

        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
}
$conn = null;
