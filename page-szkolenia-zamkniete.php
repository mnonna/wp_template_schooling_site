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

    <?php 
    $args = array(
        'post_type'=> 'zamkniete',
        'order'    => 'DSC'
        );              
    
    $the_query = new WP_Query( $args );
    ?>

    <div class="current-schooling-main-wrapper">
        <div class="current-schoolings">
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="post-content">
                    <div class="post-title"> 
                        <p>
                            <a href=<?php the_permalink(); ?>>
                                <h3><?php the_title();?> &nbsp; </h3>
                            </a>
                            <small><?php the_date();?></small>
                        </p>
                    </div>
                    
                    <div class="post-image">
                        <?php if(has_post_thumbnail()){
                                the_post_thumbnail();
                            }?>
                    </div>
                    
                    <div class="post-content-text">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile;?>
            <?php endif; ?> 
        </div>
    </div>
    </div>
</div> 
<?php get_footer();?>