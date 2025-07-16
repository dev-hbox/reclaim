 <!-- sidebar @s -->
 <div class="nk-sidebar is-light nk-sidebar-fixed is-light " data-content="sidebarMenu">
     <div class="nk-sidebar-element nk-sidebar-head">
         <div class="nk-sidebar-brand">
             <a href="{{ url('admin/dashboard') }}" class="logo-link nk-sidebar-logo">
                 <img class="logo-light logo-img" src="{{ asset('images/reclaim-logo.png') }}"
                     srcset="{{ asset('images/reclaim-logo.png 2x') }}" alt="logo">
                 <img class="logo-dark logo-img" src="{{ asset('images/reclaim-logo.png') }}"
                     srcset="{{ asset('images/reclaim-logo.png.png 2x') }}" alt="logo-dark">
                 <img class="logo-small logo-img logo-img-small" src="{{ asset('images/reclaim-logo.png') }}"
                     srcset="{{ asset('images/reclaim-logo.png 2x') }}" alt="logo-small">
             </a>
         </div>
         <div class="nk-menu-trigger me-n2">
             <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                     class="icon ni ni-arrow-left"></em></a>
         </div>
     </div><!-- .nk-sidebar-element -->
     <div class="nk-sidebar-element">
         <div class="nk-sidebar-content">
             <div class="nk-sidebar-menu" data-simplebar>
                 <ul class="nk-menu">
                     <li class="nk-menu-heading">
                         <h6 class="overline-title text-primary-alt">Dashboards</h6>
                     </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item">
                         <a href="{{ url('admin/dashboard') }}" class="nk-menu-link">
                             <span class="nk-menu-icon"><em class="icon ni ni-presentation"></em></span>
                             <span class="nk-menu-text">Dashboard</span>
                         </a>
                     </li><!-- .nk-menu-item -->
                     <li class="nk-menu-item has-sub">
                         <a href="#" class="nk-menu-link nk-menu-toggle">
                             <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                             <span class="nk-menu-text">User Management</span>
                         </a>
                         <ul class="nk-menu-sub">
                             <li class="nk-menu-item">
                                 <a href="{{ url('admin/users') }}" class="nk-menu-link"><span class="nk-menu-text">User
                                         List</span></a>
                             </li>

                         </ul><!-- .nk-menu-sub -->
                     </li><!-- .nk-menu-item -->

                     <li class="nk-menu-item">
                         <a href="{{ url('admin/affirmatives') }}" class="nk-menu-link">
                             <span class="nk-menu-icon">
                                 <em class="icon ni ni-text2"></em>

                             </span>
                             <span class="nk-menu-text">Daily Affirmations</span>
                         </a>
                     </li>

                     <li class="nk-menu-item">
                         <a href="{{ url('admin/questions') }}" class="nk-menu-link">
                             <span class="nk-menu-icon">
                                 <em class="icon ni ni-question"></em>
                             </span>
                             <span class="nk-menu-text">Questionnaire</span>
                         </a>
                     </li>

                     <li class="nk-menu-item">
                         <a href="{{ url('admin/lessons') }}" class="nk-menu-link">
                             <span class="nk-menu-icon">
                                 <em class="icon ni ni-layers"></em>
                             </span>
                             <span class="nk-menu-text">Lessons</span>
                         </a>
                     </li>


                     <li class="nk-menu-item has-sub">
                         <a href="#" class="nk-menu-link nk-menu-toggle">
                             <span class="nk-menu-icon"><em class="icon ni ni-share-alt"></em></span>
                             <span class="nk-menu-text">Community</span>
                         </a>
                         <ul class="nk-menu-sub">
                             <li class="nk-menu-item">
                                 <a href="{{ url('admin/posts') }}" class="nk-menu-link"><span class="nk-menu-text">All
                                         Posts</span></a>
                             </li>
                             <li class="nk-menu-item">
                                 <a href="{{ url('admin/reported-posts') }}" class="nk-menu-link"><span
                                         class="nk-menu-text">Report
                                         Posts</span></a>
                             </li>

                         </ul><!-- .nk-menu-sub -->
                     </li><!-- .nk-menu-item -->


                 </ul><!-- .nk-menu -->
             </div><!-- .nk-sidebar-menu -->
         </div><!-- .nk-sidebar-content -->
     </div><!-- .nk-sidebar-element -->
 </div>
 <!-- sidebar @e -->
