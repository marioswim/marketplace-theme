<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings
. *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
$otri="OTRI UJA";
$slogan=t("Innovation, Technology and Knowledge Transfer to the Company");
$oferta=t("R+D+i OFFER OF THE UNIVERSITY OF JAEN");
$uja=t("Knowledge and Technology Transfer Office · Vice-RectorShip of Society Relationship and Labour Insertion · University of Jaén");
$theme_path=path_to_theme();
global $language;

?>
<div id="language" class="navbar container">
  <?php if(!empty($page["language"])): ?>
    <?php print render($page["language"]); ?>
  <?php endif; ?>
</div>
<div id="uja" class="container">
  <div id="text">
    <a href='<?php echo "/".$language->prefix; ?> '>
      <p><?php echo $otri; ?></p>
      <p><?php echo $slogan; ?></p>
      <p><?php echo $oferta; ?></p>
    </a>
  </div>
  <img src='<?php echo "/".$theme_path."/images/ujaen_header.png"; ?>' id="ujaen">

  <div class="container" id="Logos">

    <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
    <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
    <?php endif; ?>
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print t($site_slogan); ?></p>
  <?php endif; ?>
  </div>
</div>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?>">
    <div class="navbar-header">
      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
    </div>
    <?php ?>
    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">
    <section<?php print $content_column_class; ?>>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php if(!empty($page["printIcon"])): ?>
        <div id="imprimir">
          <?php print render($page["printIcon"]); ?>
        </div>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

      <?php 
        if(empty($page["content2"]))
        {
          $conten_class="col-lg-12";
          $content_class="col-lg-0";
        }
        else
        {
          $content_class="col-lg-8";
          $content2_class="col-lg-4";
        }
      ?>
      <div class ="<?php echo $content_class; ?>">
        <?php print render($page['content']); ?>
      </div>
      <?php if(!empty($page["content2"])): ?>
        <div class ="<?php echo $content2_class; ?>">
          <?php print render($page['content2']); ?>
        </div>
      <?php endif; ?>
    </section>
  </div>
</div>

<?php if (!empty($page['partner'])): ?>
  <footer class="footer <?php print $container_class; ?>">
    <?php print render($page['partner']); ?>
  </footer>
<?php endif; ?>
<div id="footer"class=" container">
  <!--<div id="junta"></div>
  <div id="feder"></div>-->
  <div>
    <div id="text">
    <p><?php echo $otri; ?></p>
    <p><?php echo $slogan; ?></p>
    <p><?php echo $oferta; ?></p>
    <p><?php echo $uja; ?></p>
  </div>
    <img src='<?php echo "/".$theme_path."/images/ujaen_footer.png";?>' id="ujaen">
  </div>
  <div id="partners">
    <img src='<?php echo "/".$theme_path."/images/junta.png";?>' id="junta">
    <img src ='<?php echo "/".$theme_path."/images/feder.png";?>' id="feder">
  </div>
</div>
<div class="container" id="footer-links">
  <?php if(!empty($page["footer1"])): ?>
    <div class="col-lg-4">
        <?php print render($page["footer1"]); ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($page["footer2"])): ?>
    <div class="col-lg-5">
        <?php print render($page["footer2"]); ?>
    </div>
  <?php endif; ?>
  
    <div class="col-lg-3 footer3">
        <span>© OTRI •  UNIVERSIDAD DE JAEN • 2016</span>
    </div>

</div>
  