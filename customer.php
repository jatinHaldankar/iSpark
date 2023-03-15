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

    <title>iSpark-Customers</title>

    <style>
    .heading {
        color: crimson;
        font-weight: bold;
        font-size:larger;
        text-decoration: underline;
    }

    @media only screen and (max-width: 600px) {
        .transferCard img{
          display:none;
        }
    }
    </style>
</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">update Customer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="customer.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="account_noEdit" id="account_noEdit">

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="nameEdit" id="nameEdit"
                                placeholder="Enter updated name">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Email</label>
                            <input type="text" class="form-control" name="emailEdit" id="emailEdit"
                                placeholder="Enter updated  email">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Balance</label>
                            <input type="text" class="form-control" name="balanceEdit" id="balanceEdit"
                                placeholder="Enter updated  balance">
                        </div>

                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <header>
        <?php

         require 'utilities/navbar.php';
      ?>

    </header>


    <?php

        //connection
        $conn=mysqli_connect("localhost","root",'',"ispark");

        if(isset($_GET['delete'])){
        $account_no=$_GET['delete'];
        $sql="DELETE FROM  `customer` WHERE `customer`.`account_no`=$account_no";
        $result=mysqli_query($conn,$sql);

            if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> deleted customer details successfully;
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }


            else{

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>fail!</strong> deletion of customer details can not done please try after some time;
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }

        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            if (isset( $_POST['account_noEdit'])){
              // Update the record
                $account_no = $_POST["account_noEdit"];
                $name= $_POST["nameEdit"];
                $email = $_POST["emailEdit"];
                $balance=$_POST["balanceEdit"];
            
              // Sql query to be executed
              $sql = "UPDATE `customer` SET `name` = '$name' , `email` = '$email',`balance`='$balance' WHERE `customer`.`account_no` = $account_no";
              $result = mysqli_query($conn, $sql);
          
              if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> updated customer details successfully;
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
              }
          
              else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>fail!</strong> updation of customer details can not done;
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
              }
            }
            
                else{
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $account_no=$_POST['account_no'];
                    $balance=$_POST['balance'];

                    $sql="INSERT INTO `customer`(`name`,`email`,`account_no`,`balance`) values('$name','$email','$account_no','$balance')";
                    $result=mysqli_query($conn,$sql);
             
                     if($result){
                       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>Success!</strong>Account created  successfully;
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>';
                     }
             
                      else{
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>fail!</strong>There is a problem while creating account please try after some time;
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                     }
                 }
            
        }   
    ?>

    <div class="container transferCard card_shadow">
        <div class="container">
            <h5 class="card-title my-2 heading">Open Your iSpark Account Today</h5>
            <form class="transferForm" action="customer.php" method="post">

                <div class="mb-3 w-60">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">

                </div>


                <div class="mb-3 w-60">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3 w-60">
                    <label for="account_no" class="form-label">Account No</label>
                    <input type="text" name="account_no" class="form-control" id="account_no" name="account_no">
                </div>

                <div class="mb-3 w-60">
                    <label for="exampleInputamount" class="form-label">Balance</label>
                    <input type="text" name="balance" class="form-control" id="balance">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

        <!-- customerImage -->
        <img src="images/s2.jpg" style="width:75%" alt="" srcset="">

    </div>


    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 my-3">
            <?php

                    $conn=mysqli_connect("localhost","root",'',"ispark");

                
                    $sql="SELECT * FROM `customer`";
                    $result=mysqli_query($conn,$sql);


                    $No=0; 
                    while($row=mysqli_fetch_assoc($result)){
                        $No=($No+1)%8;
                            echo ' <div class="col">
                            <div class="card card_shadow">
                                <img src="images/user'.$No.'.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row["name"].'</h5>
                                    <p class="card-text pCardText"><b>Email:</b>'.$row["email"].'</p>
                                    <p class="card-text pCardText"><b>Account No:</b>'.$row["account_no"].'</p>
                                    <p class="card-text pCardText"><b>Balance:</b>'.$row["balance"].'</p>
                                    <button class="edit btn btn-sm btn-warning" id='.$row['account_no'].'>Edit</button>
                                    <button class="delete btn btn-sm btn-danger" id=d'.$row['account_no'].'>Delete</button> 
                                    
                                </div>
                            </div>
                        </div>';
                    }
    
                ?>
        </div>
    </div>


    <?php
    require 'utilities/footer.php';

    ?>

    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">
    </script>

    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            div = e.target.parentNode;

            customer = div.getElementsByTagName("h5")[0];
            nameEdit.value = customer.innerText;

            email = div.getElementsByTagName("p")[0];
            emailEdit.value = email.innerText.substr(6);

            balance = div.getElementsByTagName("p")[2];
            balanceEdit.value = balance.innerText.substr(8);

            account_noEdit.value = e.target.id;
            $('#editModal').modal('toggle');
        })
    })
    </script>

    <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            account_no = e.target.id.substr(1);
            if (confirm("Are you sure you want to delete this customer record from iSpark Bank!")) {
                window.location = `/BankingSystem/customer.php?delete=${account_no}`;
                // TODO: Create a form and use post request to submit a form  
            }
        })
    })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</html>