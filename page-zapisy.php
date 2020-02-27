<?php get_header();?>
<div class="single-page-main-wrapper">

    <div class="page-wrapper">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <div class="page-title">
            <h2 class="h2-page-title"><?php the_title();?></h2>
        </div>
        <div class="page-content">
            <?php the_content(); ?>
        </div>

        <?php endwhile;?>
    <?php endif; ?>
    
        <div class="sign-up-form-wrapper">
            <div class="form-main">
            <form class="schooling-form">
                
                <label for="num_spinner">Podaj liczbę uczestników</label>
                <div class="input-group number-spinner" id="num_spinner">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default" data-dir="dwn"><span>-</span></button>
                    </span>
                    <input type="text" id="numberParticipants" class="form-control text-center" value="1">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default" data-dir="up"><span>+</span></button>
                    </span>
                </div>

                <button type="button" class="sign-up-button-index confirm-participants">Potwierdź liczbę uczestników</button>

                <div class="schooling-participants" id="divPart">

                </div>


                <div class="form-group">
                    <label for="unitInput">Jednostka zgłaszająca</label>
                    <input type="text" class="form-control unit" id="unitInput">
                </div>
                <div class="form-group">
                    <label for="addressInput">Adres</label>
                    <input type="text" class="form-control address" id="addressInput">
                </div>
                <div class="form-group">
                    <label for="postalInput">Kod pocztowy</label>
                    <input type="text" class="form-control postal" id="postalInput">
                </div>
                <div class="form-group">
                    <label for="nipInput">NIP</label>
                    <input type="text" class="form-control nip" id="nipInput">
                </div>
                <div class="form-group">
                    <label for="conPersonInput">Osoba kontaktowa</label>
                    <input type="text" class="form-control conPerson" id="conPersonInput">
                </div>
                <div class="form-group">
                    <label for="phoneInput">Telefon</label>
                    <input type="text" class="form-control phone" id="phoneInput">
                </div>
                <div class="form-group">
                    <label for="emailInput">E-mail</label>
                    <input type="email" class="form-control email" id="emailInput">
                </div>

                <?php 
                    global $wpdb;
                    $sql = "SELECT *FROM wp_ekosem_szkolenia;";
                    $event = $wpdb->get_results($sql);
                ?>

                <div class="form-group">
                    <label for="select-schooling-id">Wybierz szkolenie</label>
                    <select class="form-control" id="select-schooling-id">
                        <?php 
                            foreach($event as $data){
                        ?>
                            <option>
                                <?php echo $data->topic; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-response-text" id="response-after-submit">

                </div>
                
                <button type="button" class="sign-up-button-index submit-sign-up">Potwierdź</button>
            </form>
            </div>
        </div>
    </div> 

</div>
<?php get_footer();?>