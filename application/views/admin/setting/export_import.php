<?php

?>
<div class="row">
    <div class="state-overview">
        <a href="<?php echo site_url('setting/export_db') ?>">
            <div class="col-sm-4">
                <div class="overview-panel purple">
                    <div class="symbol">
                        <i class="fa fa-database usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="23">Export</p>
                        <p>Database Export</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo site_url('setting/import_db') ?>">
            <div class="col-sm-4">
                <div class="overview-panel purple">
                    <div class="symbol">
                        <i class="fa fa-tasks usr-clr"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="23">Import</p>
                        <p>Database Import</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo site_url('setting/excel') ?>">
            <div class="col-sm-4">
                <div class="overview-panel blue-bgcolor">
                    <div class="symbol">
                        <i class="fa fa-file-excel-o"></i>
                    </div>
                    <div class="value white">
                        <p class="sbold addr-font-h1 notranslate" data-counter="counterup" data-value="3421">Excel</p>
                        <p>Export to Excel</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("exportimport").classList.add('active');
       
    });
</script>