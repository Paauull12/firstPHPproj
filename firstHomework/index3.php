<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="index3.php" method="POST">
        <button type="submit">Start</button>
    </form>

</body>
</html>

<?php

    function functie($a, $b){
        if($a + $b < 1000000000){
            echo strval($a + $b) . ' ';
            functie($b, $a + $b);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        functie(1, 1);
    }

?>