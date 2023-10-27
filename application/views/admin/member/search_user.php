<?php echo form_open('users/search') ?>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Joining Plan</label>
            <select class="form-control" name="plan_id">
                <option value=''>Choose a Plan</option>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                    } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" id="userid" name="userid">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Phone No</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Email ID</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Sponsor ID</label>
            <input type="text" class="form-control" id="sponsor" name="sponsor"></select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Join Start Date</label>
            <input type="text" class="form-control datepicker" readonly id="startdate" name="startdate">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Join End Date</label>
            <input type="text" class="form-control datepicker" readonly id="enddate" name="enddate">
        </div>
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
        <a href="<?php echo site_url('admin') ?>" class="btn btn-light">&larr; Go Back</a>
    </div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>