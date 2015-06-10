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
 *   in theme settings.
 *
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
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
  <header>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-toggle">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php print $front_page; ?>"><strong>马轰轰</strong></a>
          </div>
        <div class="collapse navbar-collapse" id="menu-toggle">
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('nav', 'navbar-nav', 'clearfix')))); ?>
          <?php print render($page['navigation']); ?>
        </div>
      </div>
    </nav>
  </header>

  <?php if ($page['sidebar_first']): ?>
    <div class="slideshow">
      <?php print render($page['slideshow']); ?>
    </div>
  <?php endif; ?>

  <div class="container" id="main-info"  >
    <div class="row">
      <?php if ($page['sidebar_first']): ?>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php endif; ?>

      <?php $main_content_size = "col-md-12" ;
        if ($page['sidebar_first']){
          $main_content_size = "col-md-9 col-sm-9 col-xs-12";
        }
      ?>
        <div class="<?php echo $main_content_size; ?>">
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="page-header" id="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
              <?php print render($page['content']); ?>
              <?php print $feed_icons; ?>
        </div>

    </div>
  </div>

  <footer id="footer">
    <div class="container">
      <div class="row" id="footer01020304">
        <?php if ($page['footer01']): ?>
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php print render($page['footer01']); ?>
          </div>
        <?php endif; ?>
        <?php if ($page['footer02']): ?>
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php print render($page['footer02']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['footer03']): ?>
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php print render($page['footer03']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['footer04']): ?>
          <div class="col-md-3 hidden-xs">
            <?php print render($page['footer04']); ?>
          </div>
        <?php endif; ?>
      </div>
        
      <?php if ($page['footer']): ?>
        <div class="row">
          <div class="col-md-12">
            <?php print render($page['footer']); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </footer>
