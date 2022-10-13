<?php
$title_slag = $args['title_slag'];
$page_title = $args['page_title'];
$page_subtitle = $args['page_subtitle'];
$flag_showtitle = true;
?>

<?php
if ($flag_showtitle) {
    echo '<div class="section--' . $title_slag . '-title-wrap section-title-wrap">';

    echo '  <div class="section--' . $title_slag . '-title section-title">';
    echo '    <h2><p>' . $page_title . '</p></h2>';
    echo '  </div>';

    echo '  <div class="section--' . $title_slag . '-subtitle section-subtitle">';
    echo '    <p>' . $page_subtitle . '</p>';
    echo '  </div>';

    echo '</div>';
} ?>
