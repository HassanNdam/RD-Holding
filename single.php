<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */

$contrat = '0';
$metier = '0';
$location = "";
$searchstring = "";


if($_GET) {
	if (isset($_GET['s'])) {
		 $searchstring = $_GET['s'];
		 };

	if (isset($_GET['contrat'])) {
		$contrat = $_GET['contrat'];
	};


	if (isset($_GET['metier'])) {
		$metier = $_GET['metier'];
	};

	if (isset($_GET['location'])) {
		$location = $_GET['location'];
	};
};

get_header(); ?>



	<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		$joborganisation = get_post_custom_values('job_organisation')[0];
		$logoname = strtolower(substr($joborganisation, 0, 5));
		$joblink = get_post_custom_values('job_link')[0];
		$secteuractivite = get_post_custom_values('custom_secteur_activite')[0];

	?>
<article class="after-nav">
	<div class="container-fluid bandeau-single">
	</div>

	<div class="container header-wrapper">
	<div class="breadscrumbs">
		<a href="<?php echo(get_site_url()); ?>?s=<?php echo($searchstring . '&metier=' . $metier); ?>" class="" rel="bookmark">
			» Retour à la liste des postes
		</a>
	</div>
	</div>

	<div class="container job-description">
		<div class="row">
			<div class="col job-content mb-4">
				<img class="img-fluid" src="<? echo(get_template_directory_uri()); ?>/images/<? echo($logoname); ?>.png"> 
			</div>
		</div>

		<div class="row mb-4 align-items-center">
			<div class="col job-content">
				<h1>
			        <?php the_title(); ?>
			     </h1>
				<i><? echo($secteuractivite); ?>&nbsp;</i>
				<p><?php intuition_posted_on(); ?></p>
			</div>
        </div>


		<div class="row">
			<div class="col-lg-1 job-margin vanish">
				&nbsp;
			</div>
			<div class="col-lg-11 job-content">
				<?php the_content(); ?>
				<p class="job-apply">
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
