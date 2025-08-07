
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Upload
                </li>
            </ol>

            
            <?php 

            $users = new User();
            $all_users = $users->get_all_users();
            $get_one_user = $users->get_user_by_id(1);


            echo "<pre>";
                print_r($get_one_user);
            echo "</pre>";

            //var_dump($all_users);

            ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->