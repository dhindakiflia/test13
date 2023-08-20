<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sequence M and N</title>
</head>
<body>
    <a href="index.php">Home</a><br>
    <form action="" method="post">
        <input type="text" name="huruf" maxlength="8" oninput="this.value = this.value.toUpperCase()">
        <input type="submit" value="Submit" name="Submit">
    </form>
    
    <?php
    if (isset($_POST['Submit'])) {
        $input = $_POST['huruf'];
        $angka = array(1,2,3,4,5,6,7,8,9);
        $angka1 = array(1,2,3,4,5,6,7,8,9);
        rsort($angka1);
        $n = array(1,2);
        $m = array(2,1);
        
        $a = array();
        $b = array();
        $c = array();
        $y = array();
        $z = array();

        $array = str_split($input); 
        $array_length = count($array) - 1;

        if (preg_match("/M/", $input) || preg_match("/N/", $input)) {
            if ($array[0] == 'N') {
                $data_baru = $n;
                for ($i=1; $i <= $array_length; $i++) { 
                    if ($array[$i] == 'N' && !preg_match("/M/", $input) ) {
                        array_push($a, $angka[$i+1] );
                        $data_baru = array_merge($n, $a);

                    }elseif ($array[$i] == 'N' && preg_match("/M/", $input)) {
                        
                        if ($array[$i+1] == 'M') {
                            for ($j=0; $j <= $array_length ; $j++) { 
                                $final = $angka[$j+1]; 
                            }
                            $b[$i] = $final;

                        }elseif ($array[$i] == 'N') {
                            array_push($b, $angka[$i+1] );
                        }
                        $data_baru = array_merge($n, $b);

                    }elseif ($array[$i] == 'M') {
                        
                        if ($array[$i-1] == $array[0] && $array_length == 1) {
                            $x = array(3);
                            $data_baru = array_merge($x, $m);

                        } else {  
                            $akhir = end($b);
                            array_push($b, $akhir-1 );
                            $data_baru = array_merge($n, $b);
                        }
                    }
                }
                #tampilkan hasil
                echo"Hasil : ";
                foreach ($data_baru as $item) {
                    echo $item;
                }

            }elseif ($array[0] == 'M') {
                $data_baru = $m;
                for ($i=1; $i <= $array_length; $i++) { 
                    if ($array[$i] == 'M') {
                        if ($array[$i-1] == 'N') {
                           if ($array[$i+1] == 'M') {
                            $y[$i] = $angka[$i+1];
                            $y[$i-1] = $angka[$i+2];
                           }else{
                            $y[$i] = $angka[$i];
                            $y[$i-1] = $angka[$i+1];
                           }
                            $data_baru = array_merge($m, $y);
                        }elseif ($i == 1) {
                            array_unshift($m, 3);
                            $data_baru = $m;
                        }else{
                            $y[$i] = $angka[$i-1];
                        }
                    
                    }elseif ($array[$i] == 'N' ) {
                        $y[$i] = $angka[$i+1];
                        $data_baru = array_merge($m, $y);
                    }
                }
                #tampilkan hasil
                echo"Hasil : ";
                foreach ($data_baru as $item) {
                    echo $item;
                }
            }
        } else {
            echo "Tidak bisa selain M dan N";
        }
        
        
        
        

        
        
        
        
        
    }
    ?>
</body>
</html>