<?php 
include("includes/header.php");

if(isset($_POST['submit'])){
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $found_user = User::verify_user($username, $password);

    if($found_user){
        $session->login($found_user);
        Helper::redirect('index.php');
    }else{
        $massage = "Your username or password are incorrect!";
    }
}else{
    $username   = "";
    $password   = "";
    $massage    = "";
}
?>


<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php echo $massage; ?></h4>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="" value="<?php echo htmlentities($username)?>">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="" <?php echo htmlentities($password)?>>
        </div>

         <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
         </div>
    </form>
</div>
