<?php

?>
<div class="col-sm-1"></div>
<div class="col-sm-10" style="background-color: #fff; padding: 10px">
    <h3><?php echo $detail->ticket_title ?></h3>
    <?php if ($detail->status !== "Closed") { ?>
        <a href="<?php echo site_url('vendor/close/' . $detail->id) ?>" class="btn btn-xs btn-danger pull-right">Close
            Ticket</a>
    <?php } ?>
    <hr/>
    <blockquote>
        <?php echo $detail->ticket_detail ?>
    </blockquote>
    <p>
        <?php

        $this->db->select('msg, msg_from')->where('ticket_id', $detail->id)->order_by('id', 'ASC');
        foreach ($this->db->get('ticket_reply')->result() as $data) {
            if ($data->msg_from == $this->session->vendor_id) {
                $class = "from_ticket";
                $from  = "Me";
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
    <?php echo form_open() ?>
    <input type="hidden" name="ticket_id" value="<?php echo $detail->id ?>">
    <h3>Reply This Ticket</h3>
    <textarea id="editor" name="ticket_reply"></textarea>
    <button class="btn btn-success">Reply</button>
    <?php echo form_close() ?>
</div>
<div class="col-sm-1"></div>

