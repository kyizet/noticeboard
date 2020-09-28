<?php
session_start();
include("../includes/header.php");
include("../includes/navbar.php");
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/classes/admins.php");
?>

<?php
if (empty($_POST['password'])) {
    unset($_POST);
    $_SESSION['error'] = "Password is empty";
} else {
    $admin = new Admin($_SESSION['admin']);
    $admin->updatePassword($_POST['password']);
}
?>

<div class="row" style="margin: 5vh"></div>
<div class="container">
    <div class="col s12 m6 card-panel white hoverable">
        <div class="container">
            <h3 class="center">Update Password</h3>
            <div class="row">
                <?php if (!empty($_POST)) { ?>
                    <h6>Password has been updated</h6>
                <?php } else { ?>
                    <form class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="" id="password" type="password" class="validate" name="password">
                                <label for="password">New Password</label>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light black center" type="submit" name="action">Update Password
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
include("../includes/footer.php"); ?>