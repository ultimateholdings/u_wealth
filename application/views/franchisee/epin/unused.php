<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Unused Epins
            </div>
            <?php 
            if($epin) { ?>
                <div class="panel-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>SN</th>
                            <th>Epin</th>
                            <th>Amount</th>
                            <th>Issue To</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sn = 1;
                        foreach ($epin as $e) { ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $e['epin']; ?></td>
                                <td><?php echo $e['amount']; ?></td>
                                <td><?php echo config_item('ID_EXT') . $e['issue_to']; ?></td>
                                <td><?php echo date("Y-m-d h:i A",strtotime($e['generate_time'])); ?></td>
                                <td><?php echo $e['type']; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo site_url('site/register/epin/' . $e['epin']); ?>"
                                       class="btn btn-info btn-xs">Add New Member</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="pull-right">
                <?php echo $this->pagination->create_links(); ?>
            </div>   
            <?php } else { ?>
            <div> 
                <h3 style="margin-left: 10%;"> There are no unused Epins !! </h3>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
        

