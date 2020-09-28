<?php
session_start();
include("../includes/header.php");
include("../includes/navbar.php");
include("../database/DB.php");

if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
    $id = $_GET['id'];
} else {
    $id = $_SESSION['id'];
}
$sql = "select * from notices where id = '$id'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$data = mysqli_fetch_assoc($result);

?>


<div class="row" style="margin: 5vh"></div>
<div class="container">
    <div class="col s12 m6 card-panel white hoverable">
        <div class="container">
            <h3 class="center"><?php echo $data['title']; ?></h3>
            <div class="row">
                <p><?php echo $data['content']; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin: 20vh"></div>

<?php
include("../includes/footer.php");
?>