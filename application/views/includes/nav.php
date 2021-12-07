<ul class="metismenu list-unstyled" id="side-menu">
  <li class="menu-title" key="t-blank"></li>

  <li class="<?php echo ($page->menu=='dashboard') ? "mm-active" : "" ?>">
    <a class="waves-effect" href="<?php echo url('/dashboard') ?>">
      <i class='bx bxs-dashboard'></i>
      <span key="t-dashboard">Dashboard</span>
    </a>
  </li>

  <li class="menu-title" key="t-menu">Menu</li>

  <?php if ( hasPermissions('konsumen_list') ): ?>
    <li class="<?php echo ($page->menu=='konsumen') ? "mm-active" : "" ?>">
      <a href="<?php echo url('konsumen') ?>">
        <i class='bx bx-list-ul'></i>
        <span key="t-konsumen">Konsumen</span>
      </a>
    </li>
  <?php endif ?>

  <?php if ( hasPermissions('inventory_list') ): ?>
    <li class="<?php echo ($page->menu=='inventory') ? "mm-active" : "" ?>">
      <a href="<?php echo url('inventory') ?>">
        <i class='bx bx-cube'></i>
        <span key="t-inventory">Inventory</span>
      </a>
    </li>
  <?php endif ?>

  <?php if ( hasPermissions('penjualan_list') ): ?>
    <li class="<?php echo ($page->menu=='penjualan') ? "mm-active" : "" ?>">
      <a href="<?php echo url('penjualan') ?>">
        <i class='bx bx-money'></i>
        <span key="t-penjualan">Penjualan</span>
      </a>
    </li>
  <?php endif ?>

  <?php if ( hasPermissions('laporan_list') ): ?>
  <li class="<?php echo ($page->menu=='laporan_list') ? "mm-active" : "" ?>">
    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="<?php echo ($page->menu=='laporan_list') ? "true" : "false" ?>">
      <i class='bx bx-file'></i>
      <span key="t-referensi">Laporan</span>
    </a>
    <ul class="sub-menu <?php echo ($page->menu=='laporan_list') ? "mm-show" : "" ?>" aria-expanded="false">

      <?php if ( hasPermissions('lap_konsumen_list') ): ?>
      <li class="<?php echo ($page->submenu=='lap_konsumen') ? "mm-active" : "" ?>">
        <a href="<?php echo url('lap_konsumen') ?>">
          <span key="t-lap_konsumen">Lap Konsumen</span>
        </a>
      </li>
      <?php endif ?>

      <?php if ( hasPermissions('lap_inventory_list') ): ?>
      <li class="<?php echo ($page->submenu=='lap_inventory') ? "mm-active" : "" ?>">
        <a href="<?php echo url('lap_inventory') ?>">
          <span key="t-lap_inventory">Lap Inventory</span>
        </a>
      </li>
      <?php endif ?>

      <?php if ( hasPermissions('lap_penjualan_list') ): ?>
      <li class="<?php echo ($page->submenu=='lap_penjualan') ? "mm-active" : "" ?>">
        <a href="<?php echo url('lap_penjualan') ?>">
          <span key="t-lap_penjualan">Lap Penjualan</span>
        </a>
      </li>
      <?php endif ?>

    </ul>
  </li>
  <?php endif ?>

  <?php if ( hasPermissions('manajemen_user') ): ?>
  <li class="<?php echo ($page->menu=='manajemen_user') ? "mm-active" : "" ?>">
    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="<?php echo ($page->menu=='manajemen_user') ? "true" : "false" ?>">
      <i class='bx bx-group'></i>
      <span key="t-referensi">Manajemen User</span>
    </a>
    <ul class="sub-menu <?php echo ($page->menu=='manajemen_user') ? "mm-show" : "" ?>" aria-expanded="false">
      <?php if ( hasPermissions('users_list') ): ?>
      <li class="<?php echo ($page->submenu=='users') ? "mm-active" : "" ?>">
        <a href="<?php echo url('users') ?>">
          <span key="t-user">User</span>
        </a>
      </li>
      <?php endif ?>
      
      <?php if ( hasPermissions('activity_log_list') ): ?>
      <li class="<?php echo ($page->submenu=='activity_logs') ? "mm-active" : "" ?>">
        <a href="<?php echo url('activity_logs') ?>">
          <span key="t-activitylogs">Activity Logs</span>
        </a>
      </li>
      <?php endif ?>
      
      <?php if ( hasPermissions('roles_list') ): ?>
      <li class="<?php echo ($page->submenu=='roles') ? "mm-active" : "" ?>">
        <a href="<?php echo url('roles') ?>">
          <span key="t-roles">Roles</span>
        </a>
      </li>
      <?php endif ?>
      
      <?php if ( hasPermissions('backup_db') ): ?>
      <li class="<?php echo ($page->submenu=='backup') ? "mm-active" : "" ?>">
        <a href="<?php echo url('backup') ?>">
          <span key="t-backup">Backup</span>
        </a>
      </li>
      <?php endif ?>
    </ul>
  </li>
  <?php endif ?>

</ul>