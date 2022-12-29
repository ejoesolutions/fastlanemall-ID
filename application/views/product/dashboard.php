<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-green-sharp">
                <span data-counter="counterup" data-value="78003">0</span>
                <small class="font-green-sharp">MYR</small>
              </h3>
              <small>SALES</small>
            </div>
            <div class="icon">
              <i class="icon-pie-chart"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                <span class="sr-only">76% progress</span>
              </span>
            </div>
            <div class="status">
              <div class="status-title"> progress </div>
              <div class="status-number"> 76% </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-red-haze">
                <span data-counter="counterup" data-value="1349">0</span>
              </h3>
              <small>AGENTS</small>
            </div>
            <div class="icon">
              <i class="icon-like"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                <span class="sr-only">85% change</span>
              </span>
            </div>
            <div class="status">
              <div class="status-title"> change </div>
              <div class="status-number"> 85% </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-blue-sharp">
                <span data-counter="counterup" data-value="5670">0</span>
                <small class="font-blue-sharp">MYR</small>
              </h3>
              <small>NEW ORDERS</small>
            </div>
            <div class="icon">
              <i class="icon-basket"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                <span class="sr-only">45% grow</span>
              </span>
            </div>
            <div class="status">
              <div class="status-title"> grow </div>
              <div class="status-number"> 45% </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-purple-soft">
                <span data-counter="counterup" data-value="115276">0</span>
              </h3>
              <small>MEMBERS</small>
            </div>
            <div class="icon">
              <i class="icon-user"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                <span class="sr-only">56% change</span>
              </span>
            </div>
            <div class="status">
              <div class="status-title"> change </div>
              <div class="status-number"> 57% </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <!-- Chart and graph -->
    <div class="row">
      <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light ">
          <div class="portlet-title">
            <div class="caption">
              <span class="caption-subject bold uppercase font-dark">Revenue</span>
              <span class="caption-helper">distance stats...</span>
            </div>

          </div>
          <div class="portlet-body">
            <div id="dashboard_amchart_1" class="CSSAnimationChart"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light ">
          <div class="portlet-title">
            <div class="caption ">
              <span class="caption-subject font-dark bold uppercase">Finance</span>
              <span class="caption-helper">distance stats...</span>
            </div>
          </div>
          <div class="portlet-body">
            <div id="dashboard_amchart_3" class="CSSAnimationChart"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <!-- Activites records -->
    <div class="row">
      <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light ">
          <div class="portlet-title">
            <div class="caption caption-md">
              <i class="icon-bar-chart font-dark hide"></i>
              <span class="caption-subject font-dark bold uppercase">Member Activity</span>
              <span class="caption-helper">weekly stats...</span>
            </div>
          </div>
          <div class="portlet-body">
            <div class="row number-stats margin-bottom-30">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="stat-left">
                  <div class="stat-chart">
                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                    <div id="sparkline_bar"></div>
                  </div>
                  <div class="stat-number">
                    <div class="title"> Total </div>
                    <div class="number"> 2460 </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="stat-right">
                  <div class="stat-chart">
                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                    <div id="sparkline_bar2"></div>
                  </div>
                  <div class="stat-number">
                    <div class="title"> New </div>
                    <div class="number"> 719 </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-scrollable table-scrollable-borderless">
              <table class="table table-hover table-light">
                <thead>
                  <tr class="uppercase">
                    <th colspan="2"> MEMBER </th>
                    <th> Earnings </th>
                    <th> CASES </th>
                    <th> CLOSED </th>
                    <th> RATE </th>
                  </tr>
                </thead>
                <tr>
                  <td class="fit">
                    <img class="user-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar4.jpg">
                  </td>
                  <td>
                    <a href="javascript:;" class="primary-link">Brain</a>
                  </td>
                  <td> $345 </td>
                  <td> 45 </td>
                  <td> 124 </td>
                  <td>
                    <span class="bold theme-font">80%</span>
                  </td>
                </tr>
                <tr>
                  <td class="fit">
                    <img class="user-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar5.jpg">
                  </td>
                  <td>
                    <a href="javascript:;" class="primary-link">Nick</a>
                  </td>
                  <td> $560 </td>
                  <td> 12 </td>
                  <td> 24 </td>
                  <td>
                    <span class="bold theme-font">67%</span>
                  </td>
                </tr>
                <tr>
                  <td class="fit">
                    <img class="user-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar6.jpg">
                  </td>
                  <td>
                    <a href="javascript:;" class="primary-link">Tim</a>
                  </td>
                  <td> $1,345 </td>
                  <td> 450 </td>
                  <td> 46 </td>
                  <td>
                    <span class="bold theme-font">98%</span>
                  </td>
                </tr>
                <tr>
                  <td class="fit">
                    <img class="user-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar7.jpg">
                  </td>
                  <td>
                    <a href="javascript:;" class="primary-link">Tom</a>
                  </td>
                  <td> $645 </td>
                  <td> 50 </td>
                  <td> 89 </td>
                  <td>
                    <span class="bold theme-font">58%</span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light ">
          <div class="portlet-title">
            <div class="caption caption-md">
              <i class="icon-bar-chart font-dark hide"></i>
              <span class="caption-subject font-dark bold uppercase">Customer Support</span>
              <span class="caption-helper">45 pending</span>
            </div>

          </div>
          <div class="portlet-body">
            <div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
              <div class="general-item-list">
                <div class="item">
                  <div class="item-head">
                    <div class="item-details">
                      <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar4.jpg">
                      <a href="" class="item-name primary-link">Nick Larson</a>
                      <span class="item-label">3 hrs ago</span>
                    </div>
                    <span class="item-status">
                      <span class="badge badge-empty badge-success"></span> Open</span>
                    </div>
                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                  </div>
                  <div class="item">
                    <div class="item-head">
                      <div class="item-details">
                        <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar3.jpg">
                        <a href="" class="item-name primary-link">Mark</a>
                        <span class="item-label">5 hrs ago</span>
                      </div>
                      <span class="item-status">
                        <span class="badge badge-empty badge-warning"></span> Pending</span>
                      </div>
                      <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
                    </div>
                    <div class="item">
                      <div class="item-head">
                        <div class="item-details">
                          <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar6.jpg">
                          <a href="" class="item-name primary-link">Nick Larson</a>
                          <span class="item-label">8 hrs ago</span>
                        </div>
                        <span class="item-status">
                          <span class="badge badge-empty badge-primary"></span> Closed</span>
                        </div>
                        <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
                      </div>
                      <div class="item">
                        <div class="item-head">
                          <div class="item-details">
                            <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar7.jpg">
                            <a href="" class="item-name primary-link">Nick Larson</a>
                            <span class="item-label">12 hrs ago</span>
                          </div>
                          <span class="item-status">
                            <span class="badge badge-empty badge-danger"></span> Pending</span>
                          </div>
                          <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                        </div>
                        <div class="item">
                          <div class="item-head">
                            <div class="item-details">
                              <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar9.jpg">
                              <a href="" class="item-name primary-link">Richard Stone</a>
                              <span class="item-label">2 days ago</span>
                            </div>
                            <span class="item-status">
                              <span class="badge badge-empty badge-danger"></span> Open
                            </span>
                          </div>
                          <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
                        </div>
                        <div class="item">
                          <div class="item-head">
                            <div class="item-details">
                              <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar8.jpg">
                              <a href="" class="item-name primary-link">Dan</a>
                              <span class="item-label">3 days ago</span>
                            </div>
                            <span class="item-status">
                              <span class="badge badge-empty badge-warning"></span> Pending
                            </span>
                          </div>
                          <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                        </div>
                        <div class="item">
                          <div class="item-head">
                            <div class="item-details">
                              <img class="item-pic rounded" src="<?php echo base_url('assets/'); ?>pages/media/users/avatar2.jpg">
                              <a href="" class="item-name primary-link">Larry</a>
                              <span class="item-label">4 hrs ago</span>
                            </div>
                            <span class="item-status">
                              <span class="badge badge-empty badge-success"></span> Open
                            </span>
                          </div>
                          <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- End of graph -->
        </div>
