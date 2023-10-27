<aside id="aside" class="ui-aside">
  <ul class="nav" ui-nav>
      <li class="member">
          <a href="<?php echo base_url('member') ?>">Hi, <?php echo $member_data['member']->name ?><br/>(
              My ID
              : <?php echo config_item('ID_EXT') . $member_data['member']->id ?>)
          </a>
      </li>
      <li id="billpayment" >
          <a href="<?php echo site_url('bbps_recharge/billPayment') ?>"><i class="fa fa-home"></i><span>Home</span></a>
      </li>
      <li id="dashboard" >
          <a href="<?php echo site_url('bbps_recharge') ?>"><i class="fa fa-home"></i><span>Dashboard</span></a>
      </li>
      <li id='wletter' class="active">
          <a href="<?php echo site_url('bbps_recharge/getReceipt') ?>"><i
                      class="fa fa-file-text-o"></i><span> Receipt status</span></a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('bbps_recharge/getReceipt') ?>"><i
                      class="fa fa-file-text-o"></i><span> Compliant Request Status</span></a>
      </li>      
      <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
      </li>
  </ul>
</aside>