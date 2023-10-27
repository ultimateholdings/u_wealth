<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : '';
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
if($top_id)
{
    $this->db->where('userid', htmlentities($top_id));    
}
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}
//$this->db->where('transaction_id !=', '')->order_by('id','DESC');
$this->db->where(array(
                    'transaction_id !='=>'', 'vendor_id'=>$this->session->vendor_id));
$this->db->limit(100);
$data = $this->db->get('tax_report')->result();
//debug_log($this->db->last_query());
?>
<!DOCTYPE html>
<html>
<head>
    <style>
 .nav-tabs-custom {
    margin-bottom: 20px;
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 3px;
}
.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
    width:100%;
    padding-left: 20px;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    border-top-width: 3px;
    border-top-style: solid;
    border-top-color: rgb(210, 214, 222);
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    position: relative;
}
.h3{
    font-family: 'Source Sans Pro',sans-serif;
}
.collapse.in {
    display: block;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.col-md-3{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.form-group {
    margin-bottom: 15px;
}
.label{
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
}
.@media screen and (max-width: 767px){
table-responsive{
    width: 100%;
    margin-bottom: 5px;
    overflow-y: hidden;
    border: 1px solid #ddd;
}
}

.table-responsive {
    min-height: .01%;
    overflow-x: auto;
}
.table-bordered{
    border: 1px solid #ddd;
    border-top-color: rgb(221, 221, 221);
    border-top-style: solid;
    border-top-width: 1px;
    border-right-color: rgb(221, 221, 221);
    border-right-style: solid;
    border-right-width: 1px;
    border-bottom-color: rgb(221, 221, 221);
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-left-color: rgb(221, 221, 221);
    border-left-style: solid;
    border-left-width: 1px;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
}
</style>
</head>
<body>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box  box-primary " id="accordion">
        <div class="box-header with-border" style="cursor: pointer;">
            <h3 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                 <i class="fa fa-filter" aria-hidden="true"></i>  Filters
              </a>
            </h3>
        </div>
      </div>
      <div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
        <div class="box-body">
          <form method="post" action="">
            <div class="row">
                <div class="col-sm-4">
                    <label>Enter User Id</label>
                    <input type="text"  name="top_id" class="form-control">
                </div>
                <div class="col-sm-4">
                  <label>Start Date</label>
                  <input type="text" readonly class="form-control datepicker" name="sdate">
                </div>
                <div class="col-sm-4">
                  <label>End Date</label>
                  <input type="text" readonly class="form-control datepicker" name="edate">
                </div>
            </div>
            <br/>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-primary" style="width: 104px;">Search</button>
            </div>
          </form>
          <div class="row">
            <form method="post" action='export_sale_tax'>
              <div class="col-sm-3">
               <input type="submit" name="export_sale_tax" value="Download" class="btn btn-primary" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 <div class="row">
  <div class="col-md-12">
   <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active">
            <a href="#member_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> Tax Report</a>
        </li>
      </ul>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
        <thead>
          <tr>
          <td><input type="checkbox" id="select-all-row"></td>
          <td>User ID</td>
          <td>Name</td>
          <td>Total Cost</td>
          <td>Tax Amount</td>
          <td>Tax (%)</td>
          <td>Date</td>
          <td>Details</td>
          </tr>
        </thead>
          <tbody>
          <?php
          $sn = count($data);
          if($data){
          foreach ($data as $e) {
              ?>
              <tr>
                  <td><?php echo $sn--; ?></td>
                  <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                  <td><?php echo  $this->db_model->select('name', 'member', array('id' => $e->userid));?>
                  <td><?php echo config_item('currency') . $e->amount ?></td>
                  <td><?php echo config_item('currency') . $e->tax_amount ?></td>
                  <td><?php echo $e->tax_percnt ?></td>
                  <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                  <td><?php echo $e->transaction_id; ?></td>
              </tr>
          <?php } 
          }
          /*else if($result){
              foreach($result as $t){ ?>
                 <tr>

                  <td><?php echo "from r".  $sn++; ?></td>
                  <td><?php echo $t['userid']; ?></td>
                  <td><?php echo  $this->db_model->select('name', 'member', array('id' => $t['userid']));?>
                  <td><?php echo  $this->db_model->select('tax_no', 'member_profile', array('userid' => $t['userid']));?>
                  <td><?php echo config_item('currency') . $t['amount']; ?></td>
                  <td><?php echo config_item('currency') . $t['tax_amount']; ?></td>
                  <td><?php echo config_item('currency') . ($t['amount'] - $t['tax_amount']); ?></td>
                  <td><?php echo $t['tax_percnt'] ?></td>
                  <td><?php echo date("Y-m-d h:i A",strtotime($t['date'])); ?></td>
                  <!--<td>

                      <a href="<?php echo site_url('income/tax-remove/' . $t['id']) ?>" class="btn btn-danger btn-xs"
                         onclick="return confirm('Are you sure want to delete this record ?')">Delete</a></td>-->
              </tr>
              <?php } 

           } */?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("reports").classList.add('active');
        document.querySelector("#reports > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>