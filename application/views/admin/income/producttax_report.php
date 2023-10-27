<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : '';
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
if($top_id>0)
{
    $this->db->where('userid', htmlentities($top_id));    
}
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}
$this->db->where('transaction_id !=', '')->order_by('id','DESC');
$data = $this->db->get('tax_report')->result();
//print_r($data);die();
//debug_log($this->db->last_query());
?>
<div class="container">
  <div class="pull-right ">
     <form method="post" action='export_sale_tax'>
        <input type="submit" name="export_sale_tax" value="Download Custom Report" class="btn btn-primary my-2" />
    </form>
  </div><!-- File upload form -->
</div>
<div class="table-responsive" >
    <table class="table table-bordered table-striped" id="DTable" data-page-length='100' data-name="Product_Sale_Tax_Report" data-export='No' style="margin-top: 10px;">
        <thead>
            <tr>
            <td>SI. No.</td>
            <td>User ID</td>
            <td>Name</td>
            <td>Invoice No.</td>
            <td class="datefilter">Date</td>
            <td>Tax (%)</td>
            <td>Taxable Value</td>
            <td>Tax Amount</td>
            <td>Total Amount</td>
            <td>Details</td>
            <td class="noExport">#</td>
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
                <td><?php echo $e->invoice_id ?></td>
                <td><?php echo date("Y-m-d",strtotime($e->date)); ?></td>
                <td><?php echo $e->tax_percnt ?></td>
                <td><?php echo config_item('currency') . round($e->amount-$e->tax_amount,2); ?></td>
                <td><?php echo config_item('currency') . $e->tax_amount ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->transaction_id; ?></td>
                <td><a target="_blank" href="<?php echo site_url('accounting/invoice_view/' . $e->invoice_id); ?>" class="btn btn-warning btn-xs">Print Invoice</a>
                </td>
            </tr>
        <?php } 
        } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("reports").classList.add('active');
        document.querySelector("#reports > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>