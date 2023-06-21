<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">

        <center>


            <form method="post">
                <b style="color: #479D47">
                    <h2>Přihlášení</h2>
                </b>

                <input type="text" id="jmeno" name="jmeno" placeholder="jméno ..." required><br><br>
                <input type="password" id="heslo" name="heslo" placeholder="heslo ..." required><br><br>

                <input class="button" type="submit" name="prihlasit" value="Přihlásit uživatele">

            </form>



            <form method="post">
                <b style="color: #C93A36">
                    <h2>Registrace</h2>
                </b>
                <input type="text" name="add_jmeno" placeholder="jméno..." required><br><br>
                <input type="password" name="add_heslo" placeholder="heslo..." required><br><br>
                <input type="password" name="add_heslo_znovu" placeholder="zadejte heslo znovu..." required><br><br>

                <input class="button" type="submit" name="pridat" value="Vytvořit uživatele"><br><br>

            </form>

            <?php

            $databaze = './db/uzivatele.sqlite';
            $tabulka = 'uzivatele';


            $pripojeni = new PDO("sqlite:" . $databaze);
            $pripojeni->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pripojeni->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            vytvorit_tabulku($pripojeni, $tabulka);


            if (isset($_POST['pridat'])) {
                $zadane_jmeno = $_POST['add_jmeno'];
                $zadane_heslo = $_POST['add_heslo'];
                $zadane_heslo_znovu = $_POST['add_heslo_znovu'];

                if ($zadane_heslo != $zadane_heslo_znovu) {
            ?>
                    <b style="color: #fbd918">
                        <h1>Kontrolní heslo se neshoduje!</h1>
                    </b>
                    <?php
                } else
                    if (!empty($zadane_jmeno) && !empty($zadane_heslo)) {


                    $sql = "SELECT * FROM $tabulka WHERE jmeno LIKE ?";
                    $dotaz = $pripojeni->prepare($sql);
                    $dotaz->execute(["$zadane_jmeno"]);
                    $data = $dotaz->fetchAll();

                    if (!$data) {

                        $jmeno = $zadane_jmeno;
                        $heslo = password_hash($zadane_heslo, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO $tabulka (jmeno, heslo) VALUES(?, ?)";
                        $dotaz = $pripojeni->prepare($sql);
                        $dotaz->execute([$jmeno, $heslo]);
                    } else {
                    ?>
                        <b style="color:  #fbd918">
                            <h1>Uživatel již existuje!</h1>
                        </b>
                    <?php
                    }
                }
            }

            if (isset($_POST['prihlasit'])) {
                $zadane_jmeno = $_POST['jmeno'];
                $zadane_heslo = $_POST['heslo'];

                $sql = "SELECT * FROM $tabulka WHERE jmeno = ?";
                $dotaz = $pripojeni->prepare($sql);
                $dotaz->execute([$zadane_jmeno]);
                $uzivatel = $dotaz->fetch();

                if ($uzivatel && password_verify($zadane_heslo, $uzivatel['heslo'])) {
                    $_SESSION['login'] = "ano";
                    $_SESSION['uzivatel'] = $zadane_jmeno;
                    echo "<script>window.location.href='./index.php';</script>";
                } else {
                    ?><center>
                        <b style="color: #fbd918">
                            <h1>Zadali jste špatné údaje!</h1>
                        </b>
                <?php
                }
            }


            function vytvorit_tabulku($pripojeni, $tabulka)
            {

                $sql = 'CREATE TABLE IF NOT EXISTS ' . $tabulka . ' (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    jmeno TEXT,
    heslo TEXT
)';
                $pripojeni->exec($sql);
            }
                ?>


    </div>

</div>



<?php
include "paticka.php";
?>