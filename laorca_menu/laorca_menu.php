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
    'laorca-menu-section-1', // 管理用：セクションのスラッグ
    'ヘッダー設定',          // 表示用：セクション名
    null,                    // 表示用：セクション説明
    'laorca-menu'            // 管理用：セクションを作成するページのスラッグ
  );

  // セクション追加 テーマカラー設定用
  add_settings_section('laorca-menu-section-2', 'テーマカラー設定', null, 'laorca-menu');
  add_settings_section('laorca-menu-section-3', 'HEROセクション設定', null, 'laorca-menu');

  // ------------------------------------------------------------------------------------------------------

  // オリジナル設定項目追加
  // 管理用：項目名, 表示用：設定項目名, 表示用：レイアウト作成用HTML関数, 管理用：設定追加先ページスラッグ, 管理用：設定追加先セクションスラッグ
  add_settings_field('sns_link_facebook',  'Facebook URL', 'display_facebook_url_option',  'laorca-menu', 'laorca-menu-section-1');   // header sns_link
  add_settings_field('sns_link_twitter',   'Twitter URL',  'display_twitter_url_option',   'laorca-menu', 'laorca-menu-section-1');   // header sns_link
  add_settings_field('sns_link_instagram', 'Instagram URL', 'display_instagram_url_option', 'laorca-menu', 'laorca-menu-section-1');  // header sns_link
  add_settings_field('sns_link_youtube',   'YouTube URL',  'display_youtube_url_option',   'laorca-menu', 'laorca-menu-section-1');   // header sns_link

  // 投稿用設定
  add_settings_field('default_thumbnail', 'デフォルトアイキャッチ画像の設定', 'display_default_thumbnail_option', 'laorca-menu', 'laorca-menu-section-1');

  // テーマカラー用設定
  add_settings_field('themecolor_header_hover', 'ヘッダー マウスホバー色', 'display_color_header_hover_option', 'laorca-menu', 'laorca-menu-section-2');
  add_settings_field('themecolor_post_hover', '投稿 マウスホバー色', 'display_color_header_post_option', 'laorca-menu', 'laorca-menu-section-2');

  // ヒーローセクション
  add_settings_field('top_hero_image', 'HOME画面のHERO画像の設定', 'display_hero_image_option', 'laorca-menu', 'laorca-menu-section-3');

  // ------------------------------------------------------------------------------------------------------

  // 設定の登録
  register_setting('laorca-menu', 'sns_link_facebook');
  register_setting('laorca-menu', 'sns_link_twitter');
  register_setting('laorca-menu', 'sns_link_instagram');
  register_setting('laorca-menu', 'sns_link_youtube');
  register_setting('laorca-menu', 'default_thumbnail');
  register_setting('laorca-menu', 'themecolor_header_hover');
  register_setting('laorca-menu', 'themecolor_post_hover');
  register_setting('laorca-menu', 'top_hero_image');
}


// 表示用：セクション説明文関数
function my_original_menu_section_func()
{
  echo '<p>LA ORCAセクション１です</p>';
}

// ------------------------------------------------------------------------------------------------------
// 表示用：設定項目レイアウト作成用HTML関数
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

// 追加した項目の内容
function display_default_thumbnail_option()
{
  $default_thumbnail = get_option('default_thumbnail');

  generate_upload_image_tag('default_thumbnail', get_option('default_thumbnail'));
}

// 追加した項目の内容
function display_hero_image_option()
{
  $top_hero_image = get_option('top_hero_image');

  generate_upload_image_tag('top_hero_image', get_option('top_hero_image'));
}
