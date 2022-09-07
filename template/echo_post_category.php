<?php
$cats = get_the_category();
if (!empty($cats)) {
    printf(
        '%s',
        $cats[0]->name
    );
} else {
    printf('未分類');
}
