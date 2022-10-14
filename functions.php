<?php
/**
 */

if (! function_exists('date_pub')) {
    function date_pub()
    {
        $time_string = '<i class="fa-solid fa-calendar-days"></i> Publiée le <time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date('d F Y')),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date('d F Y'))
        );

        echo '<span class="picto-calendar"><img src="' . get_template_directory_uri() . '/images/pictos/calendar.png" class="img-fluid" alt=""></span><span class="posted-on">' . $time_string . '</span>';
    }
}

if (! function_exists('rd_holding_pagination')) {
    function rd_holding_pagination($args = array(), $class = 'pagination')
    {
        if ($GLOBALS['wp_query']->max_num_pages <= 1) {
            return;
        }
        $args = wp_parse_args($args, array(
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('&laquo;'),
            'next_text'          => __('&raquo;'),
            'screen_reader_text' => __('Posts navigation'),
            'type'               => 'array',
            'current'            => max(1, get_query_var('paged')),
        ));
        $links = paginate_links($args);
        ?>

<nav aria-label="<?php echo $args['screen_reader_text']; ?>">

    <ul class="pagination">

        <?php
                    foreach ($links as $key => $link) { ?>

        <li class="page-item <?php echo strpos($link, 'current') ? 'active' : '' ?>">

            <?php echo str_replace('page-numbers', 'page-link', $link); ?>

        </li>

        <?php } ?>

    </ul>

</nav>

<?php
    }
}




function new_excerpt_more($more)
{
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter('wp_trim_excerpt', 'excerpts_get_more_link');

if (! function_exists('excerpts_get_more_link')) {
    /**
     * Adds a custom read more link to all excerpts, manually or automatically generated
     *
     */
    function excerpts_get_more_link($post_excerpt)
    {
        return $post_excerpt . ' [...]<p class="text-right"><a class="moretag" href="' . esc_url(get_permalink(get_the_ID())) . '">' . 'Lire la suite ...' . '</a></p>';
    }
}

add_filter('wp_trim_excerpt', 'excerpts_get_more_link');

function register_my_menu()
{
    register_nav_menu('principal', __('Principal'));
}
add_action('init', 'register_my_menu');

// This theme uses post thumbnails
add_theme_support('post-thumbnails');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


// Function refresh page if no post à > 0

function refresh_page(int $marque, string $location)
{
    if($_GET) {
        if($_GET['location'] or $_GET['marque']) {
            if($GLOBALS['postnumber'] >= 0) {
                ?>
<div class="container header-wrapper">
    <div class="breadscrumbs">
        <a href="<?php echo(get_site_url()); ?> " title="Revenir l'acceuil de RD Holding"><i class="fa fa-home"
                aria-hidden="true"></i> Accueil</a>
        <a href="<?php echo(get_site_url()); ?>?location=<?php echo($location . '&marque=' . $marque); ?>" class=""
            rel="bookmark">
            < Revenir à la liste des offres </a>
    </div>
</div>


<?php
            }
        }
    }
}


//Fonction change title text for search engine (SEO)

function change_title_browser_top()
{
    if(is_front_page()) {
        return bloginfo("name");
    } elseif(is_single()) {
        echo $post_single_title = ' - Offres d\'emploi RD Holding' . single_post_title() ;
        return $post_single_title ;
    } else {
        echo $search_title = "Recherche - Offre d'emploi Holding RD Finance";
        return $search_title;
    }
}


//Function to display the elements on the select (via search form)

function select_search_value($list = array(), $compare_value)
{
    $i = 0;
    while($i < count($list)) :
        foreach($list as $element):
            echo("<option value='" . ($i + 1) . "'");
            if($compare_value == $i + 1) {
                echo(" selected='selected'");
            }
            echo(">" . $element. "</option>");
            ++$i;
        endforeach;
    endwhile;
}


//Function if empy marque & location

function empty_brand_field()
{
    if($_GET) {
        if(isset($_GET['marque']) and isset($_GET['location'])) {
            $marque = $_GET['marque'];
            $location = $_GET['location'];

            if($marque == 0 and $location == '') {
               echo "<span style = \"color : #ed594c;\">Veuillez sélectionner une marque</span>"; 
            }
        }
    }
}

function empty_location_field()
{
    if($_GET) {
        if(isset($_GET['marque']) and isset($_GET['location'])) {
            $marque = $_GET['marque'];
            $location = $_GET['location'];

            if($marque == 0 and $location == '') {
               echo "<span style = \"color : #ed594c;\">Veuillez saisir un Code postale/Région/Ville/Département </span>"; 
            }
        }
    }
}