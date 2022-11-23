<?php

include('data.php');

global $wp_query;

$args = $wp_query->query_vars;

$location = "";
$marque = 0;
$args['post_type'] = 'post';



$metaquery = array();

if($_GET) {
    if (isset($_GET['marque'])) {
        $marque = $_GET['marque'];

        if ($marque > 0) {
            array_push($metaquery, array(
                'key' => 'job_organisation',
                'value' => MARQUE[$marque - 1],
                'compare' => '=',
            ));
        };
    };

    if (isset($_GET['location'])) {
        $location = $_GET['location'];

        if ($location != '') {
            if (is_numeric($location)) {
                array_push($metaquery,  array(
                    'key' => 'job_postalcode',
                    'value' =>  $location,
                    'compare' => 'LIKE',
                ));
            } else {
                array_push($metaquery, array('relation' => 'OR', 
                
                array(
                    'key' => 'job_town',
                    'value' => $location,
                    'compare' => 'LIKE',
                ),

                array(
                    'key' => 'job_location',
                    'value' => $location,
                    'compare' => 'LIKE',
                ),
                
                ));
            };
        };
    };
};



$args['meta_query'] = $metaquery;



$myquery = new WP_Query($args);
$wp_query = $myquery;

$postnumber = $myquery -> found_posts;



?>


<article class="after-nav">
    <div class="container-fluid bandeau bandeau-home ">
        <div class="container">
            <div class="container search">
                <form method="get" id="" action="<?php echo(get_site_url()); ?>">
                    <div class="row searchrow justify-content-center">
                        <div class=" col-md-3 search-item ">

                            <?php empty_brand_field(); ?>

                            <select name="marque" id="_marque-field" class="form-control form-select mt-2">
                                <option value="0" <?php if ($marque == 0) {
                                echo('selected');
                            } ?>>Toutes les marques</option>

                                <?php select_search_value(MARQUE, $marque); ?>

                            </select>
                        </div>

                        <div class=" col-md-6 search-item">

                            <?php empty_location_field(); ?>

                            <input type="text" id="location" name="location"
                                placeholder="Localisation (Code postale, Région, Ville, Département...)"
                                class="form-control  mt-2" value="<?php echo($location); ?>">
                        </div>
                    </div>

                    <div class="row searchrow justify-content-center">
                        <div class="col-md-6 search-submit text-centered">
                            <button type="submit" id="searchsubmit" class="btn" onclick="this.blur();"
                                title="Rechercher une offre d'emploi"><i class="fa fa-search" aria-hidden="true"></i>
                                Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Function refresh page if no post à > 0  -->

    <?php refresh_page($marque, $location); ?>


    <div class="container">
        <h3 class="offre-emploi">Nos offres d'emploi (<strong><?php echo $myquery -> found_posts ?></strong>) </h3>
        <?php if ($myquery->have_posts()) :
            ?>
        <?php
                    $index = 0;
            while ($myquery->have_posts()) : $myquery->the_post(); ?>
        <?php if ($index %2 == 0) : ?>
        <div class="row mt-lg-5">
            <?php endif; ?>
            <!-- LOOP CONTENT -->
            <?php
                $joborganisation = get_post_custom_values('job_organisation')[0];
                $logoname = strtolower(substr($joborganisation, -3, 3));
                $secteuractivite = get_post_custom_values('custom_secteur_activite')[0];
                $job_contract_type = get_post_custom_values('job_contract_type')[0];
                $jobtown = get_post_custom_values('job_town')[0];
                $joblocation = get_post_custom_values('job_location')[0];
                $joblink = get_post_custom_values('job_link')[0];
                $jobpostalcode = get_post_custom_values('job_postalcode')[0];

                ?>
            <div class="col-lg-6 wrapper-card">
                <div class="card h-100 rounded">
                    <div class="row card-block align-items-center">
                        <div class="card-logo col-2 ">
                            <?php if($logoname != NULL) : ?>
                            <img class="img-fluid rounded-circle"
                                src="<?php echo(get_template_directory_uri()); ?>/images/logo/<?php echo($logoname); ?>.jpg"
                                alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                                title="Holding RD Finance - <?php echo $joborganisation ; ?>" width="70"
                                max-height="50">
                            <?php else :  ?>

                            <img class="img-fluid rounded-circle"
                                src="<?php echo(get_template_directory_uri()); ?>/images/icone/faviconee.png"
                                alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                                title="Holding RD Finance - <?php echo $joborganisation ; ?>" width="70"
                                max-height="50">
                            <?php endif; ?>
                        </div>
                        <div class="card-content col-10">
                            <div class="row card-meta">
                                <div class="job-title">
                                    <?php echo the_title();  ?>
                                </div>
                            </div>
                            <br>
                            <p>
                                <i class="fa-solid fa-calendar-days"></i><span class="font-italic"> Publiée le
                                    <?php echo  get_the_date(); ?></span>
                            </p>

                            <?php if(is_null($job_contract_type)) : else : ?>
                            <p>
                                <i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo($job_contract_type); ?>
                            </p>
                            <?php endif; ?>

                            <?php if(is_null($joblocation)) : else : ?>
                            <p>
                                <i class="fa-solid fa-location-dot"></i> <?php echo($joblocation); ?>
                            </p>
                            <?php endif; ?>

                            <a href="<?php the_permalink() ?>" class="float-right" rel="bookmark"
                                title="<?php echo the_title(); ?>">
                                <button type="button" class="btn btn-voir-offre" onclick="this.blur();">Voir l'offre
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOOP CONTENT END -->

            <?php $index += 1; ?>
            <?php if ($index %2 == 0) : ?>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php if ($index %2 <> 0) : ?>
    </div>
    <?php endif; ?>

    <?php else : ?>
    <div class="container seach-not-found shadow-sm bg-light rounded-3 mt-5 mb-5 ">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-5 text-center">
                <h4 class="not-found-post-text mt-3 mb-3">Désolé ! Aucune offre ne correspond à votre recherche !
                </h4>
                <?php if(($_GET)) : ?>
                <a class="back-to-offers-link mt-4" href="<?php echo get_site_url();?>"><i class="fa fa-angle-left"
                        aria-hidden="true"></i> Revenir à la liste des offres</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-2 text-center">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="col-lg-5 text-center">
                <h4 class="not-found-post-text mt-3 mb-3">Vous pouvez soummetre une candidature spontanée</h4>
            </div>
            <div class="row text-center">
                <a class="mt-5" href="https://jobaffinity.fr/apply/mcmx2498axyex7d3ad" target="_blank"
                    title="Soumettre une candidature spontanée">
                    <button type="button" class="btn btn-primary" onclick="this.blur();"><i class="fa fa-plus"
                            aria-hidden="true"></i> Candidature
                        spontanée</button>
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </div>

    <div class="container">
        <div class="row justify-content-center">

            <!-- Pagination -->

            <?php rd_holding_pagination(); ?>
        </div>
    </div>

</article>