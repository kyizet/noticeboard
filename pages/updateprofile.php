<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include("../includes/header.php");
include("../includes/navbar.php");
include($root . "/noticeboard/classes/users.php");
?>

<?php
$username = $_SESSION['username'];
$sql = "select name, username, password from users where username='$username';";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($result);
$user = new User($data['name'], $data['username'], $data['password']);
if(!empty($_POST)){
    $user->update($_POST['name'], $_POST['username'], $_POST['password']);
    $_SESSION['username'] = $_POST['username'];
}
?>

<div class="row" style="margin: 5vh"></div>
<div class="container">
    <div class="col s12 m6 card-panel white hoverable">
        <div class="container">
            <h3 class="center">Update Profile</h3>
            <div class="row">
                <?php if (!empty($_POST)) { ?>
                    <h6>Your profile has been updated</h6>
                <?php } else { ?>
                    <form class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="" id="name" type="text" class="validate" name="name" value="<?php echo $user->getData("name"); ?>">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input placeholder="" id="username" type="text" class="validate" name="username" value="<?php echo $user->getData("username"); ?>">
                                <label for="password">Username</label>
                            </div>
                            <div class="input-field col s12">
                                <input placeholder="" id="password" type="password" class="validate" name="password" value="<?php echo $user->getData("password"); ?>">
                                <label for="password">Password</label>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light black center" type="submit" name="action">Update
                                </button>
                            </div>
                            <div class="center red-text"><?php echo $_SESSION['error']; ?></div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
include("../includes/footer.php");
?>