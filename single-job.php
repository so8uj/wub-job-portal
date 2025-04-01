<?php 
    require_once("includes/header.php"); 
    include("./core/query_functions.php");
    $id = isset($_GET['id']) ? base64_decode($_GET['id']) : header("Location: index.php");
    $get_single_job = get_single_job($id);
    $count_job = mysqli_num_rows($get_single_job);
    $single_job = $count_job > 0 ? mysqli_fetch_assoc($get_single_job) : [];
    
?>
    <?php if($count_job > 0){ ?> 

        <!-- Banner Section -->
        <section class="single-banner-area bg-white">
            <div class="container">
                <div class="single-page-banner">
                    <h1 class="color-a title"><?= $single_job['title'] ?></h1>
                    <p><i>by <?= $single_job['name'] ?></i></p>
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
                            <?= $single_job['description'] ?>
                        </div> <br>
                        <ul class="flex">
                            <li><span>Deadline:</span> <?= date('d M, Y',strtotime($single_job['deadline'])) ?></li>
                            <li><span>Area:</span> <?= $single_job['area'] ?></li>
                            <li><span>Salary:</span> <?= $single_job['salary'] ?></li>
                            <li><span>Office Time:</span> <?= $single_job['office_time'] ?></li>
                            <li><span>Weekends:</span> <?= $single_job['weekends'] ?> Day<?= $single_job['weekends'] > 1 ? 's' : '' ?></li>
                        </ul> <br>

                        <div>
                            <div class="box-shadow contact-form">
                                <?php if($single_job['deadline'] < date("Y-m-d")){ ?>
                                    <h3>Sorry Deadline wwas <?= date('d M, Y',strtotime($single_job['deadline'])) ?></h3>
                                <?php }else{ ?>
                                    <h3>Apply for the Job:</h3>
                                    <div class="validation-errors"></div>

                                    <?php if(isset($_GET['success'])){ ?> 
                                        <div class="success"><?= isset($_GET['success']) ? $_GET['success'] : '' ?></div>
                                    <?php } if(isset($_GET['error'])){ ?> 
                                        <div class="invalid"><?= isset($_GET['error']) ? $_GET['error'] : '' ?></div>
                                    <?php } ?>

                                    <form action="./core/job_application.php" method="post" enctype="multipart/form-data" class="main-contact-from">
                                        <input type="hidden" name="job_id" value="<?= $single_job['id'] ?>">
                                        <input type="hidden" name="title" value="<?= $single_job['title'] ?>">
                                        <input type="text" data-name="Full Name" placeholder="Full Name" class="input" name="name" required>
                                        <input type="email" data-name="Email" placeholder="Email" class="input" name="email" required>
                                        <input type="text" data-name="Phone" placeholder="Phone" class="input" name="phone" required>
                                        <textarea cols="50" data-name="Cover Latter" rows="4" class="input" placeholder="Cover Latter" name="cover_latter" required></textarea>
                                        <div>
                                            <input type="file" data-name="Phone" class="input" name="cv" required>
                                            <small>Upload your CV (Accept only PDF)</small>
                                        </div>
                                        <br>
                                        <button type="button" id="submit-form" class="button button-a">Apply</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div> <br>

                    </div>

                </div>

                

            </div>
        </section>

    <?php }else{ ?> 
        <!-- Banner Section -->
        <section class="single-banner-area bg-white">
            <div class="container">
                <div class="single-page-banner">
                    <h1 class="color-a title">No Job Found!</h1> <br>
                    <a href="jobs.php" class="button button-a">Go to Jobs Page</a>
                </div>
            </div>
        </section>
    <?php } ?>
    
<?php require_once("includes/footer.php"); ?>
