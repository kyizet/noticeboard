<nav>
  <div class="nav-wrapper black">
    <a href="/noticeboard" class="brand-logo center">Notice Board</a>

    <?php
    if (isset($_SESSION['username'])) {
    ?>
      <ul id="nav-mobile" class="left">
        <li><a href="/noticeboard/pages/updateprofile.php"><i class="material-icons">person</i></a></li>
      </ul>
      <ul id="nav-mobile" class="right">
        <li><a href="/noticeboard/pages/logout.php"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    <?php
    }
    ?>

  </div>
</nav>