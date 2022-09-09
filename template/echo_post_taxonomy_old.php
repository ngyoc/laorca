<?php
$taxonomy_slag = $args['taxonomy_slag'];
$flag_link = $args['flag_link'];
$cat_or_tag = $args['cat_or_tag'];
?>

<?php
// $term = get_the_terms($post->ID, $taxonomy_slag);


if ($cat_or_tag == 'cat') :
    $terms = get_the_terms($post->ID, $taxonomy_slag);

    foreach ((array)$terms as $term) {



        if ($flag_link) :
            // echo '<a href="' . get_term_link($term[0]->slug, $taxonomy_slag) . '">' . $term[0]->name . '</a>';
            echo '<span><a href="' . get_term_link($term->slug, $taxonomy_slag) . '">' . $term->name . '</a></span>';
        else :
            // echo $term[0]->name;
?>
            <span><?php echo $term->name; ?></span>
            <?php

        endif;
    }


elseif ($cat_or_tag == 'tag') :
    $terms = get_the_terms($post->ID, $taxonomy_slag);


    foreach ((array)$terms as $term) {

        if (!is_wp_error(get_term_link($term->slug, $taxonomy_slag))) { // タグ未設定時エラー
            if ($flag_link) :
                echo '<span><a href="' . get_term_link($term->slug, $taxonomy_slag) . '">' . $term->name . '</a></span>';
            else :
            ?>
                <span><?php echo $term->name; ?></span>
<?php

            endif;
        }
    }

endif;
