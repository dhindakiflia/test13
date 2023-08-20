<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bottle</title>
</head>
<style>
    div{
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
<body>
    <a href="index.php">Home</a><br>
    <form action="" method="post">
        <b>Kapasitas Botol (Liter)</b>

        <div>
        <label for="">Botol A</label>
        <input type="number" name="bottle1" id="b" required>
        </div>
        
        <div>
        <label for="">Botol B</label>
        <input type="number" name="bottle2" id="b" required>
        </div>
        
        <div>
        <label for="">Botol C</label>
        <input type="number" name="bottle3" id="b" required>
        </div>

        <b>Banyak Air (Liter)</b>
        <div>
        <input type="number" name="air" required>
        </div>
       
        <div>
        <input type="submit" name="submit" value="Submit">
        </div>
        
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bottle1 = $_POST['bottle1'];
        $bottle2 = $_POST['bottle2'];
        $bottle3 = $_POST['bottle3'];
        $air = $_POST['air'];
        $needb1 = 0;
        $needb2 = 0; 
        $needb3 = 0;
        // $ab2 = $air / $bottle2;
        // $ab3 = $air / $bottle3;
        
        if ($bottle1 == $bottle2 || $bottle2 == $bottle3 || $bottle1 == $bottle3) {
            echo "Kapasitas botol harus berbeda";
        }elseif ($bottle1 > 30 || $bottle1 < 1) {
            echo "Kapasitas botol tidak bisa lebih dari 29 Liter dan kurang dari 1 Liter";
        }elseif ($bottle2 > 30 || $bottle2 < 1) {
            echo "Kapasitas botol tidak bisa lebih dari 29 Liter dan kurang dari 1 Liter";
        }elseif ($bottle3 > 30 || $bottle3 < 1) {
            echo "Kapasitas botol tidak bisa lebih dari 29 Liter dan kurang dari 1 Liter";
        }elseif ($air < 100 && $air > 0) {
            echo "Air terlalu sedikit";
        }elseif ($air > 10000000 && $air > 0) {
            echo "Air terlalu banyak";
        }else{

            if ($bottle1 > $bottle2 && $bottle1 > $bottle3) {
                $ab1 = intval($air / $bottle1);
                $needb1 = $ab1;
                $sisab1 = $air - $ab1 * $bottle1;
                // echo "Botol A: " .$needb1 ." ";

                if ($bottle2 > $bottle3) {
                    if ($sisab1 <= $bottle2 && $sisab1 > 0) {
                        $needb2 = 1;
                        // echo "Botol B: ".$needb2." ";
                    } else {
                        $sb2 = intval($sisab1 / $bottle2);
                        $needb2 = $sb2;
                        $sisab2 = $sisab1 - $sb2 * $bottle2;
                        // echo "Botol B: ".$needb2." ";
                        if ($sisab2 <= $bottle3 && $sisab2 > 0) {
                            $needb3 = 1;
                            // echo "Botol C: " .$needb3." ";
                        } else {
                            $sb3 = intval($sisab2 / $bottle3);
                            $needb3 = $sb3;
                            $sisab3 = $sisab2 - $sb3 * $bottle3;
                            // echo "Botol C: " .$needb3;
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }else{
                    if ($sisab1 <= $bottle3 && $sisab1 > 0) {
                        $needb3 = 1;
                        // echo "Botol C: " .$needb3." ";
                    } else {
                        $sb3 = intval($sisab1 / $bottle3);
                        $needb3 = $sb3;
                        $sisab3 = $sisab1 - $sb3 * $bottle3;
                        // echo "Botol C: " .$needb3;
                        if ($sisab3 <= $bottle2 && $sisab3 > 0) {
                            $needb2 = 1;
                            // echo "Botol B: ".$needb2." ";
                        } else {
                            $sb2 = intval($sisab1 / $bottle2);
                            $needb2 = $sb2;
                            $sisab2 = $sisab3 - $sb2 * $bottle2;
                            // echo "Botol B: ".$needb2." ";
                            
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }

            }elseif ($bottle2 > $bottle1 && $bottle2 > $bottle3) {
                $ab2 = intval($air / $bottle2);
                $needb2 = $ab2;
                $sisab2 = $air - $ab2 * $bottle2;
                // echo "Botol B: " .$needb2 ." ";
                if ($bottle1 > $bottle3) {
                    if ($sisab2 <= $bottle1 && $sisab2 > 0) {
                        $needb1 = 1;
                        // echo "Botol A: ".$needb1." ";
                    } else {
                        $sb1 = intval($sisab2 / $bottle1);
                        $needb1 = $sb1;
                        $sisab1 = $sisab2 - $sb1 * $bottle1;
                        // echo "Botol A: ".$needb1." ";
                        if ($sisab1 <= $bottle3 && $sisab1 > 0) {
                            $needb3 = 1;
                            // echo "Botol C: " .$needb3." ";
                        } else {
                            $sb3 = intval($sisab1 / $bottle3);
                            $needb3 = $sb3;
                            $sisab3 = $sisab1 - $sb3 * $bottle3;
                            // echo "Botol C: " .$needb3;
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }else{
                    if ($sisab2 <= $bottle3 && $sisab2 > 0) {
                        $needb3 = 1;
                        // echo "Botol C: " .$needb3." ";
                    } else {
                        $sb3 = intval($sisab2 / $bottle3);
                        $needb3 = $sb3;
                        $sisab3 = $sisab2 - $sb3 * $bottle3;
                        // echo "Botol C: " .$needb3;
                        if ($sisab3 <= $bottle1 && $sisab3 > 0) {
                            $needb1 = 1;
                            // echo "Botol A: ".$needb1." ";
                        } else {
                            $sb1 = intval($sisab3 / $bottle1);
                            $needb1 = $sb1;
                            $sisab1 = $sisab3 - $sb1 * $bottle1;
                            // echo "Botol A: ".$needb1." ";
                            
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }
            }elseif ($bottle3 > $bottle1 && $bottle3 > $bottle2){
                $ab3 = intval($air / $bottle3);
                $needb3 = $ab3;
                $sisab3 = $air - $ab3 * $bottle3;
                // echo "Botol C: " .$needb3 ." ";

                if ($bottle1 > $bottle2) {
                    if ($sisab3 <= $bottle1 && $sisab3 > 0) {
                        $needb1 = 1;
                        // echo "Botol A: ".$needb1." ";
                    } else {
                        $sb1 = intval($sisab3 / $bottle1);
                        $needb1 = $sb1;
                        $sisab1 = $sisab3 - $sb1 * $bottle1;
                        // echo "Botol A: ".$needb1." ";
                        if ($sisab1 <= $bottle2 && $sisab1 > 0) {
                            $needb2 = 1;
                            // echo "Botol B: " .$needb2." ";
                        } else {
                            $sb2 = intval($sisab1 / $bottle2);
                            $needb2 = $sb2;
                            $sisab2 = $sisab1 - $sb2 * $bottle2;
                            // echo "Botol B: " .$needb2;
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }else{
                    if ($sisab3 <= $bottle2 && $sisab3 > 0) {
                        $needb2 = 1;
                        // echo "Botol B: " .$needb2." ";
                    } else {
                        $sb2 = intval($sisab3 / $bottle2);
                        $needb2 = $sb2;
                        $sisab2 = $sisab3 - $sb2 * $bottle2;
                        // echo "Botol B: " .$needb2;
                        if ($sisab2 <= $bottle1 && $sisab2 > 0) {
                            $needb1 = 1;
                            // echo "Botol A: ".$needb1." ";
                        } else {
                            $sb1 = intval($sisab2 / $bottle1);
                            $needb1 = $sb1;
                            $sisab1 = $sisab2 - $sb1 * $bottle1;
                            // echo "Botol A: ".$needb1." ";
                            
                        }
                    }
                    echo"Botol A: ".$needb1." Botol B: ".$needb2." Botol C: ".$needb3;
                    $total = $needb1 + $needb2 + $needb3;
                    echo" Total :".$total;
                }
            }

         }
    }
    
    ?>
</body>
</html>