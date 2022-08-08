<?php


// カスタムメニューを追加
function menu_setup()
{
    register_nav_menus(array(
        'global' => 'グローバルメニュー',
        'side'   => 'サイドメニュー',
        'footer' => 'フッターメニュー',
    ));
}

add_action('after_setup_theme', 'menu_setup');

// アイキャッチ
add_theme_support('post-thumbnails');

// 抜粋の文末文字を指定
function custom_excerpt_more($more)
{
    return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');


// カスタム投稿を追加
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type('strength', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '強み', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'strength',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => false, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
        'supports' => array('title', 'editor', 'thumbnail')
    ]);

    register_post_type('services', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => 'サービス', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'services',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => false, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
    ]);

    register_post_type('works', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '実績', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'works',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => false, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
    ]);

    register_taxonomy_for_object_type('category', 'strength');
    // register_taxonomy_for_object_type('category', 'services');
    register_taxonomy_for_object_type('category', 'works');
}

// LAORCA専用設定ページの追加
require get_template_directory() . '/laorca_menu/laorca_menu.php';
