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
       
    <title>iSpark-Transfer History</title>
     <style>
        .tableHeight{
            height:70vh;
        }
     </style>

</head>

<body>
    <header>
        <?php

         require 'utilities/navbar.php';
      ?>

    </header>

    <div class="my-3 tableHeight">
        <table class="table   table-bordered border-primary  shadow p-3 mb-5  rounded" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">credit account</th>
                    <th scope="col">debit account</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>

                <?php

     $conn=mysqli_connect("localhost","root",'',"ispark");

  
      $sql="SELECT * FROM `transfer`";
      $result=mysqli_query($conn,$sql);


      $No=0; 
    while($row=mysqli_fetch_assoc($result)){
        $No=$No+1;
    echo "<tr>
      <th scope='row'>" .$No. "</th>
      <td>"  .$row['credited_account_no']. "</td>
      <td>"  .$row["debited_account_no"]. "</td>
      <td>"  .$row["amount"]. "</td>
       </tr>";
    }
    
    ?>
            </tbody>
        </table>
    </div>

    
    <?php
    require 'utilities/footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</html>