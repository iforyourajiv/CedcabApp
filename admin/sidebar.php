<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin</title>
      <link href="../assets/styles/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   </head>
   <body>
      <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
         data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <aside class="left-sidebar" id="leftSidebar" data-sidebarbg="skin6">
         <div class="scroll-sidebar">
            <nav class="sidebar-nav">
               <ul id="sidebarnav">
                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php"
                        aria-expanded="false">
                     <span class="hide-menu font-24">Dashboard</span>
                     </a>
                  </li>
                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false">
                     <i class="fa fa-car" aria-hidden="true"></i>
                     <span class="hide-menu font-18 text-dark">Rides</span>
                     </a>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="rideRequest.php"
                        aria-expanded="false">
                     <i class="fa fa-list-ul" aria-hidden="true"></i>
                     <span class="hide-menu">Pending Rides</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="pastRides.php"
                        aria-expanded="false">
                     <i class="fa fa-check" aria-hidden="true"></i>
                     <span class="hide-menu">Completed Rides</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="canceledRides.php"
                        aria-expanded="false">
                     <i class="fa fa-window-close" aria-hidden="true"></i>
                     <span class="hide-menu">Cancelled Rides</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="allRides.php"
                        aria-expanded="false">
                     <i class="fa fa-globe" aria-hidden="true"></i>
                     <span class="hide-menu">All Rides</span>
                     </a>
                  </li>
                  </li>
                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false">
                     <i class="fa fa-location-arrow" aria-hidden="true"></i>
                     <span class="hide-menu font-18 text-dark">Manage Location</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="manageLocation.php"
                        aria-expanded="false">
                     <i class="fa fa-compass" aria-hidden="true"></i>
                     <span class="hide-menu">Location List</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="addLocation.php"
                        aria-expanded="false">
                     <i class="fa fa-plus" aria-hidden="true"></i>
                     <span class="hide-menu">Add New Location</span>
                     </a>
                  </li>
                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false">
                     <i class="fa fa-users" aria-hidden="true"></i>
                     <span class="hide-menu font-18 text-dark">Manage User
                     </span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="pendingUser.php"
                        aria-expanded="false">
                     <i class="fa fa-user-times" aria-hidden="true"></i>
                     <span class="hide-menu">Pending User request</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="approvedUser.php"
                        aria-expanded="false">
                     <i class="fa fa-user" aria-hidden="true"></i>
                     <span class="hide-menu">Approved User Request</span>
                     </a>
                  </li>
                  <li class="sidebar-item ml-1">
                     <a class="sidebar-link" href="allUser.php"
                        aria-expanded="false">
                     <i class="fa fa-users" aria-hidden="true"></i>
                     <span class="hide-menu">All User</span>
                     </a>
                  </li>
                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="invoiceTable.php"
                        aria-expanded="false">
                     <i class="fa fa-table" aria-hidden="true"></i>
                     <span class="hide-menu font-18 text-dark">Invoice</span>
                     </a>
                  </li>

                  <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="changePassword.php"
                        aria-expanded="false">
                     <i class="fa fa-key" aria-hidden="true"></i>
                     <span class="hide-menu font-18 text-dark">Change Password</span>
                     </a>
                  </li>
                  <li class="text-center p-20 upgrade-btn">
                     <a href="../logout.php"
                        class="btn btn-block btn-danger text-white">
                     Logout</a>
                  </li>
                  <li class="text-center p-20 upgrade-btn">
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
      <div class="page-wrapper">
      <div id="seconddiv"  class="page-breadcrumb bg-white">
         <div  class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
               <img class="img-responsive" src="../assets/images/logo.png" height="5%" width="50%" />
               <h3 class="page-title text-uppercase font-medium font-25">Welcome Admin</h3>
            </div>
         </div>
      </div>
