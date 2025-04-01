<?php require_once("includes/header.php"); 

include("./core/query_functions.php");

    $filters=[];
    if(isset($_GET['search']) && $_GET['search'] === 'true'){
        if(isset($_GET['title']) && !empty($_GET['title'])){
            $filters['title'] = $_GET['title'];
        }
        if(isset($_GET['location']) && !empty($_GET['location'])){
            $filters['location'] = $_GET['location'];
        }
        if(isset($_GET['order_by']) && $_GET['order_by'] == 'oldest'){
            $all_jobs = get_jobs($filters,0,'oldest');
        }else{
            $all_jobs = get_jobs($filters,0,'latest');
        }
    }else{
        $all_jobs = get_jobs([],0,'latest');
    }

?>

    <!-- Banner Section -->
    <section class="single-banner-area bg-white">
        <div class="container">
            <div class="single-page-banner">
                <h1 class="color-a title">
                    <?= (isset($_GET['search']) && $_GET['search'] === 'true' && !empty($filters)) ? "Search Results" : "Get Your Best Job" ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Job Listing Section -->
    <section class="job-listing-section single-job-page">
        <div class="container">
            <form class="flex jobs-filters" method="get" action="<?= $_SERVER['PHP_SELF'] ?>">
                <input type="hidden" name="search" value="true">
                <input type="text" class="input" name="title" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>" placeholder="Search jobs..">
                <input type="text" class="input" name="location" value="<?= isset($_GET['location']) ? $_GET['location'] : '' ?>" placeholder="Location..">
                <select class="input" name="order_by">
                    <option value="latest">Order By</option>
                    <option value="latest">Latest First</option>
                    <option value="oldest">Oldest First</option>
                </select>
                <button class="button button-a">Search</button>
            </form>

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

            

        </div>
    </section>


<?php 
    require_once("includes/job_listing_detail.php"); 
    require_once("includes/footer.php");

?>