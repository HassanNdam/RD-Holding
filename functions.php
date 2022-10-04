<?php
/**
 */

if ( ! function_exists ( 'intuition_posted_on' ) ) {
	function intuition_posted_on() {
		$time_string = '<i class="fa-solid fa-calendar-days"></i> Publiée le <time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('d F Y') ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date('d F Y') )
		);

		echo '<span class="picto-calendar"><img src="' . get_template_directory_uri() . '/images/pictos/calendar.png" class="img-fluid" alt=""></span><span class="posted-on">' . $time_string . '</span>';
	}
}

if ( ! function_exists ( 'intuition_post_nav' ) ) {
	function intuition_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
				<nav class="container navigation post-navigation">
					<div class="row nav-links justify-content-between">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous">%link</span>', '<' );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next">%link</span>',     '>');
							}
						?>
					</div><!-- .nav-links -->
				</nav><!-- .navigation -->

		<?php
	}
}

if ( ! function_exists ( 'intuition_pagination' ) ) {
	function intuition_pagination( $args = array(), $class = 'pagination' ) {
        if ($GLOBALS['wp_query']->max_num_pages <= 1) return;
		$args = wp_parse_args( $args, array(
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => __('&laquo;'),
			'next_text'          => __('&raquo;'),
			'screen_reader_text' => __('Posts navigation'),
			'type'               => 'array',
			'current'            => max( 1, get_query_var('paged') ),
		) );
        $links = paginate_links($args);
        ?>

        <nav aria-label="<?php echo $args['screen_reader_text']; ?>">

            <ul class="pagination">

                <?php
                    foreach ( $links as $key => $link ) { ?>

                        <li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : '' ?>">

                            <?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>

                        </li>

                <?php } ?>

            </ul>

        </nav>

        <?php
    }
}




function new_excerpt_more($more) {

	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter( 'wp_trim_excerpt', 'excerpts_get_more_link' );

if ( ! function_exists( 'excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 */
	function excerpts_get_more_link( $post_excerpt ) {

		return $post_excerpt . ' [...]<p class="text-right"><a class="moretag" href="' . esc_url( get_permalink( get_the_ID() )) . '">' . 'Lire la suite ...' . '</a></p>';
	}
}

add_filter( 'wp_trim_excerpt', 'excerpts_get_more_link' );

function register_my_menu() {
  register_nav_menu('principal',__( 'Principal' ));
}
add_action( 'init', 'register_my_menu' );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

