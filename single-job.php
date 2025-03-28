<?php require_once("includes/header.php"); ?>

    <!-- Banner Section -->
    <section class="single-banner-area bg-white">
        <div class="container">
            <div class="single-page-banner">
                <h1 class="color-a title">Full Stack Developer</h1>
                <p><i>by Company X</i></p>
            </div>
        </div>
    </section>

    <!-- Job Listing Section -->
    <section class="job-listing-section single-job-page">
        <div class="container">

            <div class="flex jobs-container justify-between">

                <div class="single-job-box">
                    <div>
                        <h3>Job Description:</h3> <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum ex at pariatur molestiae cupiditate neque minus voluptate recusandae, cum nobis ullam necessitatibus corporis distinctio nisi iure expedita alias quae voluptatum.
                    </div> <br>
                    <ul class="flex">
                        <li><span>Deadline:</span> 23 April, 2025</li>
                        <li><span>Area:</span> Narayanganj, Dhaka</li>
                        <li><span>Salary:</span> Negotiable</li>
                        <li><span>Office Time:</span> 10:00 AM - 06:00 PM</li>
                        <li><span>Weekends:</span> 2 Days</li>
                    </ul> <br>

                    <div>
                        <div class="box-shadow contact-form">
                            <h3>Apply for the Job:</h3>
                            <div class="validation-errors"></div>
                            <form action="" class="main-contact-from">
                                <input type="text" data-name="Full Name" placeholder="Full Name" class="input" required>
                                <input type="email" data-name="Email" placeholder="Email" class="input" required>
                                <input type="text" data-name="Phone" placeholder="Phone" class="input" required>
                                <textarea cols="50" data-name="Cover Latter" rows="4" class="input" placeholder="Cover Latter" required></textarea>
                                <div>
                                    <input type="file" data-name="Phone" placeholder="Phone" class="input" required>
                                    <small>Upload your CV (Accept only PDF)</small>
                                    
                                </div>
                                <br>
                                <button type="submit" id="submit-form" class="button button-a">Apply</button>
                            </form>
                        </div>
                    </div> <br>

                </div>

            </div>

            

        </div>
    </section>

    
<?php require_once("includes/footer.php"); ?>
