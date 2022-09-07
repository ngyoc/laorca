<?php
$taxonomy_type = $args['taxonomy_type'];
$page_title = $args['page_title'];
?>

<?php echo '<div class="section--' . $taxonomy_type . '-title-wrap section-title-wrap">' ?>

<?php echo '<div class="section--' . $taxonomy_type . '-title section-title">' ?>
<?php echo ' <h2><p>' . $page_title . '</p></h2>' ?>
</div><!-- /.section--title -->

<?php echo '<div class="section--' . $taxonomy_type . '-subtitle section-subtitle">' ?>

<?php if ($page_title == 'WORKS') : ?>
    <p>実績</p>

<?php elseif ($page_title == 'SERVICE') : ?>
    <p>事業内容</p>

<?php elseif ($page_title == 'BLOG') : ?>
    <p>ブログ</p>

<?php endif; ?>



</div><!-- /.section--subtitle -->

</div><!-- /.section-title-wrap -->
