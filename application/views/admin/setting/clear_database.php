<style type="text/css">
    @media only screen and (min-width: 992px) {
        #clear_database{
            width: 50%;
        }
    }
</style>
<div>&nbsp;</div>
<div>&nbsp;</div>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Clear Database"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="backup-tab" data-toggle="tab" href="#backup" role="tab" aria-controls="backup" aria-selected="true"><?php echo "Backup Tables"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo "Run Custom Queries"; ?></a>
  </li>
  </ul>
<br>
<div class="tab-content" id="clear_database">
     <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" >
            <?php echo form_open('setting/clear_database') ?>
            <div class="col-sm-12">
                <label>Clear Type</label>
                <select class="form-control" name="type">
                    <option value="member">Only Member & Earnings Data</option>
                    <option value="registration">Only Plan, Member & Earnings</option>
                    <option value="earnings_all">Only Earnings - All</option>
                    <option value="earnings_today">Only Earnings - Today</option>
                    <option value="all">Erase All Data</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Current Admin Password</label>
                <input type="password" required class="form-control" value="<?php echo set_value('password') ?>"
                       name="password">
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Please Check Below to Agree</label><br/>
                <input type="checkbox" required name="agree"> I know that If I click the below button, All the entries from my
                database will get deleted which is not reversible.
            </div>
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Reset My Database">
            </div>
            <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="backup" role="tabpanel" aria-labelledby="backup-tab">
            <?php echo form_open('setting/backup_tables') ?>
            <div class="col-sm-12">
                <label>Backup Tables</label>
                <select class="form-control" name="type">
                    <option value="member">Member</option>
                    <option value="all" style="display: none;">Erase All Data</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Current Admin Password</label>
                <input type="password" required class="form-control" value="<?php echo set_value('password') ?>"
                       name="password">
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Process Backup">
            </div>
            <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php echo form_open('setting/custom_query') ?>
            <div class="col-sm-12">
                <label>CRUD</label>
                <select class="form-control" name="type">
                    <option>Select</option>
                    <option>Insert</option>
                    <option>Update</option>
                    <option>Delete</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Table</label>
                <select class="form-control" name="type">
                    <option>earning</option>
                    <option>member</option>
                    <option>product_sale</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Custom Query</label><br/>
                <textarea cols="100" rows="5" name="query"></textarea>
            </div>
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
            <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php echo form_open('setting/custom_query') ?>
            <div class="col-sm-12">
                <label>CRUD</label>
                <select class="form-control" name="type">
                    <option>Select</option>
                    <option>Insert</option>
                    <option>Update</option>
                    <option>Delete</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Table</label>
                <select class="form-control" name="type">
                    <option>earning</option>
                    <option>member</option>
                    <option>product_sale</option>
                </select>
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-12">
                <label>Custom Query</label><br/>
                <textarea cols="100" rows="5" name="query"></textarea>
            </div>
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
            <?php echo form_close() ?>
    </div>
</div>
<?php if(config_item('enable_backup')=='Yes') { ?>
<div class="alert alert-warning">
    <strong>Notice: </strong> Before you click on "Reset My Database", Please keep a backup of your existing database which will ensure further safety if anything goes wrong. <a href="<?php echo site_url('setting/export-final') ?>">Click Here for Backup &rarr;</a>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
         document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector('.cleardb').setAttribute('style', 'color: darkorange !important;');
    });
</script>