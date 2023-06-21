<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">
        <?php
        $soubor = './texty/oNas.txt';
        $obsah = file_get_contents($soubor);
        ?>
        <h1>
            <center>O nás</center>
        </h1>

        <?php
        if ($_SESSION['uzivatel'] == "spravce") {

            echo '<form method="post">
            <input type="submit" name="upravit" value="Upravit">
        </form>';
        }
        ?>


        <?php
        if (isset($_POST['upravit'])) {
            $_SESSION['header_location'] = './index.php';
            header('Location: ./upravit.php');
            die();
        }
        echo '<br>';
        echo $obsah;




        ?>
    </div>
</div>



<?php
include "paticka.php";
?>