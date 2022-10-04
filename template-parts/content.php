<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */


$location = get_post_custom_values('job_location');
$entity = get_post_custom_values('job_entity');
$contracttype = get_post_custom_values('job_contract_type');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="header-nav"><a href="<?php echo(get_site_url()); ?>">» liste des postes</a></div>
	<?php if ( has_post_thumbnail() && is_single() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail('full', array('class' => 'rounded')); ?>
		</div><!--  .post-thumbnail -->
		<?php else : ?>
			<div class="post-thumbnail">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('full', array('class' => 'rounded')); ?>
		    </a>
		</div><!--  .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="">
			<p><?php echo($contracttype[0]) ?> - <?php intuition_posted_on(); ?></p>

		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'strappress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strappress' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="apply">
		<?php $joblink = get_post_custom_values('job_link'); ?>
		<a href="<?php echo($joblink[0]); ?>" target="_blank"><button class="btn btn-relais">Postuler</button></a>
	</div>




</article><!-- #post-## -->
