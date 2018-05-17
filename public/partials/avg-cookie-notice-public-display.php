<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/teunrutten/bright-cookie-notice
 * @since      1.0.0
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/public/partials
 */

 $cookie_settings = get_option('bright-cookie-notice-settings');

$content = esc_attr( get_option('cookie_content_content') );
if ($content === '') { return; }
$url = esc_attr( get_option('cookie_content_link_url') );
$url_text = esc_attr( get_option('cookie_content_link_text') );
$intro = esc_attr( get_option('cookie_content_checkbox_intro') );
$confirmation = esc_attr( get_option('cookie_content_confirmation') );

$background = esc_attr( get_option('cookie_content_background_color') );
$color = esc_attr( get_option('cookie_content_content_color') );
$check_color = esc_attr( get_option('cookie_content_check_color') );
$check_background_color = esc_attr( get_option('cookie_content_check_background_color') );
$button_color = esc_attr( get_option('cookie_content_button_text_color') );
$button_background_color = esc_attr( get_option('cookie_content_button_color') );
$font_size = esc_attr( get_option('cookie_content_font_size') );
$position = esc_attr( get_option('cookie_content_position') );
$align = esc_attr( get_option('cookie_content_align') );

$necessary = esc_attr( get_option('cookie_content_necessary') );
$tracking = esc_attr( get_option('cookie_content_tracking') );
$analytics = esc_attr( get_option('cookie_content_analytics') );

$necessary_name = (esc_attr( get_option('cookie_content_necessary_name') ) !== '') ? esc_attr( get_option('cookie_content_necessary_name') ) : 'Noodzakelijk';
$tracking_name = (esc_attr( get_option('cookie_content_tracking_name') ) !== '') ? esc_attr( get_option('cookie_content_tracking_name') ) : 'Tracking';
$analytics_name = (esc_attr( get_option('cookie_content_analytics_name') ) !== '') ? esc_attr( get_option('cookie_content_analytics_name') ) : 'Analytisch';

if (isset( $_COOKIE['bright_avg_cookie_consent'] )) { return; }
?>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<section class="c-cookie-notice js-cookie-notice <?php echo $position ?> <?php echo $align ?>" style="background-color:<?php echo $background  ?>; color:<?php echo $color; ?>">
  <style>
    .c-cookie-notice {
      font-size: <?php echo $font_size; ?>;
    }
    .c-cookie-notice__confirmation {
      color: <?php echo $button_color; ?>;
      fill: <?php echo $button_color; ?>;
      background: <?php echo $button_background_color; ?>;
    }
    .c-cookie-notice__confirmation:hover {
      color: <?php echo $button_background_color; ?>;
      fill: <?php echo $button_background_color; ?>;
      background: <?php echo $button_color; ?>;
    }
    .c-cookie-notice__link {
      color: <?php echo $color; ?>;
    }
    .c-cookie-notice__link:hover {
      color: <?php echo $button_color; ?>;
    }
    .c-cookie-notice-checbox__label::after {
      color: <?php echo $check_color; ?>;
    }
    .c-cookie-notice-checbox__label::before {
      background: <?php echo $check_background_color; ?>;
    }
    .c-cookie-notice-checbox__element:checked + .c-cookie-notice-checbox__label::before {
      background: <?php echo $check_background_color; ?>;
      border: border: 1px solid <?php echo $check_background_color; ?>;
    }
  </style>
  <article class="c-cookie-notice__content">
    <?php echo $content; ?>
    <a href="<?php echo $url; ?>" class="c-cookie-notice__link"><?php echo $url_text; ?></a>
    <div class='c-cookie-notice__input-bar'>
      <div class='c-cookie-notice__text'><?php echo $intro  ?></div>
      <?php if ($necessary === 'on') { ?>
        <div class="c-cookie-notice-checbox" style="color: <?php echo $check_color; ?>">
          <input type="checkbox" name="normal_cookies" value="true" disabled checked="checked" id="normal_cookies" class="c-cookie-notice-checbox__element">
          <label class="c-cookie-notice-checbox__label" style="color: <?php echo $color; ?>" for="normal_cookies"><?php echo $necessary_name; ?></label>
        </div>
      <?php } ?>
      <?php if ($analytics === 'on') { ?>
        <div class="c-cookie-notice-checbox" style="color: <?php echo $check_color; ?>">
          <input type="checkbox" name="analytics" value="true" checked="checked" id="analytics" class="c-cookie-notice-checbox__element">
          <label class="c-cookie-notice-checbox__label" style="color: <?php echo $color; ?>" for="analytics"><?php echo $analytics_name; ?></label>
        </div>
      <?php } ?>
      <?php if ($tracking === 'on') { ?>
        <div class="c-cookie-notice-checbox" style="color: <?php echo $check_color; ?>">
          <input type="checkbox" name="tracking" value="true" checked="checked" id="tracking" class="c-cookie-notice-checbox__element">
          <label class="c-cookie-notice-checbox__label" style="color: <?php echo $color; ?>" for="tracking"><?php echo $tracking_name; ?></label>
        </div>
      <?php } ?>
      <a href="#" class="c-cookie-notice__confirmation js-confirm-cookies">
        <?php echo $confirmation ?>
        <svg class="c-cookie-notice__icon" id="chevron-right" viewBox="-19522.426 2174.602 11.109 16.426" width="0.75rem" height="0.75rem"><g transform="translate(-19560 1581)" id="Repeat_Grid_1" data-name="Repeat Grid 1" class="chevron-2"><path id="Path_25598" data-name="Path 25598" class="chevron-3" d="M1.983 0L-.855 2.838l5.4 5.377-5.37 5.373 2.838 2.838 5.4-5.377 2.838-2.834-2.835-2.838z" transform="translate(38.43 593.602)"></path></g></svg>
      </a>
    </div>
  </article>
</section>
