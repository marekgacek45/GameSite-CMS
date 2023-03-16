<?php

require('includes/init.php');

Authentication::logout();

header('Location:index.php');

?>