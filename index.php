<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
include('data.php');
get_header(); 

global $wp_query;

$args = $wp_query->query_vars;
$contrat = '0';
$metier = '0';
$location = "";
$searchstring = "";
$args['post_type'] = 'post';



$metaquery = array();

if($_GET) {
	if (isset($_GET['s'])) {
		 $searchstring = $_GET['s'];
		 };


	if (isset($_GET['metier'])) {
		$metier = $_GET['metier'];

		if ($metier > 0) {
			array_push($metaquery, array(
				'key' => 'custom_secteur_activite',
		        'value' => METIERS[$metier - 1],
		        'compare' => '=',
		    ));
		};
	};

};


$args['meta_query'] = $metaquery;



$myquery = new WP_Query( $args );
$wp_query = $myquery;

?>


<article class="after-nav">

<div class="container-fluid bandeau bandeau-home">
		<div class="container search">
		<form method="get" id="" action="<?php echo(get_site_url()); ?>">
			<div class="row searchrow justify-content-center">
				<div class=" col-md-3 search-item">
					<select name="metier" id="_metier-field" class="form-control form-select">
						<option value="0" <?php if ($metier == '0') echo('selected'); ?>>Tous les métiers</option>
						<?php 
						$size = count(METIERS);
						for($i=0; $i < $size;++$i) {
							echo("<option value='" . ($i + 1) . "'");
							if($metier == $i + 1) {
								echo(" selected='selected'");
							}
							echo(">". METIERS[$i] . "</option>");
						};
						?>

					</select>
				</div>

				<div class=" col-md-6 search-item">
					<input type="text" id="s" name="s" placeholder="Poste, Mots-clés, Localisation" class="form-control" value="<?php echo($searchstring); ?>">
				</div>

			</div>

			<div class="row searchrow justify-content-center">
				<div class = " col-md-6 search-submit text-centered">
					<button type="submit" id="searchsubmit" class="btn btn-yellow">Rechercher</button>
				</div>
			</div>
		</form>
	</div> <!-- form wrapper end -->
</div>

	<div class="container jobs">
		<br>
		<h3>Les offres d'emploi (<strong><?php echo $myquery -> found_posts ?></strong>) </h3>
		<br>

				<?php if ( $myquery->have_posts() ) : ?>
					<?php 
					$index = 0;   
					while ( $myquery->have_posts() ) : $myquery->the_post(); ?>
						<?php if ( $index %2 == 0 ) : ?>
						<div class="row  ">
						<?php endif; ?>
						 <!-- LOOP CONTENT -->
						<?php 
						$joborganisation = get_post_custom_values('job_organisation')[0];
						$logoname = strtolower(substr($joborganisation, 0, 5));
						$secteuractivite = get_post_custom_values('custom_secteur_activite')[0];
						$contrat = get_post_custom_values('job_contract_type')[0];
						$location = get_post_custom_values('job_town')[0]
						?>
						<div class="col-lg-6 wrapper-card">
							<div class="card h-100">
							    <div class="row card-block align-items-center">
							    	<div class="card-logo col-2">
										<img class="img-fluid rounded" src="<?php the_post_thumbnail_url('thumbnails'); ?>" alt="image" max-width="500" max-height="200">
									</div>
						            <div class="card-content col-10">
						            	<div class="row card-meta">
						            		<div class="job-title">
								                    <?php the_title(); ?>
								            </div>
								        </div>
										<br>
										<p> 
											<?php intuition_posted_on(); ?>   
										</p>
										<p>
												<i class="fa-solid fa-file-signature"></i>  </i><?php echo($contrat); ?>
										</p>
										<p>
												<i class="fa-solid fa-location-dot"></i>  </i><?php echo($location); ?>
										</p>
						                <a href="<?php the_permalink() ?>?s=<?php echo($searchstring . '&metier=' . $metier); ?>" class="float-right" rel="bookmark" title="<?php the_title_attribute(); ?>">
						                    <button type="button" class="btn btn-blue">Voir l'offre <i class="fa-solid fa-angle-right" style="color:#bd9d7b; font-size: 20px"></i></button>
						                </a>
						            </div>
						        </div>
							</div>
						</div>
						 <!-- LOOP CONTENT END -->

						<?php $index += 1; ?>
						<?php if ( $index %2 == 0 ) : ?>
						    </div>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php if ( $index %2 <> 0 ) : ?>
					    </div>
					<?php endif; ?>
					
				<?php else : ?>
					<h2 class="no-result text-centered">Aucun poste ne correspond à votre recherche</h2>
				<?php endif; ?>
	</div>

	<div class="container">
		<div class="row justify-content-center">

			<!-- The pagination component -->

			<?php intuition_pagination(); ?>
		</div>
	</div> 

</article>

<?php get_footer(); ?>
