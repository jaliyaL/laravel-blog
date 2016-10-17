  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->first_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
    
        <li {{ Request::is('admin') ? 'class=active' : '' }}>
           <a href="{{ route('admin.index') }}">
             <i class="fa fa-th"></i> <span>Blog</span>
           </a>
        </li>
      
        <li {{ Request::is('admin/blog/post*') ? 'class=active' : '' }}>
           <a href="{{ route('admin.blog.index') }}">
               <i class="fa fa-pie-chart"></i><span>Posts</span>
           </a>
        </li> 

        <li {{ Request::is('admin/blog/category') || Request::is('admin/blog/categories')  ? 'class=active' : '' }}>
            <a href="{{ route('admin.blog.categories') }}">
              <i class="fa fa-laptop"></i>Categories
            </a>
        </li> 

         <li {{ Request::is('gallery/list') || Request::is('gallery/list')  ? 'class=active' : '' }}>
            <a href="{{ route('gallery.view') }}">
              <i class="fa fa-laptop"></i>Image Gallery
            </a>
        </li> 

        <li {{ Request::is('admin/contact/*') ? 'class=active' : '' }}>
           <a href="">
              <i class="fa fa-envelope"></i> <span>Contact Messages</span>
          </a>
        </li> 
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
