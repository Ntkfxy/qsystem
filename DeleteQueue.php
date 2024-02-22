<?php
if (isset($_POST["QNumber"]) && ($_POST["Qdate"])) {
    $strQdate = $_POST["Qdate"];
    $strQNumber = $_POST["QNumber"];
}

require('conn.php');


$sql = "DELETE  FROM queue WHERE QNumber=:QNumber and Qdate = :Qdate ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':QNumber', $strQNumber);
$stmt->bindParam(':Qdate', $strQdate);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stmt->execute()) {
    // $message = "Successfully delete customer" . $_GET['CustomerID'] . ".";
    echo '
        <script type="text/javascript">
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly  delete customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        </script>
        ';
} else {
    $message = "Fail to delete customer information.";
}

$conn = null;

//header("Location:index.php");
