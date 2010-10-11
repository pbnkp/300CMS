<?php

/////////////////////////////////////////
//                 NOTE                //
// MAKE SURE THE USERNAME AND PASSWORD //
// ARE SET IN plug.php IN YOUR 300CMS  //
//       INSTALLATION DIRECTORY!!      //
/////////////////////////////////////////

// INIT.
$file = $f;
$page = $p;

if (isset($_GET["edit"]) && $_GET["edit"]) {
  // ASK FOR USERNAME AND PASSWORD
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Welcome, admin."');
    header('HTTP/1.0 401 Unauthorized');
    exit;
  } else {
    if ($_SERVER['PHP_AUTH_USER'] != USERNAME || $_SERVER['PHP_AUTH_PW'] != PASSWORD) {
      header('HTTP/1.0 401 Unauthorized');
      die("Unauthorized");
    }
  }
}

if (isset($_GET["edit"]) && $_GET["edit"] == "1" && file_exists($file)) {

  if (isset($_GET["save"]) && $_GET["save"] == "1") {
    // First, check if POST is set
    if (!isset($_POST["editContent"]) || !isset($_POST["editFile"])) {
      $savingError = "editContent or editFile is not set in POST request.";
      ob_start();
        require("saveerror.php");
        $c = ob_get_contents();
      ob_end_clean();
    } else {    
      // Save
      file_put_contents("pages/" . $_POST["editFile"] . ".txt", $_POST["editContent"]);
      
      // Show confirmation
      ob_start();
        require("savecomplete.php");
        $c = ob_get_contents();
      ob_end_clean();
    }
  } else {
    // Show editor
    ob_start();
      require("editor.php");
      $c = ob_get_contents();
    ob_end_clean();
  }
}