<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("database/DB.php");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "select id from users where username = '$username';";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $uid = $data['id'];
    $sql1 = "select * from notices where uid='$uid';";
    $result1 = mysqli_query($connection, $sql1);
}


?>

<div class="row" style="margin: 5vh"></div>
<div class="container">
    <?php if (!isset($_SESSION['username'])) { ?>
        <div class="row">
            <div class="col s12 m6 card-panel white hoverable" style="height: 50vh;">
                <div class="container">
                    <h3 class="center">Register</h3>
                    <div class="row">
                        <form class="col s12 " method="POST" action="pages/register.php">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="" id="name" type="text" class="validate" name="name">
                                    <label for="name">Name</label>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="" id="username" type="text" class="validate" name="username">
                                    <label for="username">Username</label>
                                </div>


                                <div class="input-field col s12">
                                    <input placeholder="" id="password" type="password" class="validate" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="center">
                                    <button class="btn waves-effect waves-light black center" type="submit" name="action">Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 card-panel white hoverable" style="height: 50vh;">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="center red-text"><?php if (isset($_SESSION['error'])) {
                                            echo $_SESSION['error'];
                                        } ?></div>
    <?php } else {
    ?>
        <div class="row" style="margin: 5vh"></div>
        <div class="container">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4><?php echo $_SESSION['username']; ?></h4>
                </li>
                <?php while ($notice = mysqli_fetch_assoc($result1)) {
                ?>
                    <li class="collection-item"><a href="pages/noticedetail.php?id=<?php echo $notice['id']; ?>" class="black-text"><?php echo $notice['title']; ?></a></li>
                <?php
                } ?>
            </ul>
        <?php
    } ?>
        </div>
</div>

        <?php
        include("includes/footer.php");
        ?>