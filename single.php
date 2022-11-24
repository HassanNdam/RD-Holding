<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */


$location = "";
$marque = 0;

if($_GET) {

	if (isset($_GET['location'])) {
		$location = $_GET['location'];
	};
};

get_header(); ?>



<?php while ( have_posts() ) : the_post(); ?>
<?php 
		$joborganisation = get_post_custom_values('job_organisation')[0];
		// $logoname = strtolower(substr($joborganisation, -3, 3));
		$secteuractivite = get_post_custom_values('custom_secteur_activite')[0];
		$job_contract_type = get_post_custom_values('job_contract_type')[0];
		$jobtown = get_post_custom_values('job_town')[0];
		$joblocation = get_post_custom_values('job_location')[0];
		$joblink = get_post_custom_values('job_link')[0];
		$jobpostalcode = get_post_custom_values('job_postalcode')[0];

	?>

</div>

<div class="container">
    <div class="breadscrumbs">
        <a href="<?= get_site_url(); ?>" title="Revenir l'acceuil de RD Holding"><i class="fa fa-home"
                aria-hidden="true"></i> Accueil
        </a>
        < <?php echo  get_the_title(); ?> <a
            href="<?php echo(get_site_url()); ?>?location=<?php echo($location . '&marque=' . $marque); ?>" class=""
            rel="bookmark">
            < Revenir à la liste des offres </a>
    </div><br>
</div>
<div class="container mb-4">
    <?php image_post_change_location($joborganisation);?>
</div>
<article class="after-nav">
    <div class="container">
        <div class="row mb-3 align-items-center d-flex">
            <div class="col-lg-12 bg-light p-3">
                <h1 class="mb-lg-5">
                    <?php  echo the_title(); ?>
                </h1>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <p><?php date_pub(); ?></p>

                        <?php if(is_null($job_contract_type)) : else : ?>
                        <p><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo ($job_contract_type); ?>
                        </p>
                        <?php endif; ?>

                        <?php if(is_null($joblocation)) : else : ?>
                        <p> <i class="fa-solid fa-location-dot"></i>
                            <?php echo($joblocation); echo ', ' . ($jobtown); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container job-description">
        <div class="row">
            <div class="col-lg-12">
                <?php the_content(); ?>
                <p class="job-application text-center">
                    <a href="<?php echo($joblink); ?>" target="_blank" rel="bookmark" title="postuler">
                        <button type="button" class="btn btn-blue">Postuler</button>
                    </a>
                </p>
            </div>
        </div>
    </div>
</article>



<?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>