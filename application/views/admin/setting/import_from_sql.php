<?php

?>
<div class="row">
    <div align="center">
        <div class="fa fa-tasks" style="font-size: 100px"></div>
        <br/>
    </div>
    <p>&nbsp;</p>
    <div class="col-sm-4">
        <?php echo form_open_multipart() ?>
        <label>Select Your Sql Database (.txt or .sql)</label><br/>
        <input type="file" name="file"><br/>
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Alert !!! This may break your database. Use at your own responsibility.')">
            Import &rarr;
        </button>
        <?php echo form_close() ?>
    </div>

</div>