<?php 
session_start();
if(!isset($_SESSION["userid"]) && !isset($_SESSION["username"])){header("location:index");}
include_once 'classes/User.class.php';
include_once 'classes/Member.class.php';
include_once 'classes/Group.class.php';
include_once 'classes/Attendance.class.php';
include_once 'classes/Announcement.class.php';
include_once 'classes/Event.class.php';
include_once 'classes/Guest.class.php';
include_once 'classes/Family.class.php';
include_once "classes/Contribution.class.php";


$members = new Member();

$groups = new Group();

$events = new Event();

$announcements = new Announcement();

$contributions = new Contribution();

$families = new Family();

$users = new User();



?>        
        
        <meta charset="utf-8" />
        <title>Sunday | Church Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Church management system for all church solutions" name="description" />
        <meta content="KreateXtreme Web solutions" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">
        <script src="assets/libs/jquery/jquery.min.js"></script>