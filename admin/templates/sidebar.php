<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <?php 


            $uri = $_SERVER['REQUEST_URI']; 
            $uriAr = explode("/", $uri);
            $page = end($uriAr);

          ?>


          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'kategori.php') ? 'active' : ''; ?>" href="kategori.php">
              <span class="fa fa-check-circle" aria-hidden="true"></span>
              Kategori
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'maps.php') ? 'active' : ''; ?>" href="maps.php">
              <span  class="fa fa-map"  aria-hidden="true"></span>
              Maps
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'setting.php') ? 'active' : ''; ?>" href="setting.php">
              <span class="fa fa-cog" aria-hidden="true"></span>
              Setting
            </a>
          </li>
        </ul>

       
      </div>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div> -->
      </div>