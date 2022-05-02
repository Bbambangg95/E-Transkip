<?php
if(isset($_POST['search']))
{
  $valueToSearch = $_POST['valueToSearch'];
   // search data in all table columns
  $query = "SELECT * FROM `data_nisn`WHERE CONCAT(`id`, `nisn`, `nama`, `tahun_masuk`)  LIKE '%".$valueToSearch."%' ";
  $search_result = filterTable($query);
  $nisn='nisn'; 
}
 else {
  $query = "SELECT * FROM `data_nisn`";
  $search_result = filterTable($query);
  $nisn='nisn'; 
}

// function to connect with Mysql database and execute

//the query

function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "","db_transkip");
  $filter_Result = mysqli_query($connect,$query);
  return $filter_Result;
}
?>



<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Users list - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />
    <!-- CSS, JS, JQuery Datatables-->
    <script src="DataTables/jquery-3.3.1.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>

  </head>

  <body class="antialiased">
  <div class="wrapper">
  <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <svg class="navbar-brand-image" width="350" height="50" alt="Tabler" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1799.21 190"><defs><style>.cls-1{fill:#206bc4;}.cls-2{fill:#fff;}</style></defs><rect class="cls-1" width="549" height="190"/><path class="cls-2" d="M151.24,566.28c1.13,8.57,10.74,14.29,22.52,14.29,12.38,0,20.43-5.54,20.43-13.08,0-6.92-5.28-10.3-19.48-13.25L158.34,551c-23-4.42-34.9-16.88-34.9-35.85,0-24.25,20.79-39.83,49.71-39.83,31.26,0,49.7,15.15,50,38.62H193.93c-.6-9.09-9-14.55-20.43-14.55-11.09,0-18.45,5-18.45,12.64,0,6.76,5.54,10.48,18.62,13.17l16.19,3c24.68,4.76,35.76,15.93,35.76,35.67,0,24.86-20.52,40.7-52.73,40.7-31.87,0-51.52-14.11-51.87-38.36Z" transform="translate(-60 -445)"/><path class="cls-2" d="M367.45,602.48v-78h-.61l-30.91,76.72H317.74l-30.82-76.72h-.7v78h-28v-125H295l31.52,80.28h.69l31.52-80.28h36.72v125Z" transform="translate(-60 -445)"/><path class="cls-2" d="M506.33,575H465.46l-8,27.45H425.1l42-125H506l42,125H514.21ZM471.6,552.17h28.49L486.24,504h-.69Z" transform="translate(-60 -445)"/><path class="cls-1" d="M734.29,483.19c22.23,0,37.64,15.1,37.64,37.41S756.05,558,733.44,558H715.61a4.78,4.78,0,0,0-4.79,4.79v27.36A4.79,4.79,0,0,1,706,595h-10.4a4.78,4.78,0,0,1-4.79-4.79V488a4.78,4.78,0,0,1,4.79-4.79Zm-23.47,53.92a4.79,4.79,0,0,0,4.79,4.79h13.33c14.33,0,22.7-7.75,22.7-21.3s-8.29-21.07-22.62-21.07H715.61a4.79,4.79,0,0,0-4.79,4.79Zm79.07-53.92h9.71a4.79,4.79,0,0,1,4.79,4.79V590.16A4.79,4.79,0,0,1,799.6,595h-9.71a4.79,4.79,0,0,1-4.79-4.79V488A4.79,4.79,0,0,1,789.89,483.19ZM888.83,595h-9a4.78,4.78,0,0,1-4.79-4.79V580.7h-.39c-4.34,10-12.62,15.72-25.09,15.72-17.82,0-29.13-11.54-29.13-30.51V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.8,4.8,0,0,1,4.79,4.79V562c0,11.77,5.73,18.12,16.57,18.12,11.16,0,18.05-7.9,18.05-19.83V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.8,4.8,0,0,1,4.79,4.79v72.52A4.79,4.79,0,0,1,888.83,595Zm52.27-83.8c16.64,0,28.67,7.72,31.95,19.59a4.76,4.76,0,0,1-4.64,6H959.8a4.89,4.89,0,0,1-4.55-3.29c-1.87-5.09-7-8.1-14.54-8.1-8.52,0-14.09,4-14.09,10,0,4.65,3.72,7.75,11.77,9.69L953,548.25c16.42,3.87,22.85,10.22,22.85,22.38,0,15.49-14.33,26-35.09,26-17.68,0-29.83-7.53-33.75-19.52a4.79,4.79,0,0,1,4.56-6.27h9.5a4.77,4.77,0,0,1,4.46,3.08c2.14,5.56,7.6,8.61,15.93,8.61,9.37,0,15.18-3.79,15.18-9.91,0-4.8-3-7.36-11-9.37l-14.95-3.49c-15.18-3.56-22.85-11.46-22.85-23.31C907.87,521.37,921.12,511.15,941.1,511.15Zm80.79,79V488a4.79,4.79,0,0,1,4.79-4.79h41.61c20.29,0,33.38,10.92,33.38,27.88,0,12-8.91,22.46-20.37,24.32V536c15.18,1.47,25.79,12.39,25.79,27.19,0,19.67-14.48,31.75-38.34,31.75h-42.07A4.79,4.79,0,0,1,1021.89,590.16Zm20-64.67a4.79,4.79,0,0,0,4.79,4.79h13.48c13.95,0,21.77-5.89,21.77-16.27,0-9.76-6.74-15.25-18.67-15.25h-16.58a4.78,4.78,0,0,0-4.79,4.79Zm22.3,53.89c14.72,0,22.54-6.11,22.54-17.58s-8-17.35-23.39-17.35h-16.66a4.79,4.79,0,0,0-4.79,4.79v25.35a4.78,4.78,0,0,0,4.79,4.79Zm52-7.9c0-14.56,11.23-23.31,31.21-24.55l17.17-1a4.78,4.78,0,0,0,4.52-4.78v-1.36c0-8.6-5.81-13.56-15.34-13.56-7.74,0-13.1,3.17-15.3,8.29a4.84,4.84,0,0,1-4.42,2.94h-8.69a4.8,4.8,0,0,1-4.6-6.17c3.61-12,15.81-20.16,33.79-20.16,20.37,0,33.61,10.76,33.61,27.26v51.75a4.78,4.78,0,0,1-4.79,4.79h-9a4.79,4.79,0,0,1-4.79-4.79v-8.3h-.38c-4.73,8.91-15,14.41-25.56,14.41C1127.7,596.27,1116.16,586.28,1116.16,571.48Zm52.9-7v-1.18a4.79,4.79,0,0,0-5.08-4.78l-13.9.85c-9.29.62-14.64,4.8-14.64,11.31,0,6.74,5.58,11,14,11C1160.31,581.71,1169.06,574.43,1169.06,564.51Zm39.88-81.32h9.47a4.78,4.78,0,0,1,4.79,4.79v39h.39c4.42-10,13.48-15.65,26-15.65,18.12,0,28.73,11.93,28.73,30.75v48.11a4.78,4.78,0,0,1-4.79,4.79h-9.7a4.78,4.78,0,0,1-4.79-4.79V546c0-11.46-5.73-18.35-16.89-18.35-11.62,0-18.66,8.05-18.66,20.13v42.38a4.79,4.79,0,0,1-4.79,4.79h-9.71a4.79,4.79,0,0,1-4.79-4.79V488A4.79,4.79,0,0,1,1208.94,483.19Zm89.54,29.66h8.93a4.79,4.79,0,0,1,4.79,4.79v9.54h.39c2.79-10,10-15.72,19.67-15.72.59,0,1.15,0,1.7.07a4.76,4.76,0,0,1,4.34,4.77v7.6a4.77,4.77,0,0,1-5.12,4.78c-.86-.07-1.77-.1-2.7-.1-10.92,0-17.5,7-17.5,18.58v43a4.79,4.79,0,0,1-4.79,4.79h-9.71a4.79,4.79,0,0,1-4.79-4.79V517.64A4.8,4.8,0,0,1,1298.48,512.85ZM1416.24,595h-9a4.78,4.78,0,0,1-4.79-4.79V580.7h-.39c-4.34,10-12.62,15.72-25.09,15.72-17.82,0-29.13-11.54-29.13-30.51V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.79,4.79,0,0,1,4.79,4.79V562c0,11.77,5.73,18.12,16.58,18.12,11.15,0,18-7.9,18-19.83V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.8,4.8,0,0,1,4.79,4.79v72.52A4.79,4.79,0,0,1,1416.24,595Zm25.85-111.76h9.7a4.78,4.78,0,0,1,4.79,4.79V590.16a4.78,4.78,0,0,1-4.79,4.79h-9.7a4.78,4.78,0,0,1-4.79-4.79V488A4.78,4.78,0,0,1,1442.09,483.19Zm84.59,70.56c0,15.26,9.38,25.63,26,25.63s26-10.37,26-25.63V488a4.78,4.78,0,0,1,4.79-4.79h10.32a4.78,4.78,0,0,1,4.79,4.79v67.55c0,24.4-17.58,41.28-45.93,41.28s-45.93-16.88-45.93-41.28V488a4.79,4.79,0,0,1,4.79-4.79h10.4a4.78,4.78,0,0,1,4.79,4.79Zm95-70.56h9.71a4.79,4.79,0,0,1,4.79,4.79V590.16a4.79,4.79,0,0,1-4.79,4.79h-9.71a4.79,4.79,0,0,1-4.79-4.79V488A4.79,4.79,0,0,1,1621.71,483.19ZM1720.65,595h-9a4.78,4.78,0,0,1-4.79-4.79V580.7h-.39c-4.34,10-12.62,15.72-25.09,15.72-17.82,0-29.13-11.54-29.13-30.51V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.79,4.79,0,0,1,4.79,4.79V562c0,11.77,5.73,18.12,16.58,18.12,11.15,0,18-7.9,18-19.83V517.64a4.8,4.8,0,0,1,4.79-4.79h9.71a4.8,4.8,0,0,1,4.79,4.79v72.52A4.79,4.79,0,0,1,1720.65,595Zm25.31-82.1h8.93a4.8,4.8,0,0,1,4.79,4.79v9.46h.38c3.57-9.52,12.24-15.8,23.4-15.8,11.61,0,19.9,6,22.92,16.5h.47c4-10.15,13.71-16.5,25.56-16.5,16.18,0,26.8,10.92,26.8,27.34v51.52a4.79,4.79,0,0,1-4.8,4.79h-9.7a4.78,4.78,0,0,1-4.79-4.79V543.37c0-10.07-5.27-15.8-14.72-15.8-9.29,0-15.64,6.81-15.64,16.65v45.94a4.79,4.79,0,0,1-4.79,4.79h-9.17a4.79,4.79,0,0,1-4.79-4.79v-47.8c0-9.14-5.57-14.79-14.56-14.79-9.29,0-15.8,7.2-15.8,17.12v45.47a4.78,4.78,0,0,1-4.79,4.79H1746a4.78,4.78,0,0,1-4.79-4.79V517.64A4.79,4.79,0,0,1,1746,512.85Z" transform="translate(-60 -445)"/></svg>
             </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span class="badge bg-red"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image:">img</span>
                <div class="d-none d-xl-block ps-2">
                  <div>Hi,<?php echo htmlspecialchars($_SESSION["username"]); ?></div>
                  <div class="mt-1 small text-muted">Administrator</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Profil</a>
                <a href="../reset-password.php" class="dropdown-item">Reset Password</a>
                <a href="../logout.php" class="dropdown-item">Keluar</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="./index.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="./users.php"" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Daftar Siswa
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./form-elements.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Input Data
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./empty.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Extra
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="page-wrapper">
                <div class="container-xl">
                <form action="test_filter.php" method="post" >
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">Daftar Siswa</h2>
                            <div class="text-muted mt-1"></div>
                        </div>
                        <!-- Page title actions -->
                          <div class="col-2">
                                  <select id='searchByGender' name="valueToSearch" class="form-select d-inline-block w-9 me-3 text-muted">
                                    <option value="">Tahun Masuk</option>
                                    <option value="2025" >2025</option>
                                    <option value="2024" >2024</option>
                                    <option value="2023" >2023</option>
                                    <option value="2021" >2021</option>
                                    <option value="2020" >2020</option>
                                    <option value="2019" >2019</option>    
                                    <option value="2018" >2018</option>
                                    <option value="2017" >2017</option>
                                  </select>
                          </div>
                          <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <input type="submit" name="search" value="Filter" class="form-control d-inline-block w-9 me-3" placeholder="Search user…" />
                            </div>
                          </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row row-cards">    
                      <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">
                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Nisn</th>
                                <th>Nis</th>
                                <th>Tahun Masuk</th>
                                <th class="w-1 text-center">Opsi</th>
                              </tr>
                            </thead>
                            <?php while($row = mysqli_fetch_array($search_result)):?>
                            <tbody>
                              <tr>
                                <td><?php echo $row['nama'];?></td>
                                <td class="text-muted"><?php echo $row['nisn'];?></td>
                                <td class="text-muted"><a href="#" class="text-reset"><?php echo $row['nis'];?></a></td>
                                <td class="text-muted"><?php echo $row['tahun_masuk'];?></td>
                                <td>
                                <div class="d-flex">
                                  <a href=" tables.php?nisn=<?php echo $row['nisn']; ?>" class="btn me-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square me-2 text-muted" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                  Nilai</a>
                                  <a href="pdf_viewer.php?nisn=<?php echo $row['nisn']; ?>" class="btn me-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer me-2 text-muted" viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                        </svg>
                                  Print</a>
                                  <a href="delete.php?nisn=<?php echo $row['nisn']; ?>" class="btn">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash me-2 text-muted" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                  Hapus</a>
                                </div>
                                </td>
                              </tr>
                          <?php endwhile;?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      </div>      
                    
                  </div>
                </div>
                </div>
                </form>
                
      </div>
        
                      
</div>
<script src="./dist/js/tabler.min.js"></script>
 </body>

</html>