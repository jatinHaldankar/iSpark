<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <title>iSpark Bank</title>
   
    
</head>

<body>

    <?php

   require 'utilities/navbar.php';
  ?>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="images/s1.jpg" class="d-block w-100  slider" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/slider3.jpg" class="d-block w-100 slider" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider2.jpg" class="d-block w-100 slider" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container my-3">
          <h1 class="cardHeader">About Us</h5>
        <div class="card-body card card_shadow  ">
            <p class="card-text pCardText">Welcome to iSpark, a cutting-edge banking institution dedicated to providing
                exceptional
                financial services
                to our customers. At iSpark, we believe in leveraging the latest technology to provide our customers
                with a
                seamless and convenient banking experience.

                Our team of highly skilled professionals is committed to delivering world-class services that meet
                the
                unique financial needs of our customers. We understand that our success is closely tied to the
                success of
                our customers, and we go above and beyond to help them achieve their financial goals.

                At iSpark, we offer a wide range of banking services, including personal and business banking.

                We pride ourselves on our strong commitment to customer satisfaction. We take the time to understand
                our
                customers' unique financial situations and provide them with the guidance and support they need to
                make
                informed decisions about their finances.
                Thank you for choosing iSpark as your banking partner. We look forward to serving you and helping
                you
                achieve your financial goals.</p>
        </div>
    </div>




    <div class="container my-4 services">
        <h1 class="cardHeader">Services</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card card_shadow">
                    <img src="images/service1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">View All Customers</h5>
                        <p class="card-text pCardText">The View All Customers section of a iSpark bank is a feature that allow to
                            view a list of all customers. This section typically includes details about each customer,
                            such as their name, account number, account type, and account balance.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card_shadow">
                    <img src="images/service2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Transfer Money</h5>
                        <p class="card-text pCardText">The Transfer Money section of a iSpark bank is an essential feature that
                            allows customers to send money from one account to another. customers
                            typically need to provide details such as account number and the amount to be transferred.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card_shadow">
                    <img src="images/service3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Transaction History</h5>
                        <p class="card-text pCardText">The Transaction History section of a iSpark bank is a valuable feature that
                            allows customers to view their account activity over a specific period. This section
                            typically includes details about every transaction made on the account.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
       require 'utilities/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>