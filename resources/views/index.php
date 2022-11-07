<?php

use App\Controllers\HomeController;

    $home = new HomeController();
    // $home->success();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS & Inventory System</title>

    <link rel="stylesheet" type="text/css" href="resources/plugins/jquery.toast/jquery.toast.min.css" />
</head>
<body>
    <h1>POS System</h1>

    <script type="text/javascript" src="resources/js/jquery.js"></script>
    <script type="text/javascript" src="resources/plugins/jquery.toast/jquery.toast.min.js"></script>

    <script>
        $(document).ready(function () {
            $.toast({
                heading: 'Success',
                text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
                showHideTransition: 'slide',
                icon: 'success'
            })
        });
    </script>
</body>
</html>