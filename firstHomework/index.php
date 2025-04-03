<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="index.php" method="POST">
        <input type="text" name="array"/>
        <select name = "sorting">
            <option value="insertion">Insertion</option>
            <option value="merge">Merge</option>
            <option value="selection">Selection</option>
            <option value="bubble">Bubble</option>
        </select>
        <button type="submit">Sort</button>
    </form>

</body>
</html>

<?php

    function insertionSort($arr){

        for($i = 0; $i < count($arr); $i++){
            $j = $i;
            while($j > 0 and $arr[$j] < $arr[$j - 1]){
                if($arr[$j] < $arr[$j - 1]){
                    [$arr[$j - 1], $arr[$j]] = [$arr[$j], $arr[$j - 1]];
                }
                $j--;
            }
        }

        return $arr;
    }

    function selectionSort($arr){
        for($i = 0; $i < count($arr); $i++){
            for($j = $i + 1; $j < count($arr); $j++){
                if($arr[$i] > $arr[$j]){
                    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                }
            }
        }

        return $arr;
    }

    function bubbleSort($arr){
        for($i = 0; $i < count($arr); $i++){
            for($j = 0; $j < count($arr) - 1; $j++){
                if($arr[$j] > $arr[$j + 1]){
                    [$arr[$j + 1], $arr[$j]] = [$arr[$j], $arr[$j + 1]];
                }
            }
        }

        return $arr;
    }

    function merge(&$arr, $st, $mid, $dr){

        $n1 = $mid - $st + 1;
        $n2 = $dr - $mid;

        $l = array();
        $r = array();

        for($i = 0; $i < $n1; ++$i){
            $l[$i] = $arr[$i + $st];
        }
        for($i = 0; $i < $n2; ++$i){
            $r[$i] = $arr[$mid + $i + 1];
        }

        $i = 0;
        $j = 0;
        $k = $st;

        while($i < $n1 and $j < $n2){
            if($l[$i] < $r[$j]){
                $arr[$k++] = $l[$i++];
            }
            else
                $arr[$k++] = $r[$j++];
        }

        while($i < $n1){
            $arr[$k++] = $l[$i++];
        }

        while($j < $n2){
            $arr[$k++] = $r[$j++];
        }
    }

    function mergeSort(&$arr, $l, $r){

        if($l < $r){
            $mij = floor(($l + $r) / 2);

            mergeSort($arr, $l, $mij);
            mergeSort($arr, $mij + 1, $r);

            merge($arr, $l, $mij, $r);
        }

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arr = htmlspecialchars($_POST['array']);
        if (empty($arr)) {
        echo "N-am ce sorta :)";
        } else {

            $sortingMethod = htmlspecialchars($_POST["sorting"]);
            //aici ar fi mers si mai multe chestii un trim una alta dar n am luat in considerare
            //daca ai spate inainte sau dupa pusca :))
            //am zis ca nu mai fac 3 ul ca e kinda copy paste cu exceptia la o functie daca vrei pot sa l fac rapid :)
            $numbersAsString = explode(" ", $arr);
            $numbers = array();
            foreach($numbersAsString as $number){
                array_push($numbers, (int)$number);
            }

            switch ($sortingMethod){
                case 'insertion':
                    $numbers = insertionSort($numbers);
                    break;
                case 'selection':
                    $numbers = selectionSort($numbers);
                    break;
                case 'bubble':
                    $numbers = bubbleSort($numbers);
                    break;
                case 'merge':
                    mergeSort($numbers, 0, count($numbers) - 1);
                    break;
                default:
                    $numbers = insertionSort($numbers);
            }

            var_dump($numbers);

            echo $sortingMethod;
        }
    }

?>
