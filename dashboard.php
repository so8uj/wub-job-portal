<?php 
    require_once("includes/header.php"); 
    include('core/frontend_functions.php');
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
                    <h3>Total Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Total Applicants</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Total Users</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Approved Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Pendings Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Rejected Jobs</h3>
                    <h3>5</h3>
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
                    <h3>My Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>My Applicants</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Approved Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Pendings Jobs</h3>
                    <h3>5</h3>
                </div>
                <div class="card box-shadow">
                    <h3>Rejected Jobs</h3>
                    <h3>5</h3>
                </div>
            </div>
        </div>

        
            

            
            
        </div>
    </section>


<?php require_once("includes/footer.php"); ?>