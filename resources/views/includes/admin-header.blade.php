<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li {{ Request::is('admin') ? 'class=active' : '' }}><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li {{ Request::is('admin/blog/post*') ? 'class=active' : '' }}><a href="{{ route('admin.blog.index') }}">Posts</a></li> 
      <li {{ Request::is('admin/blog/category') || Request::is('admin/blog/categories')  ? 'class=active' : '' }}><a href="{{ route('admin.blog.categories') }}">Categories</a></li> 
      <li {{ Request::is('admin/contact/*') ? 'class=active' : '' }}><a href="">Contact Messages</a></li> 
      <li><a href="">Logout</a></li> 
    </ul>
  </div>
</nav>