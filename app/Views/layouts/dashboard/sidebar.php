   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-lightbulb"></i>
           </div>
           <div class="sidebar-brand-text mx-3">EduSiber</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url('/dashboard') ?>">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <hr class="sidebar-divider my-0">
       <!-- Nav Item - Dashboard -->
       <?php if (in_groups('admin')) : ?>
           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('/users') ?>">
                   <i class="fas fa-solid fa-users"></i>
                   <span>Users List</span></a>
           </li>
       <?php endif; ?>


       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->