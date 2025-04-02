<?php 
    require_once("includes/header.php"); 
    include('core/frontend_functions.php');
    if(!isset($_SESSION['auth_id'])) { 
        header("Location: sign-in.php");
    }
?>

    <section class="single-page bg-white">

        <div class="container">
            
        <?php if(isset($_GET['id_opned']) && $_GET['id_opned'] === 'true'){ ?> 
            <div class="success">Welcome to WUB Local Job Portal</div>
        <?php } 

        include("./includes/dashboard_menu.php");

        ?>
    <?php if($auth_user['role'] === 'Admin'){ ?> 
        <div>
            <h2>Admin Panel</h2>
            <br>
            <div class="flex dashboard-cards">
                <div class="card box-shadow">
                    <a href="all-jobs.php">
                        <h3>Total Jobs</h3>
                        <h3><?= count_data('jobs') ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="all-jobs.php">
                        <h3>Total Applicants</h3>
                        <h3><?= count_data('job_applications') ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="users.php">
                        <h3>Total Users</h3>
                        <h3><?= count_data('users') ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    
                    <a href="all-jobs.php?status=Approved">
                        <h3>Approved Jobs</h3>
                        <h3><?= count_data('jobs','status','Approved') ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="all-jobs.php?status=Pending">
                        <h3>Pendings Jobs</h3>
                        <h3><?= count_data('jobs','status','Pending') ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="all-jobs.php?status=Rejected">
                        <h3>Rejected Jobs</h3>
                        <h3><?= count_data('jobs','status','Rejected') ?></h3>
                    </a>
                </div>
            </div>
        </div>
        <br><br>
    <?php } ?>
        <div>
            <h2>My Dashboard</h2>
            <br>
            <div class="flex dashboard-cards">
                <div class="card box-shadow">
                    <a href="my-jobs.php">
                        <h3>My Jobs</h3>
                        <h3><?= count_data('jobs',0,0,$user_id) ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="my-jobs.php">
                        <h3>My Applicants</h3>
                        <h3><?= count_data('job_applications',0,0,$user_id,1) ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="my-jobs.php?status=Approved">
                        <h3>Approved Jobs</h3>
                        <h3><?= count_data('jobs','status','Approved',$user_id) ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="my-jobs.php?status=Pending">
                        <h3>Pendings Jobs</h3>
                        <h3><?= count_data('jobs','status','Pending',$user_id) ?></h3>
                    </a>
                </div>
                <div class="card box-shadow">
                    <a href="my-jobs.php?status=Rejected">
                        <h3>Rejected Jobs</h3>
                        <h3><?= count_data('jobs','status','Rejected',$user_id) ?></h3>
                    </a>
                </div>
            </div>
        </div>

        
            

            
            
        </div>
    </section>


<?php require_once("includes/footer.php"); ?>