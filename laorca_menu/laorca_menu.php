<?php
// ------------------------------------------------------------------------------------------------------
// メニュー用準備

// カラーピッカー用スタイル準備
add_action('admin_enqueue_scripts', function () {
  wp_enqueue_script('wp-color-picker');
  wp_enqueue_style('wp-color-picker');
  wp_add_inline_script(
    'wp-color-picker',
    'jQuery(document).ready(function($){
      $(\'.color-picker-hex\').wpColorPicker();
    });'
  );
});

// メディアアップローダー
add_action('admin_print_scripts', 'my_admin_scripts');
function my_admin_scripts()
{
  wp_enqueue_media();
}

// ------------------------------------------------------------------------------------------------------


// メニューページ作成
add_action('admin_menu', 'my_add_admin_menu');
function my_add_admin_menu()
{
  add_options_page(
    'LA ORCA メニューページ', // 設定画面のページタイトル.
    'LA ORCA', // 管理画面メニューに表示される名前.
    'manage_options',
    'laorca-menu', // メニューのスラッグ. my-original-menu urlに使用される. リロードすると弾かれるので注意
    'my_original_menu_page' // メニューの中身を表示させる関数の名前. my_original_menu_page
  );
}

// オリジナルメニューページ出力用関数
function my_original_menu_page()
{
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
?>
  <div class="wrap">
    <h1>LA ORCA メニューページ</h1>
    <form method="POST" action="options.php">
      <?php
      settings_fields('laorca-menu'); // ページのスラッグ.
      do_settings_sections('laorca-menu');  // ページのスラッグ.
      submit_button();
      ?>
    </form>
  </div>
<?php
}


// オリジナル設定項目の準備
add_action('admin_init', 'my_init_original_settings');

function my_init_original_settings()
{
  // 設定のセクション追加
  // セクション追加 ヘッダー設定用
  add_settings_section(
    'laorca-menu-section-header', // 管理用：セクションのスラッグ
    'ヘッダー設定',          // 表示用：セクション名
    null,                    // 表示用：セクション説明
    'laorca-menu'            // 管理用：セクションを作成するページのスラッグ
  );

  // セクション追加 テーマカラー設定用
  // add_settings_section('laorca-menu-section-2', 'テーマカラー設定', null, 'laorca-menu');   // THEME
  add_settings_section('laorca-menu-section-hero',     'HERO',     null, 'laorca-menu'); // HERO
  add_settings_section('laorca-menu-section-strength', 'STRENGTH', null, 'laorca-menu'); // STRENGTH
  add_settings_section('laorca-menu-section-service',  'SERVICE',  null, 'laorca-menu'); // SERVICE
  add_settings_section('laorca-menu-section-works',    'WORKS',    null, 'laorca-menu'); // WORKS
  add_settings_section('laorca-menu-section-about',    'ABOUT',    null, 'laorca-menu'); // ABOUT
  add_settings_section('laorca-menu-section-blog',     'BLOG',     null, 'laorca-menu'); // BLOG
  add_settings_section('laorca-menu-section-contact',  'CONTACT',  null, 'laorca-menu'); // CONTACT
  add_settings_section('laorca-menu-section-footer',   'フッター', null, 'laorca-menu'); // footer
  add_settings_section('laorca-menu-section-page-header', '各固定ページヘッダー画像', 'page_header_section_desc', 'laorca-menu'); // footer


  // ------------------------------------------------------------------------------------------------------
  // オリジナル設定項目追加

  // 管理用：項目名, 表示用：設定項目名, 表示用：レイアウト作成用HTML関数, 管理用：設定追加先ページスラッグ, 管理用：設定追加先セクションスラッグ
  add_settings_field('sns_link_facebook',  'Facebook URL',  'display_facebook_url_option',   'laorca-menu', 'laorca-menu-section-header');   // header sns_link
  add_settings_field('sns_link_twitter',   'Twitter URL',   'display_twitter_url_option',    'laorca-menu', 'laorca-menu-section-header');   // header sns_link
  add_settings_field('sns_link_instagram', 'Instagram URL', 'display_instagram_url_option',  'laorca-menu', 'laorca-menu-section-header');  // header sns_link
  add_settings_field('sns_link_youtube',   'YouTube URL',   'display_youtube_url_option',    'laorca-menu', 'laorca-menu-section-header');   // header sns_link

  // 投稿用設定
  add_settings_field('default_thumbnail', 'デフォルトアイキャッチ画像の設定', 'display_default_thumbnail_option', 'laorca-menu', 'laorca-menu-section-header');

  // テーマカラー用設定
  // add_settings_field('themecolor_header_hover', 'ヘッダー マウスホバー色', 'display_color_header_hover_option', 'laorca-menu', 'laorca-menu-section-2');
  // add_settings_field('themecolor_post_hover', '投稿 マウスホバー色', 'display_color_header_post_option', 'laorca-menu', 'laorca-menu-section-2');

  // ヒーローセクション
  add_settings_field('top_hero_image', 'HOME画面のHERO画像の設定', 'display_hero_image_option',            'laorca-menu', 'laorca-menu-section-hero');
  add_settings_field('top_hero_main_text',    'メインテキスト',    'display_top_hero_main_text_option',    'laorca-menu', 'laorca-menu-section-hero');
  add_settings_field('top_hero_sub_text',     'サブテキスト',      'display_top_hero_sub_text_option',     'laorca-menu', 'laorca-menu-section-hero');
  add_settings_field('top_hero_desc_text',    '説明文',            'display_top_hero_desc_text_option',    'laorca-menu', 'laorca-menu-section-hero');
  add_settings_field('top_hero_contact_text', 'ボタン テキスト',   'display_top_hero_contact_text_option', 'laorca-menu', 'laorca-menu-section-hero');
  add_settings_field('top_hero_contact_url',  'ボタン リンク先',   'display_top_hero_contact_url_option',  'laorca-menu', 'laorca-menu-section-hero');

  // STRENGTH
  add_settings_field('strength_btn_text', 'ボタン テキスト', 'display_strength_btn_text_option', 'laorca-menu', 'laorca-menu-section-strength');
  add_settings_field('strength_btn_url',  'ボタン リンク先', 'display_strength_btn_url_option',  'laorca-menu', 'laorca-menu-section-strength');

  // SERVICE
  add_settings_field('service_btn_text', 'ボタン テキスト', 'display_service_btn_text_option', 'laorca-menu', 'laorca-menu-section-service');
  add_settings_field('service_btn_url',  'ボタン リンク先', 'display_service_btn_url_option',  'laorca-menu', 'laorca-menu-section-service');

  // WORKS
  add_settings_field('works_btn_text', 'ボタン テキスト', 'display_works_btn_text_option', 'laorca-menu', 'laorca-menu-section-works');
  add_settings_field('works_btn_url',  'ボタン リンク先', 'display_works_btn_url_option',  'laorca-menu', 'laorca-menu-section-works');

  // ABOUT
  add_settings_field('about_image',     'ABOUTセクション 画像の設定', 'display_about_image_option',     'laorca-menu', 'laorca-menu-section-about');
  add_settings_field('about_desc_text', 'ABOUT セクション 説明文',    'display_about_desc_text_option', 'laorca-menu', 'laorca-menu-section-about');
  add_settings_field('about_btn_text',  '問い合わせボタンテキスト',   'display_about_btn_text_option',  'laorca-menu', 'laorca-menu-section-about');
  add_settings_field('about_btn_url',   '問い合わせボタン リンク先',  'display_about_btn_url_option',   'laorca-menu', 'laorca-menu-section-about');

  // BLOG
  add_settings_field('blog_btn_text',   '問い合わせボタンテキスト',   'display_blog_btn_text_option',   'laorca-menu', 'laorca-menu-section-blog');
  add_settings_field('blog_btn_url',   '問い合わせボタン リンク先',  'display_blog_btn_url_option',   'laorca-menu', 'laorca-menu-section-blog');

  // CONTACT
  add_settings_field('contact_tell_num', '連絡先電話番号', 'display_contact_tell_num_option', 'laorca-menu', 'laorca-menu-section-contact');
  add_settings_field('contact_tell_text', '連絡先説明文',   'display_contact_tell_text_option', 'laorca-menu', 'laorca-menu-section-contact');
  add_settings_field('contact_btn_text',  '問い合わせボタンテキスト',  'display_contact_btn_text_option', 'laorca-menu', 'laorca-menu-section-contact');
  add_settings_field('contact_btn_url',  '問い合わせボタン リンク先', 'display_contact_btn_url_option', 'laorca-menu', 'laorca-menu-section-contact');

  // 各固定ページヘッダー画像
  add_settings_field('page_header_image_strength', 'STRENGTH', 'display_page_header_image_strength_option', 'laorca-menu', 'laorca-menu-section-page-header');
  add_settings_field('page_header_image_service',  'SERVICE',  'display_page_header_image_service_option',  'laorca-menu', 'laorca-menu-section-page-header');
  add_settings_field('page_header_image_work',     'WORK',  'display_page_header_image_work_option',  'laorca-menu', 'laorca-menu-section-page-header');
  add_settings_field('page_header_image_about',    'ABOUT',  'display_page_header_image_about_option',  'laorca-menu', 'laorca-menu-section-page-header');
  add_settings_field('page_header_image_blog',     'BLOG',  'display_page_header_image_blog_option',  'laorca-menu', 'laorca-menu-section-page-header');
  add_settings_field('page_header_image_contact',  'CONTACT',  'display_page_header_image_contact_option',  'laorca-menu', 'laorca-menu-section-page-header');


  // ------------------------------------------------------------------------------------------------------
  // 設定の登録

  // ヘッダー
  register_setting('laorca-menu', 'sns_link_facebook');
  register_setting('laorca-menu', 'sns_link_twitter');
  register_setting('laorca-menu', 'sns_link_instagram');
  register_setting('laorca-menu', 'sns_link_youtube');

  // 投稿
  register_setting('laorca-menu', 'default_thumbnail');

  // テーマ
  // register_setting('laorca-menu', 'themecolor_header_hover');
  // register_setting('laorca-menu', 'themecolor_post_hover');

  // ヒーローセクション
  register_setting('laorca-menu', 'top_hero_image');
  register_setting('laorca-menu', 'top_hero_sub_text');
  register_setting('laorca-menu', 'top_hero_main_text');
  register_setting('laorca-menu', 'top_hero_desc_text');
  register_setting('laorca-menu', 'top_hero_contact_text');
  register_setting('laorca-menu', 'top_hero_contact_url');

  // STERNGTH
  register_setting('laorca-menu', 'strength_btn_text');
  register_setting('laorca-menu', 'strength_btn_url');

  // SERVICE
  register_setting('laorca-menu', 'service_btn_text');
  register_setting('laorca-menu', 'service_btn_url');

  // WORKS
  register_setting('laorca-menu', 'works_btn_text');
  register_setting('laorca-menu', 'works_btn_url');

  // ABOUT
  register_setting('laorca-menu', 'about_image');
  register_setting('laorca-menu', 'about_desc_text');
  register_setting('laorca-menu', 'about_btn_text');
  register_setting('laorca-menu', 'about_btn_url');

  // BLOG
  register_setting('laorca-menu', 'blog_btn_text');
  register_setting('laorca-menu', 'blog_btn_url');

  // コンタクトセクション
  register_setting('laorca-menu', 'contact_tell_num');
  register_setting('laorca-menu', 'contact_tell_text');
  register_setting('laorca-menu', 'contact_btn_text');
  register_setting('laorca-menu', 'contact_btn_url');

  // 各固定ページ ヘッダー画像設定セクション
  register_setting('laorca-menu', 'page_header_image_strength');
  register_setting('laorca-menu', 'page_header_image_service');
  register_setting('laorca-menu', 'page_header_image_work');
  register_setting('laorca-menu', 'page_header_image_about');
  register_setting('laorca-menu', 'page_header_image_blog');
  register_setting('laorca-menu', 'page_header_image_contact');
}


// 表示用：セクション説明文関数
function my_original_menu_section_func()
{
  echo '<p>LA ORCAセクション１です</p>';
}

function page_header_section_desc()
{
  echo '<p>推奨サイズ 1920px x 350px</p>';
}

// ------------------------------------------------------------------------------------------------------
// 表示用：設定項目レイアウト作成用HTML関数

// ヘッダー
function display_facebook_url_option()
{
  $sns_link_facebook = get_option('sns_link_facebook');
?>
  <input type="text" id="sns_link_facebook" name="sns_link_facebook" value="<?php echo $sns_link_facebook; ?>">
<?php
}

function display_twitter_url_option()
{
  $sns_link_twitter = get_option('sns_link_twitter');
?>
  <input type="text" id="sns_link_twitter" name="sns_link_twitter" value="<?php echo $sns_link_twitter; ?>">
<?php
}

function display_instagram_url_option()
{
  $sns_link_instagram = get_option('sns_link_instagram');
?>
  <input type="text" id="sns_link_instagram" name="sns_link_instagram" value="<?php echo $sns_link_instagram; ?>">
<?php
}

function display_youtube_url_option()
{
  $sns_link_youtube = get_option('sns_link_youtube');
?>
  <input type="text" id="sns_link_youtube" name="sns_link_youtube" value="<?php echo $sns_link_youtube; ?>">
<?php
}
// ヘッダー ここまで


// テーマ カラー設定
function display_color_header_hover_option()
{
  $themecolor_header_hover = get_option('themecolor_header_hover');
?>
  <input name="themecolor_header_hover" class="color-picker-hex" type="text" id="themecolor_header_hover" maxlength="7" value="<?php echo $themecolor_header_hover; ?>" placeholder="#888888" data-default-color="#222222">
<?php
}

function display_color_header_post_option()
{
  $themecolor_post_hover = get_option('themecolor_post_hover');
?>
  <input name="themecolor_post_hover" class="color-picker-hex" type="text" id="themecolor_post_hover" maxlength="7" value="<?php echo $themecolor_post_hover; ?>" placeholder="#888888" data-default-color="#222222">
<?php
}
// テーマ カラー設定 ここまで


// HEROセクション
function display_top_hero_main_text_option()
{
  $top_hero_main_text = get_option('top_hero_main_text');
?>
  <input type="text" id="top_hero_main_text" name="top_hero_main_text" value="<?php echo $top_hero_main_text; ?>">
<?php
}

function display_top_hero_sub_text_option()
{
  $top_hero_sub_text = get_option('top_hero_sub_text');
?>
  <input type="text" id="top_hero_sub_text" name="top_hero_sub_text" value="<?php echo $top_hero_sub_text; ?>">
<?php
}

function display_top_hero_desc_text_option() // HERO 説明文
{
  $top_hero_desc_text = get_option('top_hero_desc_text');
?>
  <!-- <input type="text" id="top_hero_desc_text" name="top_hero_desc_text" value="<?php echo $top_hero_desc_text; ?>"> -->
  <textarea name="top_hero_desc_text" id="top_hero_desc_text" cols="100" rows="8" placeholder="<?php _e(''); ?>"><?php echo $top_hero_desc_text; ?></textarea>
<?php
}

function display_top_hero_contact_text_option() // HERO 問い合わせボタン テキスト
{
  $top_hero_contact_text = get_option('top_hero_contact_text');
?>
  <input type="text" id="top_hero_contact_text" name="top_hero_contact_text" value="<?php echo $top_hero_contact_text; ?>">
<?php
}

function display_top_hero_contact_url_option() // HERO 問い合わせボタン リンク先
{
  $top_hero_contact_url = get_option('top_hero_contact_url');
?>
  <input type="text" id="top_hero_contact_url" name="top_hero_contact_url" value="<?php echo $top_hero_contact_url; ?>">
<?php
}
// HEROセクションここまで


// STRENGTH セクション
function display_strength_btn_text_option() // HERO 問い合わせボタン テキスト
{
  $strength_btn_text = get_option('strength_btn_text');
?>
  <input type="text" id="strength_btn_text" name="strength_btn_text" value="<?php echo $strength_btn_text; ?>">
<?php
}

function display_strength_btn_url_option() // HERO 問い合わせボタン リンク先
{
  $strength_btn_url = get_option('strength_btn_url');
?>
  <input type="text" id="strength_btn_url" name="strength_btn_url" value="<?php echo $strength_btn_url; ?>">
<?php
}
// STRENGTH セクション ここまで


// SERVICE セクション
function display_service_btn_text_option() // HERO 問い合わせボタン テキスト
{
  $service_btn_text = get_option('service_btn_text');
?>
  <input type="text" id="service_btn_text" name="service_btn_text" value="<?php echo $service_btn_text; ?>">
<?php
}

function display_service_btn_url_option() // HERO 問い合わせボタン リンク先
{
  $service_btn_url = get_option('service_btn_url');
?>
  <input type="text" id="service_btn_url" name="service_btn_url" value="<?php echo $service_btn_url; ?>">
<?php
}
// SERVICE セクション ここまで


// WORKS セクション
function display_works_btn_text_option() // HERO 問い合わせボタン テキスト
{
  $works_btn_text = get_option('works_btn_text');
?>
  <input type="text" id="works_btn_text" name="works_btn_text" value="<?php echo $works_btn_text; ?>">
<?php
}

function display_works_btn_url_option() // HERO 問い合わせボタン リンク先
{
  $works_btn_url = get_option('works_btn_url');
?>
  <input type="text" id="works_btn_url" name="works_btn_url" value="<?php echo $works_btn_url; ?>">
<?php
}
// WORKS セクション ここまで


// ABOUT セクション
// 画像登録 display optionはこのファイル下部で一括管理
function display_about_desc_text_option() // HERO 問い合わせボタン テキスト
{
  $about_desc_text = get_option('about_desc_text');
?>
  <input type="text" id="about_desc_text" name="about_desc_text" value="<?php echo $about_desc_text; ?>">
<?php
}

function display_about_btn_text_option() // HERO 問い合わせボタン テキスト
{
  $about_btn_text = get_option('about_btn_text');
?>
  <input type="text" id="about_btn_text" name="about_btn_text" value="<?php echo $about_btn_text; ?>">
<?php
}

function display_about_btn_url_option() // HERO 問い合わせボタン テキスト
{
  $about_btn_url = get_option('about_btn_url');
?>
  <input type="url" id="about_btn_url" name="about_btn_url" value="<?php echo $about_btn_url; ?>">
<?php
}
// ABOUT セクション ここまで


// BLOG セクション
function display_blog_btn_text_option() // HERO 問い合わせボタン テキスト
{
  $blog_btn_text = get_option('blog_btn_text');
?>
  <input type="text" id="blog_btn_text" name="blog_btn_text" value="<?php echo $blog_btn_text; ?>">
<?php
}

function display_blog_btn_url_option() // HERO 問い合わせボタン テキスト
{
  $blog_btn_url = get_option('blog_btn_url');
?>
  <input type="url" id="blog_btn_url" name="blog_btn_url" value="<?php echo $blog_btn_url; ?>">
<?php
}
// BLOG セクション ここまで


// コンタクトセクション
function display_contact_tell_num_option() // 連絡先電話番号
{
  $contact_tell_num = get_option('contact_tell_num');
?>
  <input type="text" id="contact_tell_num" name="contact_tell_num" value="<?php echo $contact_tell_num; ?>">
<?php
}

function display_contact_tell_text_option() //  連絡先説明文
{
  $contact_tell_text = get_option('contact_tell_text');
?>
  <input type="text" id="contact_tell_text" name="contact_tell_text" value="<?php echo $contact_tell_text; ?>">
<?php
}

function display_contact_btn_text_option() //  連絡先説明文
{
  $contact_btn_text = get_option('contact_btn_text');
?>
  <input type="text" id="contact_btn_text" name="contact_btn_text" value="<?php echo $contact_btn_text; ?>">
<?php
}

function display_contact_btn_url_option() //  連絡先説明文
{
  $contact_btn_url = get_option('contact_btn_url');
?>
  <input type="text" id="contact_btn_url" name="contact_btn_url" value="<?php echo $contact_btn_url; ?>">
<?php
}

// ------------------------------------------------------------------------------------------------------
// サンプル：テキスト設定項目表示用関数
function my_original_menu_text_func()
{
?>
  <input name="my-original-menu-text" type="text" id="my-original-menu-text" value="<?php form_option('my-original-menu-text'); ?>">
<?php
}

// サンプル：チェックボックス設定項目表示用関数
function my_original_menu_check_func()
{
?>
  <label>
    <input name="my-original-menu-check" type="checkbox" id="my-original-menu-check" value="1" <?php checked('1', get_option('my-original-menu-check')); ?> /> チェックボックスのサンプル設定を有効化
  </label>
<?php
}

// ------------------------------------------------------------------------------------------------------
// 画像


//画像アップロード用のタグを出力する
function generate_upload_image_tag($name, $value)
{ ?>
  <input name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
  <input type="button" name="<?php echo $name; ?>_slect" value="選択" />
  <input type="button" name="<?php echo $name; ?>_clear" value="クリア" />
  <div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
    <?php if ($value) : ?>
      <!-- <img src="<?php echo $value; ?>" alt="選択中の画像"> -->
    <?php endif ?>
  </div>


  <script type="text/javascript">
    (function($) {

      var custom_uploader;

      $("input:button[name=<?php echo $name; ?>_slect]").click(function(e) {

        e.preventDefault();

        if (custom_uploader) {

          custom_uploader.open();
          return;

        }

        custom_uploader = wp.media({

          title: "画像を選択してください",

          /* ライブラリの一覧は画像のみにする */
          library: {
            type: "image"
          },

          button: {
            text: "画像の選択"
          },

          /* 選択できる画像は 1 つだけにする */
          multiple: false

        });

        custom_uploader.on("select", function() {

          var images = custom_uploader.state().get("selection");

          /* file の中に選択された画像の各種情報が入っている */
          images.each(function(file) {

            /* テキストフォームと表示されたサムネイル画像があればクリア */
            $("input:text[name=<?php echo $name; ?>]").val("");
            $("#<?php echo $name; ?>_thumbnail").empty();

            /* テキストフォームに画像の URL を表示 */
            $("input:text[name=<?php echo $name; ?>]").val(file.attributes.sizes.full.url);

            /* プレビュー用に選択されたサムネイル画像を表示 */
            // $("#<?php echo $name; ?>_thumbnail").append('<img src="' + file.attributes.sizes.full.url + '" />');

          });
        });

        custom_uploader.open();

      });

      /* クリアボタンを押した時の処理 */
      $("input:button[name=<?php echo $name; ?>_clear]").click(function() {

        $("input:text[name=<?php echo $name; ?>]").val("");
        $("#<?php echo $name; ?>_thumbnail").empty();

      });

    })(jQuery);
  </script>
<?php
}

// 投稿のデフォルトアイキャッチ画像
function display_default_thumbnail_option()
{
  $default_thumbnail = get_option('default_thumbnail');

  generate_upload_image_tag('default_thumbnail', get_option('default_thumbnail'));
}

// HERO image
function display_hero_image_option()
{
  $top_hero_image = get_option('top_hero_image');

  generate_upload_image_tag('top_hero_image', get_option('top_hero_image'));
}

// ABOUT top image
function display_about_image_option()
{
  $about_image = get_option('about_image');

  generate_upload_image_tag('about_image', get_option('about_image'));
}


// 各固定ページヘッダー画像

// STRENGTH header image
function display_page_header_image_strength_option()
{
  $page_header_image_strength = get_option('page_header_image_strength');
  generate_upload_image_tag('page_header_image_strength', get_option('page_header_image_strength'));
}

// SERVICE header image
function display_page_header_image_service_option()
{
  $page_header_image_service = get_option('page_header_image_service');
  generate_upload_image_tag('page_header_image_service', get_option('page_header_image_service'));
}

// WORK header image
function display_page_header_image_work_option()
{
  $page_header_image_work = get_option('page_header_image_work');
  generate_upload_image_tag('page_header_image_work', get_option('page_header_image_work'));
}

// ABOUT header image
function display_page_header_image_about_option()
{
  $page_header_image_about = get_option('page_header_image_about');
  generate_upload_image_tag('page_header_image_about', get_option('page_header_image_about'));
}

// BLOG header image
function display_page_header_image_blog_option()
{
  $page_header_image_blog = get_option('page_header_image_blog');
  generate_upload_image_tag('page_header_image_blog', get_option('page_header_image_blog'));
}

// CONTACT header image
function display_page_header_image_contact_option()
{
  $page_header_image_contact = get_option('page_header_image_contact');
  generate_upload_image_tag('page_header_image_contact', get_option('page_header_image_contact'));
}
