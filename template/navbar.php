<div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav class="navbar navbar-inverse ">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <a class="navbar-brand" href="./">Polling System</a>
                          </div>
                          <!-- <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                              </ul>
                            </li>
                            <li><a href="#">Page 2</a></li>
                          </ul> -->
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="./profile.php?id=<?php  echo $_COOKIE["Id"]; ?>">
                            <span class="glyphicon glyphicon-user">
                            </span> <?php echo $_COOKIE["FullName"];?></a>
                            </li>
                            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                          </ul>
                        </div>
                      </nav>
                </div>
            </div>  
        </div>

        <div class="container">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

              <?php 
              include_once("./template/sidebar.php");
              ?>


              <div style="margin-left: 220px;">



        
        