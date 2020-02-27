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
    </div>
</div> 
<?php get_footer();?>