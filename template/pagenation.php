<?php
$the_query = $args['the_query'];
$paged = $args['paged'];
$pagenation_type = $args['pagenation_type'];


if ($the_query->max_num_pages > 1) :
    echo '<div class="pagenation-wrap">';
    echo '<div class="pagenation ' . $pagenation_type . '-pagenation">';
    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $the_query->max_num_pages,
        'next_text' => 'OLD',
        'prev_text' => 'NEW'
    ));
    echo '</div>';
    echo '</div>';
endif;
