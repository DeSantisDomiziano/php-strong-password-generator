<?php
var_dump($_GET);
$password = array();

$lenghtPassword = $_GET['password'];
var_dump($lenghtPassword);

$alphabetsLower = range('a', 'z');
$alphabetsUpper = range('A', 'Z');
var_dump($alphabetsLower);
var_dump($alphabetsUpper);

for ($i=0; $i < $lenghtPassword; $i++) { 

    $randomChoice = rand(0, 1);
    if ($_GET['yes-no'] === 'true') {
        if ($randomChoice === 0) {
            $randomLower = rand(0, count($alphabetsLower) - 1);
            array_push($password, $alphabetsLower[$randomLower]);
        }elseif ($randomChoice === 1) {
            $randomUpper = rand(0, count($alphabetsUpper) - 1);
            array_push($password, $alphabetsUpper[$randomUpper]);
        }
    }else {
        if ($randomChoice === 0) {
            $randomLower = rand(0, count($alphabetsLower) - 1);
            if (!in_array($alphabetsLower[$randomLower], $password)) {
                array_push($password, $alphabetsLower[$randomLower]);
            }else {
                $i--;
            }
        }elseif ($randomChoice === 1) {
            $randomUpper = rand(0, count($alphabetsUpper) - 1);
            if (!in_array($alphabetsUpper[$randomUpper], $password)) {
                array_push($password, $alphabetsUpper[$randomUpper]);
            }else {
                $i--;
            }
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<section>
    <div class="container justify-content-center align-items-center">

        <div class="text-center mb-4">
            <h1 class="text-capitalize fw-bold">strong password generator</h1>
            <h2 class="fw-bold">Genera una password sicura</h2>
        </div>

        <div class="card w-100 p-4">
            <form action="./index.php" method="get" >
                <div class="row">

                    <div class="col-8">

                        <p>Lunghezza password:</p> <br>
                        <p class="mb-5">Constenti ripetizioni di uno o più caratteri:</p>

                        <button type="submit" class="btn btn-primary mt-5">Invia</button>
                        <button type="reset" class="btn btn-secondary mt-5">Annulla</button>
                    </div>

                    <div class="col-4">
                        <input type="number" name="password" min=5 max=40 placeholder="min 5 max 40 characters" class="w-75 mb-4"> <br>

                        <input type="radio" name="yes-no" id="yes" value="true" class="" checked>
                        <label for="yes-no"> Sì</label> <br>

                        <input type="radio" name="yes-no" id="no" value="false">
                        <label for="yes-no"> No</label> <br>

                        <input type="checkbox" name="lettere" id="">
                        <label for="lettere">Lettere</label> <br>

                        <input type="checkbox" name="numeri" id="">
                        <label for="numeri">Numeri</label> <br>

                        <input type="checkbox" name="simboli" id="">
                        <label for="simboli">Simboli</label> <br>
                        
                    </div>
                </div>
            </form>
        </div>

        <?php if (!empty($password)) :?>
            <div class="alert alert-success mt-4 w-100" role="alert">
                <p class="m-0">
                    Password generata correttamente, la tua password è: 
                    <?php echo implode("", $password) ; ?>
                </p>
            </div>
        <?php endif;?>



    </div>
</section>

    
</body>
</html>