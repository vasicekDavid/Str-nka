<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">
        <div class="row align-items-center">

            <?php
            $_SESSION['login'] = 'ne';
            $_SESSION['uzivatel'] = 'nikdo';
            header("Location: index.php");
            die();
            ?>

        </div>
    </div>
</div>



<?php
include "paticka.php";
?>