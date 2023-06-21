<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">

        <center>
            <h1>Administrace vzhledu webu</h1>

            <br><br>

            <h4>Zvolte barevné schéma webu</h4><br>

            <div class="container">
                <form method="post">
                    <input type="submit" name="modra" value="Modré">
                    <input type="submit" name="fialova" value="Fialové">
                    <input type="submit" name="zelena" value="Zelené">
                </form>


                <?php
                if (isset($_POST['modra'])) {
                    setcookie("motiv", "1", time() + 3600);
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    die();
                }
                if (isset($_POST['fialova'])) {
                    setcookie("motiv", "2", time() + 3600);
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    die();
                }
                if (isset($_POST['zelena'])) {
                    setcookie("motiv", "3", time() + 3600);
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    die();
                }
                ?>


            </div>
    </div>



    <?php
    include "paticka.php";
    ?>