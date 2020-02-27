<?php
get_header();
?>

<div class="ekosem-contact-main-wrapper">
    <div class="ekosem-contact-wrapper">
        <div class="contact-wrapper">
            <?php echo do_shortcode("[wpforms id='68' title='true' description='false']"); ?>
        </div>

        <div class="contact-data">
            <h3><b>Oto nasze dane kontaktowe</b></h3>

            <div class="contact-location">
               <i class="material-icons">my_location</i> &nbsp;<span> os. Stefana Batorego 14i, 60-687 Poznań</span>
            </div>

            <div class="contact-phone">
                <i class="material-icons">smartphone</i> &nbsp; <span>500 377 755</span>
            </div>

            <div class="contact-mail">
               <i class="material-icons">mail_outline</i> &nbsp; <span>szkolenia@ekosem.pl</span>
            </div>
        </div>

        <div class="map-ekosem-leaflet-location">
            <div class="leaflet-heading">
                <span class="leaflet-map-header"><strong>Chciałbyś spotkać się z nami osobiście ? Znajdziesz nas tutaj </strong></span>
                <i class="material-icons">arrow_downward</i>
            </div>

            <?php echo do_shortcode("[leaflet-map lat=52.45817989757248 lng=16.92290157079697 zoom=14 zoomcontrol scrollwheel height=500px][leaflet-marker lat=52.45813413769081 lng=16.92199230194092][leaflet-marker]Tu jesteśmy[/leaflet-marker]");
            ?>
        </div>

        <div class="brand-owner">
            <h4>Właścicielem marki <b>EkoSem</b> jest:</h4>
            <p><strong>GT Sp. z o.o.</strong></p>
            <p>os. Stefana Batorego 14i 60-687 Poznań</p>
            <p><strong>NIP: &nbsp;</strong>9721251010</p>
            <p><strong>REGON: &nbsp;</strong>302827177</p>
            <p><strong>KRS: &nbsp;</strong>0000520324</p>
            <p><strong>Numer konta: &nbsp;</strong>ING PL 14 1050 1520 1000 0090 3043 2273</p>
        </div>
    </div>
</div>

<?php 
get_footer();
?>


