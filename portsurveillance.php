<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="9.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lneta馆</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            send();
        });
        function send(){
            $.ajax({
                url: "php/getsurveillance.php",
                type: 'POST',
                timeout: 7000,
                error: function () {
                    alert("发生错误");
                },
                success: function (data) {
                    $('#log').html(data);
                }
            });
        }
    </script>
    <base target="_blank">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div id="log">
        </div>
    </div>

</body>

</html>