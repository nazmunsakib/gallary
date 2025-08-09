
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


            $all_users = User::get_all_users();
            $get_one_user = User::get_user_by_id(1);



            foreach($all_users as $user){
                echo $user->username . '<br>';
            }
            echo "<pre>";
                print_r($all_users);
            echo "</pre>";

            var_dump($all_users);

            ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->