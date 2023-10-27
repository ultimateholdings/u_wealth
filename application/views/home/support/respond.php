<?php

?>
<div class="container frame" style="min-height:700px;">
<div class="row">
    <div class="col-sm-12" style="background-color: #fff; padding: 10px">
        <h3>Subject : <?php echo $detail->ticket_title ?></h3>
        <?php if ($detail->status !== "Closed") { ?>
            <a href="<?php echo site_url('HomeApp/close/' . $detail->id) ?>" class="btn btn-xs btn-danger pull-right">Close
                Ticket</a>
        <?php } ?>
        <hr/>
        <h5>Message : </h5><br>
        <blockquote>
            <?php echo $detail->ticket_detail ?>
        </blockquote>
        <p>
            <?php

            $this->db->select('msg, msg_from')->where('ticket_id', $detail->id)->order_by('id', 'ASC');
            foreach ($this->db->get('ticket_reply')->result() as $data) {
                if ($data->msg_from !== 'Admin') {
                    $class = "from_ticket";
                    $from  = "User Reply:";
                }
                else {
                    $class = "to_ticket";
                    $from  = "Support Team";
                }
                echo '<fieldset class="' . $class . '"><legend class="ticket_legend">' . $from . ': </legend>' . $data->msg . '</fieldset>';
            }

            ?>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <?php if ($detail->status !== "Closed") { ?>
        <?php echo form_open() ?>
        <input type="hidden" name="ticket_id" value="<?php echo $detail->id ?>">
        <h3>Reply This Ticket</h3>
        <textarea id="editor" name="ticket_reply"></textarea>
        <br>
        <button class="btn btn-success">Reply</button>
        <?php echo form_close() ?>
        <?php } ?>
    </div>
</div>
</div>