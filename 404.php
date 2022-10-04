<?php
/***/

get_header(); ?>


<article class="after-nav">

<div class="container header-wrapper">

			<img class="header-img" src="<? echo(get_template_directory_uri()); ?>/images/bandeau-default.jpg" alt="">
</div>


<div class="container">

	<main id="main" class="site-main mt-3 text-center" role="main">

		<h1>Il n'y a pas de contenu à cette adresse. </h1>
		<p>

		Retrouvez toutes nos opportunités d'emploi sur la page des offres.
	</p>

		<p class="text-center">
			<a href="<?php echo(get_site_url()); ?>/contact-logiciel/">
			<button type="button" class="btn btn-blue">Trouver un poste</button></a>
		</p>


	</main><!-- #main -->

</div>

<?php
get_sidebar();
get_footer();
?>
