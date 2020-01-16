<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/router.php');
    require_once(ROOT.'/components/Db.php');
    require_once(ROOT.'/components/Autoload.php');

    $test = new Router();

    $test->run();

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->


    <title>Test_01</title>

<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

</head>
<body>
</body>
</html>



<!-- RewriteCond %{REQUEST_URI} !^/template/ -->