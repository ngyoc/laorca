<?php
$tags = get_the_tags();
if (!empty($tags)) {
    printf(
        '%s',
        $tags[0]->name
    );
} else {
    printf('未分類');
}
