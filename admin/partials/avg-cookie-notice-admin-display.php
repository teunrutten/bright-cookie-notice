<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/teunrutten/bright-cookie-notice
 * @since      1.0.0
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap cookie-notice-wrap">
  <h1>AVG - Cookie notice</h1>
  <p>Met de onderstaande instellingen kunnen de stijl en content voor de cookiemelding bepaald worden.</p>
  <p>Je kan een link maken waarmee je de cookie instellingen kan wijzigen, deze moet de volgende class bevatten: <strong>'js-delete-cookies'</strong></p>
  <p>Plaats het volgende PHP script net onder de openende body tag: <strong>do_action('after_body');</strong></p>
  <form method="post" action="options.php">
    <?php
      settings_fields( 'bright-cookie-notice-settings' );
      do_settings_sections( 'bright-cookie-notice-settings' );
    ?>
    <div class="flex">
    <table>
      <caption>Content</caption>
      <tr>
        <th>Cookie intro tekst:</th>
        <td><textarea placeholder="Deze website maakt gebruik van cookies...." name="cookie_content_content" rows="5" cols="50"><?php echo esc_attr( get_option('cookie_content_content') ); ?></textarea></td>
      </tr>
      <tr>
        <th>Content voor de link naar cookiebeleid pagina:</th>
        <td>
          <p><strong>Tekst van de link</strong></p>
          <input type="text" placeholder="Meer informatie" name="cookie_content_link_text" value="<?php echo esc_attr( get_option('cookie_content_link_text') ); ?>" size="50" />
          <p><strong>URL van de link</strong></p>
          <input type="text" placeholder="/cookiebeleid" name="cookie_content_link_url" value="<?php echo esc_attr( get_option('cookie_content_link_url') ); ?>" size="50" />
        </td>
      </tr>
      <tr>
        <th>Tekst boven de checkboxes:</th>
        <td>
          <input type="text" placeholder="Selecteer de gewenste cookies:" name="cookie_content_checkbox_intro" value="<?php echo esc_attr( get_option('cookie_content_checkbox_intro') ); ?>" size="50" />
        </td>
      </tr>
      <tr>
        <th>Tekst van de bevestigingsknop:</th>
        <td><input type="text" placeholder="Accepteren" name="cookie_content_confirmation" value="<?php echo esc_attr( get_option('cookie_content_confirmation') ); ?>" size="50" /></td>
      </tr>
      <tr>
        <th>Soorten cookies:</th>
        <td>
          <label>
            <input type="checkbox" name="cookie_content_necessary" <?php echo esc_attr( get_option('cookie_content_necessary') ) == 'on' ? 'checked="checked"' : ''; ?> />Noodzakelijke cookies (aan te raden om altijd aan te zetten)
          </label><br/>
          <label>
            <input type="checkbox" name="cookie_content_analytics" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'on' ? 'checked="checked"' : ''; ?> />Analytics Cookies (aanzetten als Analytics wordt gebruikt)
          </label><br/>
          <label>
            <input type="checkbox" name="cookie_content_tracking" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'on' ? 'checked="checked"' : ''; ?> />Tracking Cookies (aanzetten als Tracking cookies worden gebruikt)
          </label>
        </td>
      </tr>
      <tr>
        <th>Benaming cookies:</th>
        <td>
          <p><strong>Noodzakelijke cookies</strong></p>
          <input type="text" placeholder="Noodzakelijk" name="cookie_content_necessary_name" value="<?php echo esc_attr( get_option('cookie_content_necessary_name') ); ?>" size="50" /><br>
          <p><strong>Analytische cookies</strong></p>
          <input type="text" placeholder="Analytisch" name="cookie_content_analytics_name" value="<?php echo esc_attr( get_option('cookie_content_analytics_name') ); ?>" size="50" /><br>
          <p><strong>Tracking cookies</strong></p>
          <input type="text" placeholder="Tracking" name="cookie_content_tracking_name" value="<?php echo esc_attr( get_option('cookie_content_tracking_name') ); ?>" size="50" /><br>
        </td>
      </tr>
    </table>
    <table>
      <caption>Stijl</caption>
      <tr>
        <th>Font grootte:</th>
        <td>
          <input type="text" placeholder="16px" name="cookie_content_font_size" value="<?php echo esc_attr( get_option('cookie_content_font_size') ); ?>" size="50" />
        </td>
      </tr>
      <tr>
        <th>Positie van de cookiemelding:</th>
        <td>
          <select name="cookie_content_align">
            <option value="top" <?php echo esc_attr( get_option('cookie_content_align') ) == 'top' ? 'selected="selected"' : ''; ?>>Boven</option>
            <option value="bottom" <?php echo esc_attr( get_option('cookie_content_align') ) == 'bottom' ? 'selected="selected"' : ''; ?>>Onder</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Vaste positie of meescrollen:</th>
        <td>
          <select name="cookie_content_position">
            <option value="fixed" <?php echo esc_attr( get_option('cookie_content_position') ) == 'fixed' ? 'selected="selected"' : ''; ?>>Meescrollen</option>
            <option value="relative" <?php echo esc_attr( get_option('cookie_content_position') ) == 'relative' ? 'selected="selected"' : ''; ?>>Relatief</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Achtergrondkleur:</th>
        <td><input class="color-field" data-default-color="#404040" type="text" name="cookie_content_background_color" value="<?php echo esc_attr( get_option('cookie_content_background_color') ); ?>"/></td>
      </tr>
      <tr>
        <th>Tekstkleur:</th>
        <td><input class="color-field" data-default-color="#fff" type="text" name="cookie_content_content_color" value="<?php echo esc_attr( get_option('cookie_content_content_color') ); ?>"/></td>
      </tr>
      <tr>
        <th>Kleur van de vinkjes:</th>
        <td><input class="color-field" data-default-color="#e3ba00" type="text" name="cookie_content_check_color" value="<?php echo esc_attr( get_option('cookie_content_check_color ') ); ?>"/></td>
      </tr>
      <tr>
        <th>Achtergrond van de vinkjes:</th>
        <td><input class="color-field" data-default-color="#fff" type="text" name="cookie_content_check_background_color" value="<?php echo esc_attr( get_option('cookie_content_check_background_color ') ); ?>"/></td>
      </tr>
      <tr>
        <th>Achtergrondkleur knop:</th>
        <td><input class="color-field" data-default-color="#e3ba00" type="text" name="cookie_content_button_color" value="<?php echo esc_attr( get_option('cookie_content_button_color') ); ?>"/></td>
      </tr>
      <tr>
        <th>Tekstkleur knop:</th>
        <td><input class="color-field" data-default-color="#fff" type="text" name="cookie_content_button_text_color" value="<?php echo esc_attr( get_option('cookie_content_button_text_color') ); ?>"/></td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </div>
  </form>
</div>
