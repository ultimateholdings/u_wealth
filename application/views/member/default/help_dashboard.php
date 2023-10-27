<?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
} ?>
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-default-light panel-card border-default rounded">
            <div class="panel-heading">
                <div class="panel-title">Total Help Sent:
                </div>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-item">
                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                'status'    => 'Accepted',
                                'sender_id' => $this->session->user_id,
                            )) ?></strong>
                    </div><!-- /.col-xs-6 -->
                </div><!-- /.row -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div><!-- /.col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-default-light panel-card border-default rounded">
            <div class="panel-heading">
                <div class="panel-title">Total Help Received:
                </div>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-item">
                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                'status'      => 'Accepted',
                                'receiver_id' => $this->session->user_id,
                            )) ?></strong>
                    </div><!-- /.col-xs-6 -->
                </div><!-- /.row -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div><!-- /.col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-default-light panel-card border-default rounded">
            <div class="panel-heading">
                <div class="panel-title">Total Pending Receivable
                </div>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-item">
                        <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                'status'      => 'Sent',
                                'receiver_id' => $this->session->user_id,
                            )) ?></strong>
                    </div><!-- /.col-xs-6 -->
                </div><!-- /.row -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div><!-- /.col-sm-6 -->

    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-default-light panel-card border-default rounded">
            <div>
                <br/>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <a href="<?php echo site_url('ticket/old-Supports') ?>">
                        <div class="col-xs-12 col-item blink"
                             style="text-align: center; color:red">
                            <strong>Click Here</strong><br/>
                            <span>for Support</span>
                        </div>
                    </a>
                    <!-- /.col-xs-6 -->
                </div><!-- /.row -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div><!-- /.col-sm-6 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-sm-6 table-responsive">
        <h3>Please Send Donations to:</h3>
        <table class="table table-bordered table-striped alert-info">
            <tr style="font-weight: 900; background-color: #0d638f; color:#fff">
                <td>Receiver</td>
                <td>Bank Detail</td>
                <td>Phone No</td>
                <td>Amount</td>
                <td>#</td>
            </tr>
            <?php
            $this->db->select('id,receiver_id, donation_amount')->from('donations')
                     ->where(array(
                                 'status'         => 'Sent',
                                 'sender_id'      => $this->session->user_id,
                                 'expiry_date >=' => date('Y-m-d'),
                             ))
                     ->order_by('id', 'DESC')->limit(10);
            $no   = 1;
            $data = $this->db->get()->result();
            foreach ($data as $res) {
                $detail = $this->db_model->select_multi('id, name,phone', 'member', array('id' => $res->receiver_id));
                $bank   = $this->db_model->select_multi('bank_ac_no,bank_name,bank_ifsc', 'member_profile', array('userid' => $res->receiver_id));
                echo '<tr>
                    <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                    <td>Bank:' . $bank->bank_name . '<br/>A/C No:' . $bank->bank_ac_no . '<br/>IFSC: ' . $bank->bank_ifsc . '</td>
                    <td>' . $this->db_model->select('phone', 'member', array('id' => $res->receiver_id)) . '</td>
                    <td>' . config_item('currency') . $res->donation_amount . '</td>
                    <td><a href="javascript:;" onclick="document.getElementById(\'id\').value=\'' . $res->id . '\'"
                    data-toggle="modal"
                    data-target="#myModal"
                    class="btn btn-xs btn-primary">Send</a></td>
                </tr>';
            }
            ?>
        </table>
    </div>
    <div class="col-sm-6 table-responsive">
        <h3>Confirm Donations:</h3>
        <table class="table table-bordered table-striped alert-warning">
            <tr style="font-weight: 900; background-color: #ff4848; color:#fff">
                <td>Sender</td>
                <td>Phone No</td>
                <td>Amount</td>
                <td>Transaction Detail</td>
                <td>#</td>
            </tr>
            <?php
            $this->db->select('id,sender_id, donation_amount, trid, file,status')->from('donations')
                     ->where(array(
                                 'status !='   => 'Accepted',
                                 'receiver_id' => $this->session->user_id,
                             ))
                     ->order_by('id', 'DESC')->limit(10);
            $no   = 1;
            $data = $this->db->get()->result();
            foreach ($data

                     as $res) {

                $detail = $this->db_model->select_multi('name,phone', 'member', array('id' => $res->sender_id));
                if ($res->file!=="") {
                    $file_line = '<br/><a target="_blank" class="btn btn-xs btn-primary" href="' . base_url('uploads/' . $res->file) . '">See Receipt</a>';
                }
                echo '<tr>
                    <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                    <td>' . $this->db_model->select('phone', 'member', array('id' => $res->sender_id)) . '</td>
                    <td>' . config_item('currency') . $res->donation_amount . '</td>
                    <td>';
                if ($res->status!=='Waiting') {
                    echo '<td colspan="2">Waiting to Send Payment</td>';
                } else {
                    echo ' ' . $res->trid . '
                    ' . $file_line . '</td>
                    <td><a href="donation/approve-donation/' . $res->id . '" onclick="return confirm(\'Are you sure, you have received this payment and want to confirm ?\')"
                    class="btn btn-xs btn-success">Accept
                    </a></td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div><!-- /.row -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Donation</h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo form_open_multipart('donation/send-donation') ?>
                    <input type="hidden" name="id" id="id" value="">
                    <label>Enter Transaction Detail (Optional)</label><br/>
                    <textarea name="tdetail" class="form-control"></textarea><br/>
                    <input name="files" type="file"> Upload Receipt<br/>
                    <button class="btn btn-primary">Submit</button>
                    <?php echo form_close() ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>