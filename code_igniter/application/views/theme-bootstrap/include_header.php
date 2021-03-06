<div class="row" style="padding-bottom:5px;">
    <div class="col-md-4">
        <a href="<?php echo $this->config->config['oa_web_index']; ?>/groups">
            <img src='<?php echo $this->config->config['oa_web_folder']; ?>/images/<?php echo htmlentities($this->config->item('logo'))?>.png' alt='logo' style='border-width:0px;' />
        </a>
    </div>
    <div class="col-md-2"></div>

    <div class="col-md-1" style="text-align:center;">
        <?php if (isset($this->config->config['maps_url']) and $this->config->config['maps_url'] > "") { ?>
            Map<br /><a href="<?php echo htmlentities($this->config->item('maps_url')); ?>"  target="_blank" ><img alt="" style="height:30px" src="<?php echo $this->config->config['oa_web_folder']; ?>/images/logo-opmaps.png" /></a>
        <?php } else { ?>
            Map<br /><a href="<?php echo $this->config->config['oa_web_index']; ?>/main/help_opmaps"><img alt="" style="height:30px" src="<?php echo $this->config->config['oa_web_folder']; ?>/images/logo-opmaps.png" /></a>
        <?php } ?>
    </div>

  <div class="col-md-1" style="text-align:center;">
    Dashboard<br /><a href="<?php echo htmlentities($this->config->config['oae_url']); ?>" target="_blank"><img alt="" style="height:30px" src="<?php echo $this->config->config['oa_web_folder']; ?>/images/logo-oae.png" /></a>
  </div>

  <div class="col-md-1" style="text-align:center;">
    <?php if (isset($this->config->config['mis_url']) and $this->config->config['nmis_url'] > "") { ?>
        NMIS<br /><a href="<?php echo htmlentities($this->config->item('nmis_url')); ?>" target="_blank"><img alt="" style="height:30px" src="<?php echo $this->config->config['oa_web_folder']; ?>/images/logo-nmis.png" /></a>
    <?php } else { ?>
        NMIS<br /><a href="https://opmantek.com" target="_blank"><img alt="" style="height:30px" src="<?php echo $this->config->config['oa_web_folder']; ?>/images/logo-nmis.png" /></a>
    <?php } ?>
  </div>

  <div class="col-md-1" style="text-align:center;">
    Version<br /><?php echo htmlentities($this->config->item('display_version')); ?>
    <?php if ($this->config->item('internal_version') < $this->config->item('web_internal_version') and ($this->user->admin == 'y')) {
        echo '<br /><a href="'.$this->config->config['oa_web_index'].'/main/help_about" style="color: red;">upgrade</a>';
    } ?>
  </div>


    <div class="col-md-1" style="text-align:center;">
        <?php if ($this->user->admin == 'y') {
            // if (strpos(current_url(), '?') !== false) {
                echo '<a href="' . current_url() . '?' . $this->response->meta->query_string . '&format=json&debug=true&limit=100">Debug</a>';
            // } else {
            //     echo '<a href="'.current_url().'?format=json&debug=true&limit=100">Debug</a>';
            // }
        } ?>
    </div>

    <div class="col-md-1" style="text-align:center;">
        <a href="<?php echo $this->config->config['oa_web_index']; ?>/main/edit_user"><?php echo htmlentities($this->user->name); ?></a><br />
        <a class="btn btn-default btn-sm" href="<?php echo $this->config->config['oa_web_index']; ?>/login/logout" role="button">Logout</a>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo $this->config->config['oa_web_index']; ?>/groups">Home</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enterprise <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href='<?php echo $this->config->config['oae_url']; ?>'><?php echo __('Dashboard')?></a></li>
                    <li><a href='<?php echo $this->config->config['oae_url']; ?>/map'><?php echo __('Map')?></a></li>
                    <li><a href='<?php echo $this->config->config['oae_url']; ?>/tasks'><?php echo __('Scheduled Tasks')?></a></li>
                    <li class="dropdown-submenu">
                        <a href='#'><?php echo __('Reports')?></a>
                        <ul class="dropdown-menu" style="min-width:250px;">
                            <li><a href='<?php echo $this->config->config['oae_url']; ?>/show_report/Enterprise%20-%20Device%20Types'><?php echo __('Device Types')?></a>
                            <li><a href='<?php echo $this->config->config['oae_url']; ?>/show_report/Enterprise%20-%20OS%20Types'><?php echo __('OS Types')?></a>
                            <li><a href='<?php echo $this->config->config['oae_url']; ?>/show_report/Enterprise%20-%20Devices%20Discovered%20by%20Date/'><?php echo __('Devices Discovered Today')?></a>
                            <li><a href='<?php echo $this->config->config['oae_url']; ?>/show_report/Enterprise%20-%20Software%20Discovered%20by%20Date/'><?php echo __('Software Discovered Today')?></a>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a href="#">Configuration</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/edit_config'>Config</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Credentials</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/credentials'>List Credentials</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/credentials/create'>Create Credentials</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Connections</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/connections'>List Connections</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/connections/create'>Create Connection</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Database</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <?php
                        if (php_uname('s') == 'Darwin' or php_uname('s') == 'Linux') {
                            echo "<li><a href='".$this->config->config['oa_web_index']."/admin_db/backup'>Backup the Database</a></li>\n"; } ?>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_db/export_table'>Export Table</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_db/maintenance'>Maintenance</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/reset_icons'>Reset Device Icons</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Devices</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/devices'>List Devices</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_system/add_system'>Add Device Manually</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/system'>Add Device (using audit result)</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_system/add_systems'>Add Multiple Devices</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Discovery</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/discovery/discover_subnet/device'>Discover a Device</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/discovery/discover_active_directory'>Discover Active Directory</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/scan_ad'>Import Active Directory</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Fields</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/fields'>List Fields</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/fields/create'>Create Field</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Groups</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_group/list_groups'>List Groups</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_group/add_group'>Create Group</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_group/import_group'>Import Group</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_group/activate_group'>Activate Group</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Locations</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/locations'>List Locations</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_location/add_location'>Create Location</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_location/add_locations'>Import Multiple Locations</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Logs</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/view_log/access'>View Access Log</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/view_log/system'>View System Log</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/purge_log/access'>Purge Access Log</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin/purge_log/system'>Purge System Log</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Networks</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/networks'>List Networks</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/networks/create'>Create Network</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Organisations</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/orgs'>List Organisations</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/orgs/create'>Create Organisation</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_org/add_orgs'>Import Multiple Organisations</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Queries</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_report/list_reports'>List Queries</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_report/activate_report'>Activate Query</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_report/import_report'>Import Query</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Scripts</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/scripts'>List Scripts</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/scripts/create'>Create Script</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Users</a>
                    <ul class="dropdown-menu" style="min-width:250px;">
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_user/list_users'>List Users</a></li>
                        <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/admin_user/add_user'>Create User</a></li>
                    </ul>
                </li>
              </ul>
            </li>

            <?php if ($this->config->config['nmis'] == 'y') { ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">NMIS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/nmis/create'><?php echo __('Import')?></a></li>
                </ul>
            </li>
            <?php } ?>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/main/help_about'><?php echo __('About')?></a></li>
                    <li><a href='https://community.opmantek.com/display/OA/Open-AudIT+FAQ'><?php echo __('FAQ')?></a></li>
                    <li><a href='https://community.opmantek.com/display/OA/Home'><?php echo __('Documentation')?></a></li>
                    <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/main/help_statistics'><?php echo __('Statistics')?></a></li>
                    <li><a href='<?php echo $this->config->config['oa_web_index']; ?>/main/help_support'><?php echo __('Support')?></a></li>
                </ul>
            </li>

            <li class="dropdown">
            <?php if ($this->config->config['oae_license'] != 'commercial') { ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo __('Upgrade Licenses')?> <span class="caret"></span></a>
            <?php } else { ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo __('Licenses')?> <span class="caret"></span></a>
            <?php } ?>
                <ul class="dropdown-menu">
                    <?php if ($this->config->config['oae_license'] == 'none') { ?>
                        <li><a href='/omk/oae/license_free'><?php echo __('Activate Free License')?></a></li>
                    <?php } ?>
                    <li><a href='/omk/opLicense'><?php echo __('Manage Licenses')?></a></li>
                    <li><a href='#' id='buy_more_licenses'><?php echo __('Buy More Licenses')?></a></li>
                    <li><a href='/omk/opLicense'><?php echo __('Restore Licenses')?></a></li>
                </ul>
            </li>
      </ul>

      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control input-sm" placeholder="Name or IP">
        </div>
        <button type="submit" class="btn btn-default btn-sm">Submit</button>
      </form>
      <!--
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Export <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?format=excel"><i class="fa fa-file-excel-o fa-fw"></i> Excel</a></li>
            <li><a href="?format=json_data"><i class="fa fa-file-o fa-fw"></i> JSON</a></li>
            <li><a href="?format=csv"><i class="fa fa-file-text-o fa-fw"></i> CSV</a></li>
            <li><a href="?format=xml"><i class="fa fa-file-code-o fa-fw"></i> XML</a></li>
            <li><a href="?format=html"><i class="fa fa-html5 fa-fw"></i> HTML</a></li>
          </ul>
        </li>
      </ul>
      -->
    </div><!-- /.navbar-collapse -->
</nav>

<?php include('include_modal.php'); ?>