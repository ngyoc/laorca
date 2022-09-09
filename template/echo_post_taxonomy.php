<?php
$taxonomy_slag = $args['taxonomy_slag'];
$flag_link = $args['flag_link'];
$cat_or_tag = $args['cat_or_tag'];

$terms = get_the_terms($post->ID, $taxonomy_slag);

// echo $taxonomy_slag;
// echo $flag_link;
// echo $cat_or_tag;

foreach ((array)$terms as $term) {
    if (!is_wp_error(get_term_link($term->slug, $taxonomy_slag))) { // タグ未設定時エラー
        if ($flag_link) :
            echo '<span class="post_taxonomy"><a href="' . get_term_link($term->slug, $taxonomy_slag) . '">' . $term->name . '</a></span>';
        else :
            echo $term->name;
        endif;
    }
}
