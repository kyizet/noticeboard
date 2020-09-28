<?php
session_start();
include("../includes/header.php");
include("../includes/navbar.php");
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . "/noticeboard/classes/notices.php");



if (!empty($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $uid = $_SESSION['uid'];
    $notice = new Notice($title, $content);
    $notice->add($uid);
}

?>
<div class="row" style="margin: 5vh"></div>
<div class="container">
    <div class="col s12 m6 card-panel white hoverable">
        <div class="container">
            <h5 class="center">Add new notice for the user</h5>
            <div class="row">
                <?php if (!empty($_POST)) { ?>
                    <h6>Notice added.</h6>
                    <div class="center"><a class="waves-effect waves-light btn black" href="./notices.php?uid=<?php echo $uid; ?>">Back</a></div>
                <?php } else { ?>
                    <form class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="" id="username" type="text" class="validate" name="title">
                                <label for="title">Title</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="content" class="materialize-textarea" name="content"></textarea>
                                <label for="content">Content</label>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light black center" type="submit" name="action">Add
                                </button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
include("../includes/footer.php"); ?>