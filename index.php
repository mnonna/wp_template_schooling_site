<?php get_header();
    $args = array(
        'post_type' => array('post','aktualne','zamkniete','zrealizowane'),
        'posts_per_page' => 5,
        'order' => 'DSC'
    );

    $the_query = new WP_Query( $args );
    
?>
<div class="main-slider-container">
    <div class="post-slider-wrapper">
        <?php 
            if($the_query->have_posts()):while($the_query->have_posts()):
            ?>
            <div class="post-slider-main">
                <?php $the_query->the_post(); ?>

                <a href=<?php the_permalink();?>>
                    <h2 class="slider-post-title"><?php the_title(); ?></h2>
                </a>

                <div class="slide-post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>

                <div class="slider-post-excerpt">
                    <?php the_excerpt();?>
                </div>
                
            </div>    
            <?php
            endwhile;
            endif;  
        ?>
    </div>
</div>

<div class="schooling-sign-up-wrapper">
    <div class="schooling-sign-up-header">
        <h3>Chciałbyś zapisać się na nasze szkolenia ?</h3>
        <p class="schooling-about">  
            EkoSem jest organizatorem szkoleń i warsztatów z zakresu ochrony środowiska, 
            gospodarki odpadami, gospodarki wodno-ściekowej i ciepłownictwa.
            Naszą ofertę kierujemy do przedstawicieli zarówno branży komunalnej, 
            branży ciepłowniczej, jednostek administracji publicznej, jak i firm prywatnych. 
            Organizujemy szkolenia otwarte oraz zamknięte na obszarze całego kraju.
            Szkolenia zamknięte dostosowujemy do indywidualnych potrzeb klienta. 
            Realizujemy je w siedzibie firmy lub w ośrodkach konferencyjnych (więcej o szkoleniach zamkniętych).
            Uczestnikom naszych spotkań zapewniamy materiały szkoleniowe, wyżywienie, 
            zaświadczenie o uczestnictwie w szkoleniu oraz opiekę organizatora.
            Współpracujemy z najlepszymi wykładowcami posiadającymi bogatą wiedzę praktyczną 
            w zakresie objętym tematyką szkolenia oraz doświadczenie trenerskie.
            Naszą dewizą jest zapewnienie Uczestnikom wysokiej jakości merytorycznej 
            oraz organizacyjnej szkoleń i przyczyniać się tym samym do wzrostu jakości środowiska.
        </p>

        <div class="schooling-button-div">
            <a href="http://localhost/ekosem_test/zapisy/">
                <button class="sign-up-button-index">Zapisz się !</button>
            </a>
        </div>
    </div>
</div>
<?php get_footer();?>