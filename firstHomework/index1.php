<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="index1.php" method="POST">
        <input type="text" name="number"/>
        <button type="submit">Verify</button>
    </form>

</body>
</html>

<?php

    function isPrime($number){
        if($number <= 1)
            return false;
        if($number == 2)
            return true;
        if($number % 2 == 0)
            return false;

        for($i = 3; $i * $i <= $number; $i += 2){
            if($number % $i == 0)
                return false;
        }

        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = htmlspecialchars($_POST['number']);
        if (empty($number)) {
        echo "N-am ce sorta :)";
        } else {
            
            if(isPrime($number))
                echo "yes sir";
            else
                echo "try again";
            
        }
    }

?>