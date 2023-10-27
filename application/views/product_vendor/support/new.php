<?php

?>
<?php echo form_open() ?>
<div class="col-sm-12">
    <label>Subject in Brief*</label>
    <input type="text" class="form-control" value="<?php echo set_value('ticket_title') ?>" name="ticket_title">
</div>
<div class="col-sm-12">
    <label>Issue in Detail*</label>
    <textarea class="form-control" id="editor" name="ticket_data"><?php echo set_value('ticket_data') ?></textarea>
</div>
<div class="col-sm-12">
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
    <br/><br/>
</div>
<?php echo form_close() ?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("support").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
