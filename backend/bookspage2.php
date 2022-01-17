<?php
require_once '../common/includes/dbconnect.php';
require_once 'header.php'; 
//require_once 'includes/check.php';
// define ('URLBASE', 'http://localhost/bookstore/') ;

 
?>
<head>
    <style>
@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');

body{
  font-family: Roboto, sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.5;
  color: #000;
}

h3.h3 {
    text-align: center;
    margin: 1em;
    text-transform: capitalize;
    font-size: 1.7em;
}





/********************* Shopping Demo-6 **********************/

.product-grid6,
.product-grid6 .product-image6 {
    overflow: hidden
}

.product-grid6 {
    font-family: 'Open Sans', sans-serif;
    text-align: center;
    position: relative;
    transition: all .5s ease 0s;
    
    
}

.product-grid6:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, .3)
}

.product-grid6 .product-image6 a {
    display: block
}

.product-grid6 .product-image6 img {
    width: 100%;
    height: auto;
    transition: all .5s ease 0s
}

.product-grid6:hover .product-image6 img {
    transform: scale(1.1)
}

.product-grid6 .product-content {
    padding: 12px 12px 15px;
    transition: all .5s ease 0s;
    background-color: #347e952b
}

.product-grid6:hover .product-content {
    opacity: 0
}

.product-grid6 .title {
    font-size: 20px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 10px;
    transition: all .3s ease 0s
}

.product-grid6 .title a {
    color: #000;
    text-decoration: none;
    
}

.product-grid6 .title a:hover {
    color: #2e86de
}

.product-grid6 .price {
    font-size: 18px;
    font-weight: 600;
    color: black
}



.product-grid6 .social {
    background-color: transparent;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    transform: translateX(-50%);
    position: absolute;
    bottom: -50%;
    left: 50%;
    z-index: 1;
    transition: all .5s ease 0s
}

.product-grid6:hover .social {
    opacity: 10;
    bottom: 20px
}

.product-grid6 .social li {
    display: inline-block
}

.product-grid6 .social li a {
    color: white;
    font-size: 16px;
    line-height: 45px;
    text-align: center;
    height: 45px;
    width: 45px;
    margin: 0 7px;
    border: 1px solid white;
    border-radius: 50px;
    display: block;
    position: relative;
    transition: all .3s ease-in-out
}

.product-grid6 .social li a:hover {
    color: #fff;
    background-color: #2e86de;
    width: 80px
}

.product-grid6 .social li a:after,
.product-grid6 .social li a:before {
    content: attr(data-tip);
    color: #fff;
    background-color: #2e86de;
    font-size: 12px;
    letter-spacing: 1px;
    line-height: 20px;
    padding: 1px 5px;
    border-radius: 5px;
    white-space: nowrap;
    opacity: 0;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    top: -30px
}

.product-grid6 .social li a:after {
    content: '';
    height: 15px;
    width: 15px;
    border-radius: 0;
    transform: translateX(-50%) rotate(45deg);
    top: -20px;
    z-index: -1
}

.product-grid6 .social li a:hover:after,
.product-grid6 .social li a:hover:before {
    opacity: 1
}

@media only screen and (max-width:990px) {
    .product-grid6 {
        margin-bottom: 30px
    }
}




    </style>
</head>
 <body>
    
<header>
</header>

<main>

<div class="page-content p-5" id="content">
    
    <div class="container">
    <h3 class="h3">Име категория </h3>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid6">
                <div class="product-image6">
                    <a href="#">
                        <img class="pic-1" src="https://rukminim1.flixcart.com/image/660/792/kerfl3k0-0/shirt/0/y/n/40-rmsz09830-b2-raymond-original-imafvd6rrma8cufj.jpeg?q=50" width="150" height="150">
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Име книга</a></h3>
                    <div class="price">$11.00
                        
                    </div>
                </div>
                <ul class="social">
                    <li><a href="" data-tip="Добави в количката"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
    
 </div>

</main>

<footer class="text-muted py-5">
<!--  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>-->
</footer>


    

      
  </body>
</html>