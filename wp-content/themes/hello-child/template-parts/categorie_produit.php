<div class="categorie_produit">
<?php
$arg = array(
	// permet de sélectionner par post-type
	'post_type' => 'produit',

	// précise le nombre maximum de posts à afficher
	'posts_per_page' => 4,

	// permet de sélectionner par taxonomie
	'tax_query' => array(
        array(
            'taxonomy' => 'categorie_produit',
            'field'    => 'slug',
			// c'est ici qu'on place le slug récupéré plus haut
            'terms'    => $slug,
        ),
    ),
);
$query = new WP_Query( $arg );
if($query->have_posts()){
	while($query->have_posts()){
		$query->the_post();
		// on récupère les informations nécessaires
		$image = get_the_post_thumbnail();

		$title = get_the_title();
		$excerpt = get_the_excerpt();
		$url = get_post_permalink();
		?>
			<a class="categorie_produit_item" href="<?=$url?>">
				<?=$image?>
				<h3><?=$title?></h3>
				<p><?=$excerpt?></p>
			</a>
		<?php
	}
}
?>
</div>
