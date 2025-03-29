<?php 
    require_once("includes/header.php"); 
    if(!isset($_SESSION['auth_id'])) { 
        header("Location: sign-in.php");
    }    
?>

    <section class="single-page bg-white">

        <div class="container">
            
            <?php if(isset($_GET['id_opned']) && $_GET['id_opned'] === 'true'){ ?> 
            <div class="validation-errors success">Welcome to WUB Local Job Portal</div>
            <?php } ?>
            <div class="">
                <a href="my-jobs.php" class="button button-a">My Jobs</a>
                <a href="sign-up.html" class="button button-a">Applicants</a>
                <a href="logout.php" class="button button-a">Logout</a>
            </div>

          

            <div class="flex contact-box-container">
                <div class="w-60 contact-box ">
                    <div class="box-shadow contact-form">
                        <h3>Manage Jobs</h3>
                        <div class="table responsive-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th>Job Deadline</th>
                                        <th>Job Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Laravel Develoepr</td>
                                        <td>28 February, 2025</td>
                                        <td>40,000</td>
                                        <td>
                                            <button type="button" class="button button-a">View</button>
                                            <button type="button" class="button button-a">Edit</button>
                                            <button type="button" class="button button-a">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>UI/UX Designer</td>
                                        <td>20 January, 2025</td>
                                        <td>20,000</td>
                                        <td>
                                            <button type="button" class="button button-a">View</button>
                                            <button type="button" class="button button-a">Edit</button>
                                            <button type="button" class="button button-a">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                   
                </div>
                <div class="w-40 contact-box-right">
                    <div class="box-shadow contact-form">
                        <h3>List a New Job</h3>
                        <div class="validation-errors"></div>
                        <form action="" method="post" class="main-contact-from">
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" data-name="Job Title" placeholder="ex: Laravel Developer" class="input" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea cols="50" data-name="Job Description" rows="3" class="input" placeholder="" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Job Deadline</label>
                                <input type="date" data-name="Job Deadline" class="input">
                            </div>
                            <div class="form-group">
                                <label for="title">Job Area</label>
                                <textarea cols="50" rows="3" data-name="Job Area" class="input" placeholder="ex: Belly Tower, 5th Floor Chasara, Narayanganj, 1410" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Job Salary</label>
                                <input type="text" data-name="Job Salary" placeholder="ex: Negotiable/30,000 BDT" class="input" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Office Time</label>
                                <input type="text" data-name="Office Time" placeholder="ex: 10:00 AM - 06:00 PM" class="input" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Weekends</label>
                                <input type="text" data-name="Weekends" placeholder="ex: 2/3/4" class="input" required>
                            </div>
                            <button type="button" id="submit-form" class="button button-a">Post Job</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


<?php require_once("includes/footer.php"); ?>