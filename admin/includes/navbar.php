<nav>
  <div class="nav-wrapper black">
    <a href="/noticeboard/admin" class="brand-logo center">Admin</a>

    <?php
    if (isset($_SESSION['admin'])) {
    ?>
      <ul id="nav-mobile" class="left">
        <li><a href="/noticeboard/admin/pages/updatepassword.php"><i class="material-icons">person</i></a></li>
      </ul>
      <ul id="nav-mobile" class="right">
        <li><a href="/noticeboard/admin/pages/logout.php"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    <?php
    }
    ?>

  </div>
</nav>