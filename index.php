<?php require_once("includes/header.php"); 
    include("./core/query_functions.php");
    $all_jobs = get_jobs([],6,'desc');
?>

    <!-- Banner Section -->
    <section class="banner-area ">
        <div class="container">
            <div class="banner-content content-center">
                <h1 class="color-a">Find your Dream Job</h1>
                <form action="jobs.php" method="get" class="job-serach-form flex align-center">
                    <input type="hidden" name="search" value="true">
                    <input type="text" name="title" class="input" placeholder="Search jobs..">
                    <button class="button button-a">Search</button>
                </form>
                
            </div>
        </div>
    </section>

    <!-- Job Listing Section -->
    <section class="job-listing-section">
        <div class="container">

            <div class="flex jobs-container <?= mysqli_num_rows($all_jobs) > 3 ? 'justify-between' : 'gap-x-3'  ?>">
                
                <?php while($all_job = mysqli_fetch_assoc($all_jobs)) { ?> 
                    <div class="job-box">
                        <a href="single-job.php?title=<?= $all_job['title'] ?>&id=<?= base64_encode($all_job['id']) ?>">
                            <h2 class="color-a"><?= $all_job['title'] ?></h2>
                            <small><i>by <?= $all_job['name'] ?></i></small>
                            <ul class="flex">
                                <li><span>Deadline:</span> <?= date('d M, Y',strtotime($all_job['deadline'])) ?></li>
                                <li><span>Area:</span> <?= $all_job['area'] ?></li>
                                <li><span>Salary:</span> <?= $all_job['salary'] ?></li>
                                <li><span>Office Time:</span> <?= $all_job['office_time'] ?></li>
                                <li><span>Weekends:</span> <?= $all_job['weekends'] ?> Day<?= $all_job['weekends'] > 1 ? 's' : '' ?></li>
                            </ul>
                        </a>
                    </div>
                <?php } ?>

            </div>
            <?php if(mysqli_num_rows($all_jobs) > 6){ ?> 
                <center><a href="jobs.php" class="button button-white"> View Full Listing</a></center>
            <?php } ?>

        </div>
    </section>

    
<?php 
    require_once("includes/job_listing_detail.php"); 
    require_once("includes/footer.php");

?>