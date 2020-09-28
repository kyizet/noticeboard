<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("../classes/users.php");
$sql = "select * from users";
$result = mysqli_query($connection, $sql);
?>

<div class="row" style="margin: 5vh"></div>
<div class="container">
    <?php if (!isset($_SESSION['admin'])) { ?>
        <div class="col s12 m6 card-panel white hoverable">
            <div class="container">
                <h3 class="center">Login</h3>
                <div class="row">
                    <form class="col s12" method="POST" action="pages/login.php">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="" id="username" type="text" class="validate" name="username">
                                <label for="username">Username</label>
                            </div>


                            <div class="input-field col s12">
                                <input placeholder="" id="password" type="password" class="validate" name="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light black center" type="submit" name="action">Login
                                </button>
                            </div>
                            <div class="center red-text"><?php if (isset($_SESSION['error'])) {
                                                                echo $_SESSION['error'];
                                                            } ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<?php } else { ?>
    <ul class="collection with-header">
        <li class="collection-header"><h4>Registered Users (Total - <?php echo mysqli_num_rows($result); ?>)</h4></li>
        <?php while($data = mysqli_fetch_assoc($result)){
            ?>
            <li class="collection-item"><a href="pages/notices.php?uid=<?php echo $data['id']; ?>" class="black-text"><?php echo $data['username']; ?></a></li>
        <?php }?>
      </ul>

<?php } ?>
</div>

<?php
include("includes/footer.php"); ?>