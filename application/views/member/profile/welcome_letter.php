<?php

$detail = $this->db_model->select_multi('*', 'member', array('id' => $this->session->user_id));

$array_src = array(
    '{{member_id}}',
    '{{member_name}}',
    '{{member_phone}}',
    '{{member_email}}',
    '{{member_add}}',
    '{{member_sponsor}}',
    '{{member_join_date}}',
    '{{member_purchased}}',
    '{{id_extn}}',
);

$array_rplc = array(
    $this->session->user_id,
    $detail->name,
    $detail->phone,
    $detail->email,
    $detail->address,
    $detail->sponsor,
    date('Y-m-d', strtotime($detail->activate_time)),
    $this->db_model->select('plan_name', 'plans', array('id' => $detail->signup_package)),
    config_item('ID_EXT'),

);
$file_data  = str_ireplace($array_src, $array_rplc, $file_data);
echo $file_data;
?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("wletter").classList.add('active');
    });
</script>