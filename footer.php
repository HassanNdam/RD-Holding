<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

?>


<section id="wrapper-footer" class="bg-blue">

	<div class="container">
		<div class="row footer-row">
			<div class="col-lg-3 footer-links">
				<h5><a href="https://www.ogf.fr/" target="_blank">
					<img src="<?php echo(get_template_directory_uri()) . '/images/logo-footer.png' ?>" class="img-fluid" alt="">
				</a></h5>
			</div><!--col end -->

			<div class="col-lg-3 footer-links">
				<h5><a href="https://www.ogf.fr/metier-qui-a-du-sens" target="_blank">Contact</a></h5>
			</div><!--col end -->
			<div class="col-lg-3 footer-links">
				<h5><a href="https://www.ogf.fr/mentions-legales" class="white-text" >Mentions légales</a></h5>
			</div>
			<div class="col-lg-3 footer-links">
				<h5><a href="https://www.linkedin.com/company/ogf/" target="_blank">
				<i class="fa-brands fa-linkedin-in"></i>
					</a>
				</h5>
			</div>

							<!--col end -->
		</div><!-- row end -->

		<hr class="footer-separator">

		<div class="row footer-copyright">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<p class="copyright">© Copyright 2022 - Groupe OGF - Powered by <a href="https://paradisiak.com/" target="_blank" class="copyright">Paradisiak</a> </p>
			</div>
			<div class="col-lg-2"></div>


		</div>
	</div><!-- container end -->
</section>





<?php wp_footer(); ?>
<script src="<?php echo(get_template_directory_uri() . '/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?php echo(get_template_directory_uri() . '/js/bootstrap.min.js') ?>"></script>
</body>
</html>