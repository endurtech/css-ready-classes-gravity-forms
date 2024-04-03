<?php
/* --------------------------------------------------
Plugin Name: CSS Ready Classes for Gravity Forms
Plugin URI: https://endurtech.com/css-ready-classes-plugin/
Description: Show and select CSS Ready Classes for Gravity Forms and hide all form backend tooltips.
Author: WP Gear Pro
Author URI: https://wpgearpro.com
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 5.4
Tested up to: 6.5
Version: 2.7.11

NOTES FOR v2.8 Release:

Confirmation Classes
  New Form submission Confirmation CSS Ready Classes. Add a class to the 'CSS Class Name' input under 'Form Layout' within the 'Form Settings' page. This will turn your form submission confirmation message into a colored banner. Works with 'text' type confirmation messages, NOT page or redirect confirmations.
gf_confirmation_simple_yellow
  This turns the confirmation message into a banner with a yellow background.
gf_confirmation_simple_gray
  This turns the confirmation message into a banner with a gray background.
gf_confirmation_yellow_gradient
  This turns the confirmation message into a banner with a yellow gradient background.
gf_confirmation_green_gradient
  This turns the confirmation message into a banner with a green gradient background.

Repurpose double click action from closing popup to removing selected class, if exists

-------------------------------------------------- */

if( ! defined( 'ABSPATH' ) )
{
  exit(); // No direct access
}

if( class_exists( 'RGForms' ) )
{
    add_action( 'gform_editor_js', 'cssready_select_classes_js' );
}

// Gravity Forms Hide All Backend Tooltips
if( ! function_exists( 'gform_hide_tooltips' ) )
{
  add_filter( 'gform_tooltips', 'gform_hide_tooltips' );
  function gform_hide_tooltips()
  {
    return array();
  }
}

// Gravity Forms Hide Required Fields Notification at top of all forms
add_filter( 'gform_required_legend', '__return_empty_string' );

function cssready_select_classes_js()
{
  $modal_html = "<style>
#css_ready_selector, .cssr_ul li span, a.cssr_link{text-decoration:none;}
#css_ready_selector{display:inline-block;}
.cssr_ul{margin:0; padding:0;}
.cssr_ul li{margin:0; padding:0;}
.cssr_ul li span{
  font-weight:700;
  display:block;
  text-align:left;
  color:#47759B;
}
.cssr_ul li div{
  display:-ms-flexbox;
  display:-webkit-box;
  display:flex;
  -ms-flex-direction:row;
  -webkit-box-orient:horizontal;
  -webkit-box-direction:normal;
  flex-direction:row;
  -ms-flex-wrap:wrap;
  flex-wrap:wrap;
  -ms-flex-pack:center;
  -webkit-box-pack:center;
  justify-content:center;
  -ms-flex-line-pack:justify;
  align-content:space-between;
  -ms-flex-align:center;
  -webkit-box-align:center;
  align-items:center;
  margin:5px 0;
}
a.cssr_link{
  display:inline-block;
  -ms-flex-order:0;
  -webkit-box-ordinal-group:1;
  order:0;-ms-flex:1 0 auto;
  -webkit-box-flex:1;
  flex:1 0 auto;
  -ms-flex-item-align:stretch;
  align-self:stretch;
  margin-right:5px;
  margin-bottom:5px;
  padding:5px 10px 0px;
  height:24px;
  background:#f7f7f7;
  border:1px solid #dfdfdf;
  border-radius:3px;
  box-shadow:0 1px 0 #cccccc;
  text-align:center;
  color:#555555;
}
a.cssr_link:hover{
  background:#fafafa;
  border-color:#cccccc;
  color:#d54e21;
  font-weight:bold;
}
a.cssr_link:active{
  background:#eeeeee;
  border-color:#bbbbbb;
  color:#555555;
}
</style>
<div id='css_ready_modal'>
  <p><a class='cssr_clear' href='#' rel='' title='Clears the Custom CSS Class Field'><strong>Clear classes</strong></a> or double-click a <a href='https://docs.gravityforms.com/css-ready-classes/' target='_blank' title='Open Gravity Forms Documenation Page in New Window'>Ready Class</a> to add &amp; close popup. <a href='https://endurtech.com/css-ready-classes-wordpress-plugin/' target='_blank' title='Opens Plugin Website in New Window'>Learn More</a> / <a href='https://endurtech.com/give-thanks/' target='_blank' title='Opens Plugin Donation Page in New Window'><strong>Donate Now!</strong></a></p>
  <ul class='cssr_ul'>
    <li>
      <span>Columns</span>
      <div>
        <a class='cssr_link' href='#' rel='gf_left_half' title='Puts field on left. Top Label form layout required.'>Left Half</a>
        <a class='cssr_link' href='#' rel='gf_right_half' title='Puts field on right. Top Label form layout required.'>Right Half</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_left_third' title='Puts field on left. Top Label form layout required.'>Left Third</a>
        <a class='cssr_link' href='#' rel='gf_middle_third' title='Puts field on middle. Top Label form layout required.'>Middle Third</a>
        <a class='cssr_link' href='#' rel='gf_right_third' title='Puts field on right. Top Label form layout required.'>Right Third</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_first_quarter' title='Puts field on 1st 25%. Top Label form layout required.'>1 Quarter</a>
        <a class='cssr_link' href='#' rel='gf_second_quarter' title='Puts field on 2nd 25%. Top Label form layout required.'>2 Quarter</a>
        <a class='cssr_link' href='#' rel='gf_third_quarter' title='Puts field on 3rd 25%. Top Label form layout required.'>3 Quarter</a>
        <a class='cssr_link' href='#' rel='gf_fourth_quarter' title='Puts field on 4th 25%. Top Label form layout required.'>4 Quarter</a>
      </div>
    </li>      
    <li>
      <span>Lists</span>
      <div>
        <a class='cssr_link' href='#' rel='gf_list_2col' title='Equally-spaced 2 col multi-choice/checkboxs. Any form label.'>2 Column List</a>
        <a class='cssr_link' href='#' rel='gf_list_3col' title='Equally-spaced 3 col multi-choice/checkboxs. Any form label.'>3 Column List</a>
        <a class='cssr_link' href='#' rel='gf_list_4col' title='Equally-spaced 4 col multi-choice/checkboxs. Any form label.'>4 Column List</a>
        <a class='cssr_link' href='#' rel='gf_list_5col' title='Equally-spaced 5 col multi-choice/checkboxs. Any form label.'>5 Column List</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_list_2col_vertical' title='Equally-spaced 2 col vertical multi-choice/checkboxs. Any form label.'>2 Col Vertical</a>
        <a class='cssr_link' href='#' rel='gf_list_3col_vertical' title='Equally-spaced 3 col vertical multi-choice/checkboxs. Any form label.'>3 Col Vertical</a>
        <a class='cssr_link' href='#' rel='gf_list_4col_vertical' title='Equally-spaced 4 col vertical multi-choice/checkboxs. Any form label.'>4 Col Vertical</a>
        <a class='cssr_link' href='#' rel='gf_list_5col_vertical' title='Equally-spaced 5 col vertical multi-choice/checkboxs. Any form label.'>5 Col Vertical</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_list_inline' title='Inline horizontal multi-choice/checkboxs, not = spaced. Any form label.'>Inline List</a>
        <a class='cssr_link' href='#' rel='gf_list_height_25' title='25px height multi-choice/checkboxs. Any form label.'>25px Height</a>
        <a class='cssr_link' href='#' rel='gf_list_height_50' title='50px height multi-choice/checkboxs. Any form label.'>50px Height</a>
        <a class='cssr_link' href='#' rel='gf_list_height_75' title='75px height multi-choice/checkboxs. Any form label.'>75px Height</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_list_height_100' title='100px height multi-choice/checkboxs. Any form label.'>100px Height</a>
        <a class='cssr_link' href='#' rel='gf_list_height_125' title='125px height multi-choice/checkboxs. Any form label.'>125px Height</a>
        <a class='cssr_link' href='#' rel='gf_list_height_150' title='150px height multi-choice/checkboxs. Any form label.'>150px Height</a>
      </div>
    </li>
    <li>
      <span>Others</span>
      <div>
        <a class='cssr_link' href='#' rel='gf_invisible' title='Hides ANY field type. Better than hidden fields, allows formatting for specific type of data'>Invisible</a>
        <a class='cssr_link' href='#' rel='gf_inline' title='Puts field(s) inline, not = spaced. Useful for different sized fields or horizontal layout without column spacing.'>Inline Fields</a>
        <a class='cssr_link' href='#' rel='gf_simple_horizontal' title='Simple horizontal form. Use placeholder label hidden, large input. Up to 5 fields and button. Top Label layout required.'>Simple Horizontal</a>
        <a class='cssr_link' href='#' rel='gf_section_right' title='Section Break aligns right with form fields if left/right label form setting enabled.'>Section Right</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_hide_ampm' title='Hides time field am/pm. Still appears in form entry. Any form label.'>Hide am/pm</a>
        <a class='cssr_link' href='#' rel='gf_hide_charleft' title='Hides Maximum Characters Left on paragraph/text fields. Any form label.'>Hide Character Count</a>
        <a class='cssr_link' href='#' rel='gf_scroll_text' title='Converts Section Break into fixed height box. Shows scroll bar if overflow. Only works on Section Breaks. Any form label.'>Scroll Section Break</a>
        <a class='cssr_link' href='#' rel='gf_readonly' title='Creates read-only field with use of additional script. Any form label.'>Read-only</a>
      </div>
      <div>
        <a class='cssr_link' href='#' rel='gf_alert_red' title='Turns HTML field and contents into RED banner.'>HTML Red</a>
        <a class='cssr_link' href='#' rel='gf_alert_green' title='Turns HTML field and contents into GREEN banner.'>HTML Green</a>
        <a class='cssr_link' href='#' rel='gf_alert_blue' title='Turns HTML field and contents into BLUE banner.'>HTML Blue</a>
        <a class='cssr_link' href='#' rel='gf_alert_yellow' title='Turns HTML field and contents into YELLOW banner.'>HTML Yellow</a>
        <a class='cssr_link' href='#' rel='gf_alert_gray' title='Turns HTML field and contents into GRAY banner.'>HTML Gray</a>
      </div>
    </li>
  </ul>
</div>";
?>
<script>
/* Not in use. Intended for future release, replace 'close on double click' with remove double clicked class if exists.
function removeCssReadyTokenFromInput( input, tokenPos, seperator )
{
  var text = input.val();
  var tokens = text.split( seperator );
  var newText = '';
  for( i = 0; i < tokens.length; i++ )
  {
    if( tokens[i].replace( ' ', '' ).replace( seperator, '' ) == '' )
    {
      continue;
    }
    if( i != tokenPos )
    {
      newText += ( tokens[i].trim() + seperator );
    }
  }
  input.val( fixCssReadyTokens( newText, seperator ) );
}
*/
function addCssReadyTokenToInput( input, tokenToAdd, seperator )
{
  var text = input.val().trim();
  if( text == '' )
  {
    input.val( tokenToAdd );
  }
  else
  {
    if( ! tokenCssReadyExists( input, tokenToAdd, seperator ) )
    {
      input.val( fixCssReadyTokens( text + seperator + tokenToAdd, seperator ) );
    }
  }
}
function fixCssReadyTokens( tokens, seperator )
{
  var text = tokens.trim();
  var tokens = text.split( seperator );
  var newTokens = '';
  for( i = 0; i < tokens.length; i++ )
  {
    var token = tokens[i].trim().replace( seperator, '' );
    if( token == '' )
    {
      continue;
    }
    newTokens += ( token + seperator );
  }
  return newTokens;
}
function tokenCssReadyExists( input, tokenToCheck, seperator )
{
  var text = input.val().trim();
  if( text == '' )
  {
    return false;
  }
  var tokens = text.split( seperator );
  for( i = 0; i < tokens.length; i++ )
  {
    var token = tokens[i].trim().replace( seperator, '' );
    if( token == '' )
    {
      continue;
    }
    if( token == tokenToCheck )
    {
      return true;
    }
  }
  return false;
}
jQuery( document ).bind( "gform_load_field_settings", function( event, field, form )
{
  if( jQuery( "#css_ready_selector" ).length == 0 )
  {
    var $select_link = jQuery( "<a id='css_ready_selector' class='thickbox' href='#TB_inline?width=500&height=620&inlineId=css_ready_modal' title='Pick a CSS Ready Class'>CSS</a>" );
    var $modal = jQuery( "<?php echo preg_replace( '/\s*[\r\n\t]+\s*/', '', $modal_html ); ?>" ).hide();
    jQuery( ".css_class_setting" ).append( $select_link ).append( $modal );
    $select_link.click( function( e )
    {
      e.preventDefault();
      var $m = jQuery( "#css_ready_modal" );
	  // clear classes action
	  var $links_clear = $m.find( ".cssr_clear" );
	  $links_clear.unbind( "click" ).click( function( e )
	  {
        e.preventDefault();
        SetFieldProperty( 'cssClass', jQuery( "#field_css_class" ).val("") );
	  } );
	  // single click action
      var $links = $m.find( ".cssr_link" );
      $links.unbind( "click" ).click( function( e )
      {
        e.preventDefault();
        var css = jQuery( this ).attr( "rel" );
        addCssReadyTokenToInput( jQuery( "#field_css_class" ), css, ' ' );
        SetFieldProperty( 'cssClass', jQuery( "#field_css_class" ).val().trim() );
      } );
	  // double click action
      $links.unbind( "dblclick" ).dblclick( function( e )
      {
        e.preventDefault();
        var css = jQuery( this ).attr( "rel" );
        addCssReadyTokenToInput( jQuery( "#field_css_class" ), css, ' ' );
        SetFieldProperty( 'cssClass', jQuery( "#field_css_class" ).val().trim() );
        tb_remove();
      } );
	  // title
      tb_show( 'Pick a CSS Ready Class', this.href, false );
    } );
  }
} );
</script>
<?php
}