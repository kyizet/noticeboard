<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "noticeboard");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
