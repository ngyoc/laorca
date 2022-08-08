<?php

add_action( 'admin_menu', 'my_add_admin_menu' );
/**
 * 「設定」にメニューを追加
 */
function my_add_admin_menu() {
  add_options_page(
    'LA ORCA メニューページ', // 設定画面のページタイトル.
    'LA ORCA', // 管理画面メニューに表示される名前.
    'manage_options',
    'laorca-menu', // メニューのスラッグ. my-original-menu urlに使用される. リロードすると弾かれるので注意
    'my_original_menu_page' // メニューの中身を表示させる関数の名前. my_original_menu_page
  );
}

/**
 * メニューページの中身を作成
 */
function my_original_menu_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
      wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    ?>
    <div class="wrap">
      <h1>LA ORCA メニューページ</h1>
      <form method="POST" action="options.php">
        <?php
        settings_fields( 'laorca-menu' ); // ページのスラッグ.
        do_settings_sections( 'laorca-menu' );  // ページのスラッグ.
        submit_button();
        ?>
      </form>
    </div>
    <?php
  }


/**
 * 設定項目の準備
 */
function my_init_original_settings() {
  // 設定のセクション追加.
  // add settings section
  add_settings_section(
      'laorca-menu-section-1', // セクションのスラッグ
      'ヘッダー設定', // セクション名
      null, //'my_original_menu_section_func', // セクションの説明文を表示するための関数.
      'laorca-menu' // menuページのスラッグ
    );

    add_settings_section('laorca-menu-section-2', 'テーマカラー設定', null, 'laorca-menu');


  // 設定項目の追加.
  // add settings field
  //   add_settings_field(
  //     'my-original-menu-text', // 設定名.
  //     'テキストのサンプル設定', // 設定タイトル.
  //     'my_original_menu_text_func', // 設定項目のHTMLを出力する関数名.
  //     'laorca-menu', // メニュースラッグ.
  //     'laorca-menu-section-1' // どのセクションに表示するか.
  //   );

  add_settings_field('sns_link_facebook',  'Facebook URL', 'display_facebook_url_option',  'laorca-menu', 'laorca-menu-section-1');
  add_settings_field('sns_link_twitter',   'Twitter URL',  'display_twitter_url_option',   'laorca-menu', 'laorca-menu-section-1');
  add_settings_field('sns_link_instagram', 'Instagram URL','display_instagram_url_option', 'laorca-menu', 'laorca-menu-section-1');
  add_settings_field('sns_link_youtube',   'YouTube URL',  'display_youtube_url_option',   'laorca-menu', 'laorca-menu-section-1');


  add_settings_field('default_thumbnail', 'デフォルトアイキャッチ画像の設定', 'display_custom_option', 'laorca-menu','laorca-menu-section-1');
  register_setting('laorca-menu', 'default_thumbnail');

  // register setting
  // 設定の登録
  register_setting('laorca-menu', 'sns_link_facebook');
  register_setting('laorca-menu', 'sns_link_twitter');
  register_setting('laorca-menu', 'sns_link_instagram');
  register_setting('laorca-menu', 'sns_link_youtube');

//   register_setting('laorca-menu','my-original-menu-text' , ['sanitize_callback' => 'esc_attr',]);
//   register_setting('laorca-menu','my-original-menu-check', ['sanitize_callback' => 'absint',]);

  // ! register setting
}

add_action( 'admin_init', 'my_init_original_settings' );

/**
 * セクションの説明文を表示するための関数
 */
function my_original_menu_section_func() {
    echo '<p>LA ORCAセクション１です</p>';
}


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


/**
 * テキストのサンプル設定項目表示用関数
 */
function my_original_menu_text_func() {
?>
    <input name="my-original-menu-text" type="text" id="my-original-menu-text" value="<?php form_option( 'my-original-menu-text' ); ?>">
    <?php
}

/**
 * チェックボックスのサンプル設定項目表示用関数
 */
function my_original_menu_check_func() {
?>
    <label>
    <input name="my-original-menu-check" type="checkbox" id="my-original-menu-check" value="1" <?php checked( '1', get_option( 'my-original-menu-check' ) ); ?> /> チェックボックスのサンプル設定を有効化
    </label>
<?php
}

function my_admin_scripts()
{
    //メディアアップローダの javascript API
    wp_enqueue_media();
}
add_action('admin_print_scripts', 'my_admin_scripts');

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
function display_custom_option()
{
    $default_thumbnail = get_option('default_thumbnail');

    generate_upload_image_tag('default_thumbnail', get_option('default_thumbnail'));
}
