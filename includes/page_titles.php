<?php 

if($page == 'index.php'){
    echo "Local Job Portal";
    
}elseif($page == 'about.php'){
    echo "About Us | Local Job Portal";

}elseif($page == 'jobs.php'){
    echo "Jobs | Local Job Portal";

}elseif($page == 'single-job.php'){
    if(isset($_GET['title'])){
        echo $_GET['title']." | Local Job Portal";
    }else{
        echo "View Job | Local Job Portal";
    }
    
}elseif($page == 'users.php'){
    echo "Manage Users | Local Job Portal";
    
}elseif($page == 'dashboard.php'){
    echo "Dashboard | Local Job Portal";

}elseif($page == 'all-jobs.php'){
    echo "All Jobs | Local Job Portal";

}elseif($page == 'my-jobs.php'){
    echo "My Job Portal | Local Job Portal";

}elseif($page == 'applicants.php'){
    echo "View Applicants | Local Job Portal";

}elseif($page == 'contact.php'){
    echo "Contact Us | Local Job Portal";

}elseif($page == 'sign-in.php'){
    echo "Sign In | Local Job Portal";

}elseif($page == 'sign-up.php'){
    echo "Sign Up | Local Job Portal";
}