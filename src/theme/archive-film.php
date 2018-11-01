<?php get_header(); ?>

<div class="film__container">

    <section class="film__marquee-container">

        <?php
        $films = array('post_type' => 'film', );
        $loop = new WP_Query($films);
        while($loop->have_posts()) : $loop->the_post();
        ?>

        <?php
            if(get_field('film_marquee', $post->ID))
            {
                echo '<div class="film__marquee" style="background-image:url('.get_field('marquee', $post->ID)['url'].')">';
                    echo '<div class="film__heading-container-copy">';
                        echo '<div class="film__heading-marquee heading">'.get_the_title().'</div>';
                        echo '<div class="film__release_date">'.get_field('release_date').'</div>';
                        echo '<div class="film__rating rated-'.get_field('rating', $post->ID).'">'.get_field('rating', $post->ID).'</div>';
                        echo '<div class="film__description">'.get_field('description', $post->ID).'</div>';
                        echo '<ul class="menu">';
                            echo '<li class="dropdown">';
                        echo '<a href="#" class="button button__film-drop toplevel"><span>Watch Now</span></a>';

                        $values = get_field('watch_now');
                        if($values)
                        {
                        echo '<ul class="film__select-watch-now submenu">';

                        foreach($values as $value)
                        {
                        echo '<li><a href="#">' . $value . '</a></li>';
                        }

                        echo '</ul>';
                        }

                    echo '</div>';
                    echo '<div class="panel__video-controls film__video-controls">';
				        echo '<button type="button" id="panel__video-film-play-pause"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 79.5 89"><defs><style>.cls-1{fill:url(#New_Gradient_Swatch_6);}.cls-2{fill:#e6e6e6;}.cls-3{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:3px;}</style><linearGradient id="New_Gradient_Swatch_6" y1="44.5" x2="70" y2="44.5" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0090d4"/><stop offset="1" stop-color="#003d7f"/></linearGradient></defs><title>Asset 53</title><g id="Layer_2" data-name="Layer 2"><g id="Desktop-film"><circle class="cls-1" cx="35" cy="44.5" r="35"/><polygon class="cls-2" points="48.3 44.5 26.6 31.97 26.6 57.03 48.3 44.5"/><path class="cls-3" d="M35,87.5a43,43,0,0,0,0-86"/></g></g></svg></button>';
        			echo '</div>';
                echo '</div>';
            }
        ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </section>

    <section class="film__featured-container">
        <div class="film__heading-featured heading">Morgan Creek Featured Films</div>

        <div class="film__featured-poster-container">
            <?php 

            $the_query = new WP_Query(array(
                'post_type'			=> 'film',
                'posts_per_page'	=> -1,
                'meta_key'			=> 'film_featured',
                'orderby'			=> 'meta_value',
                'order'				=> 'DESC'
            ));

            ?>
            <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                    $poster = get_field('film_poster')['url'];
                ?>
                <img src="<?php echo $poster; ?>" class="film__featured-poster">
                <?php endwhile; ?>
            <?php endif; ?>

            <?php wp_reset_query(); ?>
        </div>
        
        <a href="#" class="button button-centered button__no-arrow"><span>View Full Movie Library</span></a>

    </section>

</div>

<?php get_footer(); ?>
