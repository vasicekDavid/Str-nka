<?php
include "hlavicka.php";
?>



<div class="about">
    <div class="container">
        <?php

        $soubor = './texty/oNas.txt';

        $obsah = file_get_contents($soubor);
        ?>

        <form method="post">
            <textarea name="obsah" rows="20" cols="80"><?php echo $obsah ?></textarea><br>
            <input type="submit" name="ulozit" value="Uložit">
        </form>

        <?php
        if (isset($_POST['ulozit'])) {
            $obsah = $_POST['obsah'];
            file_put_contents($soubor, $obsah);
            echo "<script>window.location.href='" . $_SESSION['header_location'] . "';</script>";
            die();
        }
        ?>
        <script type="text/javascript" src="./js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                language: 'cs',
                selector: 'textarea[name=obsah]',
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                image_advtab: true,
            });
        </script>
    </div>
</div>



<?php
include "paticka.php";
?>