<?php 
require 'db.php';
include 'User.php';
$data=$user->user_type($_SESSION['id']);
if($data=="admin"){
?>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- User profile -->
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
            <a class=" waves-effect waves" href="dashboard">
            <i class="mdi mdi-gauge"></i>Dashboard</a>
            </li>
            <li>
            <a id="link" class="waves-effect waves" href="?action=app_first" style="">
            <i id="icon" class="fa fa-android"></i>App First Screen</a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
    <!-- End Sidebar scroll-->
</aside>
<?php
}else if($data="user"){
    ?>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- User profile -->
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
            <a id="link" class="waves-effect waves" href="#" style="">
            <i id="icon" class="fa fa-android"></i>App First Screen</a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
    <!-- End Sidebar scroll-->
</aside>
    <?php
}
?>
<style type="text/css">
    i#icon{
        color: #009966;
    }
    i#icon:hover{
        color: #fff;
    }
    a#link{
        background: white;
        color: #009966;
    }
    a#link:hover{
        cursor: pointer;
        background: #009966;
        color: #fff;
    }
</style>

        