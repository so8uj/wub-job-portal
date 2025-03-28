<?php require_once("includes/header.php"); ?>

    <section class="single-page bg-white">

        <div class="container">

            <h2 class="color-a title">Contact Us</h2>

            <div class="flex contact-box-container">
                <div class="w-40 contact-box ">
                    <div class="box-shadow contact-form">
                        <h3>Campus Location</h3>
                        <p><b>Address:</b> Avenue 6 & Lake Drive Road, Sector: 17/H, Uttara, Dhaka - 1230</p>
                        <p><b>Phone:</b> + 8809643204060, + 880196-9994555</p>
                        <p><b>E-mail:</b> info@wub.edu.bd</p>
                        <p><b>Web:</b> www.wub.edu.bd</p>
                    </div>
                   
                </div>
                <div class="w-60 contact-box-right">
                    <div class="box-shadow contact-form">
                        <h3>Leave us a Message</h3> 
                        <div class="validation-errors"></div>
                        <form action="" class="main-contact-from">
                            <input type="text" data-name="First Name" placeholder="First Name" class="input" required>
                            <input type="text" data-name="Last Name" placeholder="Last Name" class="input" required>
                            <input type="email" data-name="Email" placeholder="Email" class="input" required>
                            <input type="text" data-name="Phone" placeholder="Phone" class="input" required>
                            <textarea cols="50" data-name="Message" rows="4" class="input" placeholder="Message"></textarea>
                            <button type="button" id="submit-form"class="button button-a">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>


<?php 
    require_once("includes/job_listing_detail.php"); 
    require_once("includes/footer.php");

?>