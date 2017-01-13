<?php 

// Get the featured image ==== todo

global $post;
/* Get an array of Ancestors and Parents if they exist */
$parents = get_post_ancestors( $post->ID );
/* Get the top Level page->ID count base 1, array base 0 so -1 */ 
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
/* Get the parent and set the $class with the page slug (post_name) */
$parent = get_post( $id );
$parentID = $parent->ID;


$listArgs = array(
	'child_of' => $parentID,
	'title_li' => ''
);

 ?>

<section class="subnav">
	<?php wp_list_pages( $listArgs ); ?>
</section>	