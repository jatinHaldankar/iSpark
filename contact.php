<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>iSpark-Contact us</title>   
    <style>
        body{
            background-color: #f1f4f8;
        }
    </style>
</head>

<body>
    <header>
      <?php

         require 'utilities/navbar.php';
      ?>

    </header>
    <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $name=$_POST['contactname'];
                        $email=$_POST['contactemail'];
                        $message=$_POST['contactmessage'];

                        //if it is get request than what is happing is show on url but in post it can't.

                        //submit to database.

                        $_SERVER="localhost";
                        $_USERNAME="root";
                        $_PASSWORD='';
                        $DATABASE="dbjatin1";


                        $conn=mysqli_connect($_SERVER,$_USERNAME,$_PASSWORD,$DATABASE);

                        if(!$conn){
                            die("connection was not successful->".mysqli_connect_error());
                        }
                        
                        else{
                        

                        $sql="INSERT INTO `contactus` (`contactname`, `contactemail`, `contactmessage`) VALUES ('$name', '$email', '$message')";
                        $result=mysqli_query($conn,$sql);


                        if($result){
                        
                            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                            <strong>Success!</strong> your message submitted successfully;
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                        else{
                            echo mysqli_error($conn);
                            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                            <strong>fail!</strong> your message can not submitted successfully;
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }

                        }


                    }
                    ?>
    <main>

        <div id="carouselExampleCaptions" class="carousel slide bg" data-bs-ride="false">
            <div class="carousel-inner  curve">
                <div class="carousel-item active con1">
                    <img src="images\contact_cover.jpg " class="d-block w-100 im" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h5 class="help">We’re Here to Help.</h5>
                        <p class="para"> We always want to hear from you! Let us know how we can best help you and we'll do our
                            very best.</p>

                    </div>
                </div>

            </div>
        </div>

      
        <section>
            <br>
            <br>
        
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">

                        <!-- Heading -->
                        <h2 class="fw-bold">
                            Let us hear from you directly!
                        </h2>

                        <!-- Text -->
                        <p class="fs-lg text-muted mb-7 mb-md-9">
                            We always want to hear from you! Let us know how we can best help you and we'll do our very
                            best.
                        </p>

                    </div>
                </div> <!-- / .row -->

                    
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-10">

                        <!-- Form -->
                        <form action="contact.php"  method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label class="form-label" for="contactName">
                                            Full name
                                        </label>

                                        <!-- Input -->
                                        <input class="form-control" id="contactName" name="contactname" type="text" placeholder="Full name">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label class="form-label" for="contactEmail">
                                            Email
                                        </label>

                                        <!-- Input -->
                                        <input class="form-control" id="contactEmail"  name="contactemail" type="email" placeholder="hello@domain.com">

                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-7 mb-md-9">

                                        <!-- Label -->
                                        <label class="form-label" for="contactMessage">
                                            What can we help you with?
                                        </label>

                                        <!-- Input -->
                                        <textarea class="form-control" id="contactMessage" name="contactmessage" rows="5"
                                            placeholder="Tell us what we can help you with!"></textarea>

                                    </div>
                                </div>
                            </div> <!-- / .row -->

                            <br>
                            <div class="row justify-content-center">
                                <div class="col-auto">

                                    <!-- Submit -->
                                    <button type="submit" class="btn btn-primary lift">
                                        Send message
                                    </button>

                                </div>
                            </div> <!-- / .row -->

                            <br>
                        </form>

                    </div>
                </div> <!-- / .row -->
            </div>
        </section>
    </main>
    <footer>
    <?php
      require 'utilities/footer.php'
    ?>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

</html>