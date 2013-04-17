    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widgets') ) : ?>
          <h3>Widgetized Sidebar</h3>
          <li><p>This is an area for your widgets. You can add or revove them in your WordPress Dashboard</p> <a href="/wp-admin/widgets.php">Add Widgets</a></li>
          <?php endif; ?>
        </ul>
      </div>
