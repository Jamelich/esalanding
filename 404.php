<?php
get_header();
?>

<section class="page404">
	<h1 class="page-title">404</h1>
	<h4>Наш сайт постоянно обновляется, т.к. мы стараемся предоставлять для Вас самую свежую информацию.</h4>
	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<p>Скорее всего, именно поэтому Вы попали сюда. Но у нас есть несколько интересных предложений.</p>
			<?php echo do_shortcode('[products limit="8" columns="4" orderby="rand"]'); ?>
			<p>Или воспользуйтесь поиском</p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
</section>
<?php
get_footer();
