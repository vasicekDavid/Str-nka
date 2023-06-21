<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h2>Kontakt</h2>
                    <p><i class="fa fa-map-marker-alt"></i>Gen. Svobody 183, Mohelnice</p>
                    <p><i class="fa fa-phone-alt"></i>+420 588 881 623</p>
                    <p><i class="fa fa-envelope"></i>autobazar@vasicek.cz</p>
                    <div class="footer-social">
                        <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>

                        <a class="btn" href=""><i class="fab fa-instagram"></i></a>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div style="width: 100%"><iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=SP%C5%A0E%20a%20OA%20Mohelnice+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">oblast mapy</a></iframe></div>
            </div>

        </div>
    </div>
    <div class="container copyright">
        <p>&copy; <a href="#">Autobazar Vašíček</a> | <?php echo date("Y"); ?></a></p>
        <br>
        <?php

        $soubor = 'pocitadlo/pocitadlo.txt';
        $obsah = file_get_contents($soubor);

        $obsah += 1;
        file_put_contents($soubor, $obsah);

        settype($obsah, "string");

        $cisla = str_split($obsah);
        foreach ($cisla as $cislo) {
            echo '<img src="pocitadlo/cisla/' . $cislo . '.png" height="30">';
        }
        ?>
    </div>
</div>



<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/galerie.js"></script>
<link rel="stylesheet" href="css/jquery.fancybox.min.css" media="screen">
<script src="js/jquery.fancybox.min.js"></script>


<script src="js/main.js"></script>


<script type="text/javascript" src="js/tinymce/tinymce.min.js">
</script>
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
</body>

</html>