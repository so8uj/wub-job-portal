<div class="dashboard-menu">
    <a href="dashboard.php" class="button button-a <?= $page == 'dashboard.php' ? 'active' : ''  ?>">Dashboard</a>
    <?php if($auth_user['role'] === 'Admin'){ ?> 
    <a href="all-jobs.php" class="button button-a <?= $page == 'all-jobs.php' ? 'active' : ''  ?>">All Jobs</a>
    <?php } ?>
    <a href="my-jobs.php" class="button button-a <?= $page == 'my-jobs.php' ? 'active' : ''  ?>">My Jobs</a>
    <a href="#" class="button button-a">Applicants</a>
    <a href="logout.php" class="button button-a">Logout</a>
</div>