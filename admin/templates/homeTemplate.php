<div class="container-fluid">

  <div class="row">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="border-right: 1px solid #ced4da;">

      <div class="position-sticky pt-3">

        <ul class="nav flex-column">

          <li class="nav-item">

          <?php

            if(isset($_SESSION['id'])) {  

                if($_SESSION['SP'] == 1) {

            ?>

            <a class="nav-link active" aria-current="page" href="add-admin.php">Ajouter un Administrateur</a>

            <br>

            <a class="nav-link active" aria-current="page" href="manage-admin.php">Gerez Les Administrateur</a>

            <br>

                


            <?php

            }

            ?>



            <a class="nav-link active" aria-current="page" href="add-item.php">Ajouter un produit</a>

                




            <?php
                    
            } 

            ?>

        </ul>

        
        
      </div>

    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="chartjs-size-monitor">
            
            <div class="chartjs-size-monitor-expand">
                
                <div class="">

                <?php require('options/' . $option . '.php'); ?>
                    
                </div>

            </div>

            <div class="chartjs-size-monitor-shrink">

                <div class="">

                <?php require('options/' . $option . '.php'); ?>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h1 class="h2">Dashboard</h1>


        </div>

        


    </main>

  </div>
  
</div>