<?php
$the_query = $args['the_query'];
$paged = $args['paged'];
$pagenation_type = $args['pagenation_type'];


if ($the_query->max_num_pages > 1) :
    echo '<div class="pagenation-wrap">';
    echo '<div class="pagenation ' . $pagenation_type . '-pagenation">';
    echo paginate_links(array(
        'format'             => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $the_query->max_num_pages,
        'next_text' => '>',
        'prev_text' => '<'
    ));
    echo '</div>';
    echo '</div>';
endif;
