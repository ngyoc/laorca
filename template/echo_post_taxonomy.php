<?php
$taxonomy_slag = $args['taxonomy_slag'];
$flag_link = $args['flag_link'];

$terms = get_the_terms($post->ID, $taxonomy_slag);


foreach ((array)$terms as $term) {
    if (!is_wp_error(get_term_link($term->slug, $taxonomy_slag))) {
        if ($flag_link) :
            echo '<span class="post_taxonomy"><a href="' . get_term_link($term->slug, $taxonomy_slag) . '">' . $term->name . '</a></span>';
        else :
            echo '<span>' . $term->name . '</span>';
        endif;
    }
}
