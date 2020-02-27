<?php 
    get_header();
?>
    
<div class="main-single-post-wrapper">
    <div class="post-wrapper"> 
    <div class="post-items">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $post_id = get_queried_object_id();
            $args = array(
                'post_type' => 'zrealizowane'
            );
            $comm_query = new WP_Comment_Query;
            ?>
            <div class="post-content">
                <div class="post-title"> 
                    <p><h3><?php the_title();?> &nbsp; </h3>
                    <small><?php the_date();?></small></p>
                </div>
                
                <div class="post-image">
                    <?php if(has_post_thumbnail()){
                            the_post_thumbnail();
                        }?>
                </div>
                
                <div class="post-content-text">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile;?>
        <?php endif; ?> 
    </div>

    <div class="post-comments">
        <?php 
            $all_comm = $comm_query->query($args);
                if(!empty($all_comm)){
                ?>
                <span class="post-comments-text">
                    Wszystkie komentarze dotyczące wpisu
                </span>
                <?php
                    foreach($all_comm as $comments){
                ?>
                <div class="post-comm-text">
                    <div class="post-comm-meta">
                    
                    <div class="comm-author-img">
                        <?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
                        <span>
                            <strong><?php echo $comments -> comment_author;?></strong>
                            ,dnia <?php echo $comments -> comment_date;?>
                            napisał:
                        </span>
                    </div>
                    </div>

                    <div class="post-comm-content">
                        <?php echo $comments -> comment_content;?>
                    </div>
                </div>

                <hr class="comment-divider">
                
                <?php
                    }
                }

                else{
                    ?>
                <span class="post-comments-text">
                    Wszystkie komentarze dotyczące wpisu
                </span>
                <div class="post-comm-text">
                    <div class="post-comm-notfound">
                        <strong>
                            Jeszcze nikt nie skomentował tego artykułu.
                        </strong>
                    </div>
                </div>
                <?php
                }
        ?>
    </div>
    
        <?php 
        $args = array(
            'post_type' => array(
                'post','aktualne','zamkniete','zrealizowane'
            ),
            'post_status' => 'publish',
            'nopaging' => false,
            'posts_per_page'   => 10,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DSC'
        );
        $query = new WP_Query( $args );

            
            if( $query->have_posts() ) {
                ?>
                <div class="another-posts">
                    <ul class="display-recent-posts">
                    <span class="recent-posts-header">
                        <strong>
                        Ostatnie 10 postów w naszym serwisie
                        </strong>
                    </span>    
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<li><a class="last-10-posts" href="'.get_the_permalink().'">' . 
                    get_the_title() .'&nbsp; - &nbsp;'. get_the_date().'</a></li>';
                }
                echo '</ul></div>'
                .previous_posts_link( '« Nowsze wpisy' ).next_posts_link( 'Starsze wpisy »', $query->max_num_pages ).
                '</div>';
            }
        ?>
    </div>
    </div>
</div>
<?php get_footer();?>