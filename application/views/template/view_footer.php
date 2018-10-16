<!--Footer-->
<div class="layout-footer">
        <div class="layout-footer-body">
                <small class="version">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> Version 1.0.0</small>
                <small class="copyright"><?php echo date("Y"); ?> &copy; МАУ "МФЦ" г.Югорск <a href="http://mfc-ugorsk.ru/">Сайт учреждения</a></small>
        </div>
</div>
</div>
<div class="theme">
        <div class="theme-panel theme-panel-collapsed">
                <div class="theme-panel-controls">
                        <button class="theme-panel-toggler" title="Expand theme panel ( ] )" type="button">
                                <span class="icon icon-cog icon-spin" aria-hidden="true"></span>
                        </button>
                </div>
                <div class="theme-panel-body">
                        <div class="custom-scrollbar">
                                <div class="custom-scrollbar-inner">
                                        <ul class="theme-settings">
                                                <li class="theme-settings-heading">
                                                        <div class="divider">
                                                                <div class="divider-content">Настройки</div>
                                                        </div>
                                                </li>
                                                <li class="theme-settings-item">
                                                        <div class="theme-settings-label">Закрепить шапку</div>
                                                        <div class="theme-settings-switch">
                                                                <label class="switch switch-primary">
                                                                        <input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
                                                                        <span class="switch-track"></span>
                                                                        <span class="switch-thumb"></span>
                                                                </label>
                                                        </div>
                                                </li>
                                                <li class="theme-settings-item">
                                                        <div class="theme-settings-label">Закрепить сайдбар</div>
                                                        <div class="theme-settings-switch">
                                                                <label class="switch switch-primary">
                                                                        <input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
                                                                        <span class="switch-track"></span>
                                                                        <span class="switch-thumb"></span>
                                                                </label>
                                                        </div>
                                                </li>
                                                <li class="theme-settings-item">
                                                        <div class="theme-settings-label">Закрепить sticky*</div>
                                                        <div class="theme-settings-switch">
                                                                <label class="switch switch-primary">
                                                                        <input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
                                                                        <span class="switch-track"></span>
                                                                        <span class="switch-thumb"></span>
                                                                </label>
                                                        </div>
                                                </li>
                                                <li class="theme-settings-item">
                                                        <div class="theme-settings-label">Sidebar collapsed</div>
                                                        <div class="theme-settings-switch">
                                                                <label class="switch switch-primary">
                                                                        <input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
                                                                        <span class="switch-track"></span>
                                                                        <span class="switch-thumb"></span>
                                                                </label>
                                                        </div>
                                                </li>
                                                <li class="theme-settings-item">
                                                        <div class="theme-settings-label">Закрепить Footer</div>
                                                        <div class="theme-settings-switch">
                                                                <label class="switch switch-primary">
                                                                        <input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
                                                                        <span class="switch-track"></span>
                                                                        <span class="switch-thumb"></span>
                                                                </label>
                                                        </div>
                                                </li>
                                        </ul>
                                </div>
                        </div>
                </div>
        </div>
</div>
<script src="<?= base_url();?>assets/js/vendor.min.js"></script>
<script src="<?= base_url();?>assets/js/elephant.min.js"></script>
<script src="<?= base_url();?>assets/js/application.min.js"></script>
<script src="<?= base_url();?>assets/js/demo.min.js"></script>
</body>
</html>