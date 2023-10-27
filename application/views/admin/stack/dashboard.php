<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <?php if($this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))>0){ ?>
              <div class="alert alert-success" align="center">
              You have Received Bank Deposits from Members !!! Please <a href="<?php echo site_url('income/bank_payment') ?>" style='color: blue;'> Click Here </a> to Approve the payment !!!
             </div>
              <?php } ?>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Analytics spakline & chartjs  -->
              <!--
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="card">
                        <div class="card-header border-0-bottom">
                            <h4 class="card-title">Business Overview</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row my-1">
                                    <div class="col-lg-4 col-12">
                                        <div class="text-center">
                                            <h3>23,454</h3>
                                            <p class="text-muted">Registration Views <span class="success"><i class="feather icon-arrow-up"></i> 8.16%</span></p>
                                            <div id="sp-tristate-bar-total-revenue"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="text-center">
                                            <h3>6,630</h3>
                                            <p class="text-muted">Member Signup<span class="danger"><i class="feather icon-arrow-down"></i> 2.30%</span></p>
                                            <div id="sp-stacked-bar-total-sales"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="text-center">
                                            <h3>86,578</h3>
                                            <p class="text-muted">Total Visits <span class="warning"><i class="feather icon-arrow-up"></i> 4.27%</span></p>
                                            <div id="sp-bar-total-cost"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="chartjs">
                                            <canvas id="line-stacked-area" height="300"></canvas>
                                        </div>
                                        <ul class="list-inline text-center mt-1">
                                            <li class="mr-1">
                                                <h6><i class="fa fa-circle success"></i> <span>Registration Views</span></h6>
                                            </li>
                                            <li class="mr-1">
                                                <h6><i class="fa fa-circle danger"></i> <span>Member Signups</span></h6>
                                            </li>
                                            <li class="mr-1">
                                                <h6><i class="fa fa-circle warning"></i> <span>Total Visits</span></h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
            <!--/ Analytics spakline & chartjs  -->

            <!--stats-->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                         <h3 class="primary"> <?php echo $this->db_model->count_all('member')-1; ?></h3>
+
+                                        <span>Total Team</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-user-follow primary font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <br>
+
+                                <a href="<?php echo base_url('income/make_payment'); ?>" class="btn btn-primary btn-sm">Show</a>
+
+                                 <!--
                                <div class="progress progress-sm mt-1 mb-0">
                                   <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax
                                </div>
                                                                -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                     <h3 class="danger"><?php echo $upgrade_request_count; ?></h3>
+
+                                        <span>Plan Upgrade Request</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="fa fa-level-up danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <br>
+
+                                <a href="<?php echo base_url('users/view-members'); ?>" class="btn btn-danger btn-sm">Show</a>
+
+                                 <!--
                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                        <h3 class="success"><?php echo config_item('currency').' '.$total_income_sum; ?></h3>

                                        <span>Total Ad Income (Paid)</span>

                                    </div>
                                    <div class="media-right media-middle">
                                      <i class="fa fa-dollar success font-large-2 float-right"></i>

                                    </div>

                                </div>

                                <br>

                                <a href="<?php echo base_url('ads/member_income'); ?>" class="btn btn-success btn-sm">Show</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-12">

                    <div class="card">

                        <div class="card-content">

                            <div class="card-body">

                                <div class="media">

                                    <div class="media-body text-left w-100">

                                        <h3 class="warning"><?php echo count($active_ads); ?></h3>

                                        <span>Total Active Ad Count</span>

                                    </div>

                                    <div class="media-right media-middle">

                                        <i class="fa fa-trophy warning font-large-2 float-right"></i>

                                    </div>
                                </div>
                                 <br>

                                <a href="<?php echo base_url('ads/manage_ads'); ?>" class="btn btn-warning btn-sm">Show</a>

                                <!--

                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left w-100">
                                       <h3 class="warning"><?php echo $this->db_model->count_all('plans'); ?></h3>

                                        <span>Total Plans</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-globe warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                 <br>

                                <a href="<?php echo base_url('plan/manage_plans'); ?>" class="btn btn-warning btn-sm">Show</a>

                                <!--

                                <div class="progress progress-sm mt-1 mb-0">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                     </div>
+
+                                -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-12">

                    <div class="card">

                        <div class="card-content">

                            <div class="card-body">

                                <div class="media">

                                    <div class="media-body text-left w-100">

                                        <h3 class="success"><?php echo $this->db_model->count_all('ads_type'); ?></h3>

                                        <span>Total Ad Types</span>

                                    </div>

                                    <div class="media-right media-middle">

                                        <i class="icon-layers success font-large-2 float-right"></i>

                                    </div>

                                </div>

                                <br>

                                <a href="<?php echo base_url('ads/manage_ads_type'); ?>" class="btn btn-success btn-sm">Show</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6 col-12">

                    <div class="card">

                        <div class="card-content">

                            <div class="card-body">

                                <div class="media">

                                    <div class="media-body text-left w-100">

                                        <h3 class="danger"><?php echo $approved_invoice_count; ?></h3>

                                        <span>Total Approved Invoice</span>

                                    </div>

                                    <div class="media-right media-middle">

                                        <i class="fa fa-file-text-o danger font-large-2 float-right"></i>

                                    </div>

                                </div>

                                <br>

                                <a href="<?php echo base_url('ads/my_purchase'); ?>" class="btn btn-danger btn-sm">Show</a>

                                 <!--

                                <div class="progress progress-sm mt-1 mb-0">

                                   <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/stats-->

            <!-- Audience by country & users visit-->
              <!--
            <div class="row match-height">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Avg. Session Duration & Pages/Session</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="area-chart" class="height-250"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Goals Complition</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div id="goal-list-scroll" class="table-responsive height-250 position-relative">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Goals</th>
                                            <th>Goal Value</th>
                                            <th>Conversion rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Account</td>
                                            <td>$0.18</td>
                                            <td class="text-center font-small-2">85%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Subscribe</td>
                                            <td>$0.12</td>
                                            <td class="text-center font-small-2">75%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>$220</td>
                                            <td class="text-center font-small-2">65%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Laptop</td>
                                            <td>$880</td>
                                            <td class="text-center font-small-2">35%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LED TV</td>
                                            <td>$1002</td>
                                            <td class="text-center font-small-2">25%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>AC</td>
                                            <td>$1200</td>
                                            <td class="text-center font-small-2">15%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              -->
            <!--/ Audience by country  & users visit -->

            <!-- Analytics map based session -->
             <!--
            <div class="row">
                <div class="col-12">
                    <div class="card box-shadow-0">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xl-9 col-lg-12">
                                    <div id="world-map-markers" class="height-450"></div>
                                </div>
                                <div class="col-xl-3 col-lg-12">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Visitors Sessions</h4>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6 col-sm-12">
                                                <p class="pb-1">Sessions by Browser</p>
                                                <div id="sessions-browser-donut-chart" class="height-200"></div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-sm-12">
                                                <div class="sales pr-2 pt-2">
                                                    <div class="sales-today mb-2">
                                                        <p class="m-0">Today's <span class="primary float-right"><i class="feather icon-arrow-up primary"></i> 6.89%</span></p>
                                                        <div class="progress progress-sm mt-1 mb-0">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sales-yesterday">
                                                        <p class="m-0">Yesterday's <span class="danger float-right"><i class="feather icon-arrow-down danger"></i> 4.18%</span></p>
                                                        <div class="progress progress-sm mt-1 mb-0">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
            <!-- Analytics map based session -->

            <!-- Bounce Rate & List -->
             <!--
            <div class="row match-height">
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body sales-growth-chart">
                                <div class="chart-title">
                                    <h1 class="display-4">32%</h1>
                                    <span class="text-muted">Signup Rate</span>
                                </div>
                                <div id="bounce-rate" class="height-250"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Audience by Country</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div id="audience-list-scroll" class="table-responsive height-300 position-relative">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Page views</th>
                                            <th>Device</th>
                                            <th>% Bounce rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-gb"></i> United State</td>
                                            <td>18</td>
                                            <td>Desktop</td>
                                            <td class="text-center font-small-2">85%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-au"></i> Australia</td>
                                            <td>12</td>
                                            <td>Mobile</td>
                                            <td class="text-center font-small-2">75%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-br"></i> Brazil</td>
                                            <td>25</td>
                                            <td>Tablet</td>
                                            <td class="text-center font-small-2">66%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 66%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-gb"></i> Great Britain (UK)</td>
                                            <td>8</td>
                                            <td>Mobile</td>
                                            <td class="text-center font-small-2">58%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-hk"></i> Hong Kong</td>
                                            <td>18</td>
                                            <td>Desktop</td>
                                            <td class="text-center font-small-2">45%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-in"></i> India</td>
                                            <td>10</td>
                                            <td>Desktop</td>
                                            <td class="text-center font-small-2">38%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-jp"></i> Japan</td>
                                            <td>11</td>
                                            <td>Moblie</td>
                                            <td class="text-center font-small-2">25%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-mx"></i> Mexico</td>
                                            <td>15</td>
                                            <td>Tablet</td>
                                            <td class="text-center font-small-2">22%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 22%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-ma"></i> Morocco</td>
                                            <td>14</td>
                                            <td>Moblie</td>
                                            <td class="text-center font-small-2">18%
                                                <div class="progress progress-sm mt-1 mb-0">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 18%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
            <!--/ Bounce Rate & List -->
        </div>
    </div>
</div>
