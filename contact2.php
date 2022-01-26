<?php
//
require_once '../common/includes/dbconnect.php';
require_once 'header.php';
?>
<html>
    <head>

        <title>Contact Form</title>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
        <script type="text/javascript">
            (function () {
                // https://dashboard.emailjs.com/admin/integration
                emailjs.init('user_zbUCEOJcSHu0ppEaDSklI');
            })();
        </script>
        <script type="text/javascript">
            window.onload = function () {
                document.getElementById('contact-form').addEventListener('submit', function (event) {
                    event.preventDefault();
                    // generate a five digit number for the contact_number variable
                    this.contact_number.value = Math.random() * 100000 | 0;
                    // these IDs from the previous steps
                    emailjs.sendForm('contact_service', 'contact_form', this)
                            .then(function () {
                                console.log('SUCCESS!');
                            }, function (error) {
                                console.log('FAILED...', error);
                            });
                });
            }
        </script> 



        <style>
        </style>
    </head>
    <body>
        <main>
            <div class="page-content p-5" id="content">
                <div class="container">

                    <form id="contact-form">
                        <input type="hidden" name="contact_number">
                        <label>Name</label>
                        <input type="text" name="user_name">
                        <label>Email</label>
                        <input type="email" name="user_email">
                        <label>Message</label>
                        <textarea name="message"></textarea>
                        <input type="submit" value="Send">
                    </form>




                </div>
            </div>
        </main>
    </body>
</html>









<!--<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>
--!>