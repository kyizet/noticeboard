<?php
session_start();
include("../includes/header.php");
include("../includes/navbar.php");
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/classes/users.php");

if(isset($_GET['uid'])){
    $_SESSION['uid'] = $_GET['uid'];
    $id = $_SESSION['uid'];
} else {
    $id = $_SESSION['uid'];
}
$sql = "select * from users where id='$id';";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($result);

$sql1 = "select * from notices where uid='$id';";
$result1 = mysqli_query($connection, $sql1);

if(!empty($_POST)){
    $isActive = $_POST['isActive'];
    if($isActive==1){
        $sql = "update users
                set isActive = 0
                where id='$id';";
    } else {
        $sql = "update users
                set isActive = 1
                where id='$id';";
    }
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}
?>

<div class="row" style="margin: 5vh"></div>
<div class="container">
    <ul class="collection with-header">
        <li class="collection-header">
            <h4><?php echo $data['username']; ?></h4>
            <h6>Active: <?php
                        if ($data['isActive'] == 1) {
                            echo "Yes";
                        } else {
                            echo "No";
                        } ?></h6>
            <form method="POST" action="./changeActive.php">
                        <input value="<?php echo $data['isActive']; ?>" type="hidden" name="isActive">
                <button class="btn waves-effect waves-light black center" type="submit" name="action">Change active status
                </button>
            </form>
        </li>
        <?php while ($notice = mysqli_fetch_assoc($result1)) {
        ?>
            <li class="collection-item"><a href="./updatenotice.php?id=<?php echo $notice['id']; ?>" class="black-text"><?php echo $notice['title']; ?></a></li>
        <?php
        } ?>
    </ul>
    <div class="center"><a class="waves-effect waves-light btn black" href="./addnotice.php?uid=<?php echo $id; ?>">Add notice</a></div>


</div>
<?php
include("../includes/footer.php"); ?>