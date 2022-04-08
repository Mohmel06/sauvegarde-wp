<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$terms_arg = array(
	'taxonomy'=>'categorie_produit',
	'orderby'=> 'name',
	'parent'=>'0',
);
$term_array = get_terms($terms_arg);
$slug_array = [];
foreach($term_array as $term){
	$slug = $term->slug;
	array_push($slug_array, $slug);
}

?>
<main id="content" class="site-main accuei" role="main">
<?php
foreach($slug_array as $slug){
	include 'template-parts/categorie_produit.php';
}
?>
</main>
<?php





/*
$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

if ( is_singular() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/single-produit' );
	}
} elseif ( is_archive() || is_home() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/archive-produit' );
	}
} elseif ( is_search() ) {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'archive' ) ) {
		get_template_part( 'template-parts/search' );
	}
} else {
	if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/404' );
	}
}
*/
get_footer();
