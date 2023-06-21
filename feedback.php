<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">
        <center>


            <h3>Dotazy a připomínky</h3>
            <br><br>

            <form action="" method="post">
                Jméno: <input type="text" name="jmeno">
                Připomínka: <input type="text" size="70" name="pripominka">
                <input type="submit" name="save" value="Uložit">

                <?php
                if ($_SESSION['uzivatel'] == "spravce") {

                    echo '<input type="submit" name="drop" value="SMAZAT TABULKU">';
                }

                ?>




            </form>

            <?php

            $databaze = './db/dotazy.sqlite';
            $tabulka = 'feedback';

            $pripojeni = new PDO("sqlite:" . $databaze);
            $pripojeni->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pripojeni->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            ?>

            <?php

            $sql = 'CREATE TABLE IF NOT EXISTS ' . $tabulka . ' (
            id INTEGER PRIMARY KEY,
            jmeno TEXT,
            pripominka TEXT
        )';
            $pripojeni->exec($sql);
            ?>

            <?php
            if (isset($_POST['save'])) {
                $jmeno = $_POST['jmeno'];
                $pripominka = $_POST['pripominka'];

                $sql = "INSERT INTO $tabulka (jmeno, pripominka) VALUES(?, ?)";
                $dotaz = $pripojeni->prepare($sql);
                $dotaz->execute([$jmeno, $pripominka]);
            }

            if (isset($_POST['drop'])) {

                $sql = "DROP TABLE IF EXISTS $tabulka";
                $pripojeni->query($sql);
                header('Location: ' . $_SERVER['PHP_SELF']);
                die();
            }

            if (isset($_POST['aktualizuj'])) {
                $jmeno = $_POST['jmeno'];
                $pripominka = $_POST['pripominka'];
                $id = $_POST['hidden_id'];


                $sql = "UPDATE $tabulka SET jmeno = ?, pripominka = ? WHERE id = ?";
                $dotaz = $pripojeni->prepare($sql);
                $dotaz->execute([$jmeno, $pripominka, $id]);
            }
            if (isset($_POST['mazat'])) {


                $hodnota =  $_POST['hidden_id'];
                $sql = "DELETE FROM $tabulka WHERE id = ?";
                $dotaz = $pripojeni->prepare($sql);
                $dotaz->execute([$hodnota]);
            }
            ?>
            <br>

            <?php

            $sql = "SELECT * FROM $tabulka";
            $data = $pripojeni->query($sql)->fetchAll();

            echo '<table>';
            echo '<tr><th>Jméno</th><th>Připomínka</th></tr>';
            foreach ($data as $zaznam) {
                echo '<form action="" method=post>';
                echo '<tr>';
                echo '<td><input type=text name=jmeno value="' . $zaznam['jmeno'] . '"></td>';
                echo '<td><input type=text name=pripominka size="80" value="' . $zaznam['pripominka'] . '"></td>';

                if ($_SESSION['uzivatel'] == "spravce") {
                    echo '<td><input type=submit name=aktualizuj value="aktualizuj"></td>';
                    echo '<td><input type=submit name=mazat value="mazat"></td>';
                }

                echo '<td><input type=hidden name=hidden_id value="' . $zaznam['id'] . '"></td>';
                echo '</tr>';
                echo '</form>';
                echo '</tr>';
            }
            echo '</table>';
            ?>

    </div>
</div>



<?php
include "paticka.php";
?>