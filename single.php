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
		$logoname = strtolower(substr($joborganisation, -3, 3));
		$secteuractivite = get_post_custom_values('custom_secteur_activite')[0];
		$job_contract_type = get_post_custom_values('job_contract_type')[0];
		$jobtown = get_post_custom_values('job_town')[0];
		$joblocation = get_post_custom_values('job_location')[0];
		$joblink = get_post_custom_values('job_link')[0];
		$jobpostalcode = get_post_custom_values('job_postalcode')[0];

	?>
<article class="after-nav">
    <div class="container">
        <div class="row mb-3 align-items-center d-flex">
            <div class="col-lg-12 bg-light p-5 mb-5">
                <h1 class="text-center mb-lg-5">
                    <?php  echo the_title(); ?>
                </h1>
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <?php if($joborganisation == "Burger King") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/burger_king.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php elseif($joborganisation == "L'Edito") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/ledito.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php elseif($joborganisation == "Le Millénaire") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/lemillenaire.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php elseif($joborganisation == "Lexperience") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/Lexperience.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php elseif($joborganisation == "Startbucks") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/starbucks.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php elseif($joborganisation == "Sherlock") : ?>
                        <img class="img-fluid rounded-circle"
                            src="<?php echo(get_template_directory_uri()); ?>/images/post/Sherlock.jpg" width="200"
                            height="50" alt="Holding RD Finance - <?php echo $joborganisation ; ?>"
                            title="Holding RD Finance - <?php echo $joborganisation ; ?>">

                        <?php endif; ?>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <p><?php date_pub(); ?></p>

                        <?php if(is_null($job_contract_type)) : else : ?>
                        <p><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo ($job_contract_type); ?></p>
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

    <div class="container header-wrapper">
        <div class="breadscrumbs">
            <a href="<?= get_site_url(); ?>" title="Revenir l'acceuil de RD Holding"><i class="fa fa-home"
                    aria-hidden="true"></i> Accueil
            </a>
            < <?php echo  get_the_title(); ?> <a
                href="<?php echo(get_site_url()); ?>?location=<?php echo($location . '&marque=' . $marque); ?>" class=""
                rel="bookmark">
                < Revenir à la liste des offres </a>
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