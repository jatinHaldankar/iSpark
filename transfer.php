<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="\Women welfare\contact.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>iSpark-Transfer money</title>
</head>

<body>

    <?php

require 'utilities/navbar.php';
?>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $credited_account_no=$_POST['credited_account_no'];
        $debited_account_no=$_POST['debited_account_no'];
        $amount=$_POST['amount'];

        if($credited_account_no=='' || $debited_account_no=='' || $amount==''){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>fail!</strong>Enter all details for transfer. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

       

        //if it is get request than what is happing is show on url but in post it can't.

        //submit to database.
        else{

            $conn=mysqli_connect("localhost","root",'',"ispark");

            if(!$conn){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>fail!</strong>There is a Problem in Our Server Please Try After Some Time.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            
            else{  
                $sql="SELECT * FROM customer WHERE account_no='$debited_account_no'";
                $result1=mysqli_query($conn,$sql);
            
                $row=mysqli_fetch_assoc($result1);
                $debitedAccountBalance=$row['balance']-$amount;
                
                if($debitedAccountBalance>=0){

                    $sql2="UPDATE customer SET balance=balance+$amount WHERE account_no=$credited_account_no";
                    mysqli_query($conn,$sql2);

                    $sql3="UPDATE customer SET balance=balance-$amount WHERE account_no=$debited_account_no";
                    mysqli_query($conn,$sql3);
            
                
                    $sql4="INSERT INTO `transfer` (`credited_account_no`, `debited_account_no`, `amount`) VALUES ('$credited_account_no', '$debited_account_no', '$amount')";
                    $result=mysqli_query($conn,$sql4);

                
                    if($result){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>Money Transfer successful.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>fail!</strong>There is a Error While Transfering Money Please Try After Some Time;
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fail!</strong>Not Sufficient balance in account for Money Transfer.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }

            }
        }
    }
?>

    <div class="container transferCard card_shadow" style="height:65vh">
        <div class="container mt-3 ">
            <form class="transferForm" action="transfer.php" method="post">

                <div class="mb-3 w-60">
                    <label for="Credited" class="form-label">Credited Account No</label>
                    <input type="text" name="credited_account_no" class="form-control" id="credited_account_no">

                </div>
                <div class="mb-3  w-60">
                    <label for="exampleInputdebited" class="form-label">Debited Account No</label>
                    <input type="text" name="debited_account_no" class="form-control" id="debited_account_no">
                </div>

                <div class="mb-3 w-60">
                    <label for="exampleInputamount" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" id="amount">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <img src="images/sliderNew1.jpg"  style="width:75%" alt="" srcset="">

    </div>


    <?php
    require 'utilities/footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</html>