<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
        <!-- <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div> -->
        <div class="">
          <h2 style="color:rgb(175, 175, 175)"><?php echo $_SESSION['admin']['name'] ?></h2>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
  </div>
  <!-- search form (Optional) -->
  <form class="sidebar-form">
    <div class="input-group">
      <input type="text" id="search" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="button" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
      </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Menu -->
  <ul class="sidebar-menu" data-widget="tree" id="batches">


    <!-- Teachers tab -->
    

    <!-- Batch one -->
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>