<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="sidebar-left">
        <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
                <!-- sidebar close icon -->
                <span class="sidebar-close-icon">
                    <i class="feather icon-x"></i>
                </span>
                <!-- sidebar close icon -->
                <div class="email-app-menu">
                    <div class="form-group form-group-compose">
                        <!-- compose button  -->
                        <button type="button" class="btn btn-danger btn-glow btn-block my-2 compose-btn">
                            <i class="feather icon-plus mr-25"></i>
                            Compose
                        </button>
                    </div>
                    <div class="sidebar-menu-list">
                        <!-- sidebar menu  -->
                        <div class="list-group list-group-messages">
                            <a href="<?php echo base_url('Email') ?>" class="list-group-item <?php echo ((!isset($sentMail)) && (!isset($draftMail)) && (!isset($starredMail)) && (!isset($trashMail)) && (!isset($product)) && (!isset($work)) && (!isset($misc)) && (!isset($family)) && (!isset($design))) ? 'active' : ''; ?>" id="inbox-menu">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-mail"></i>
                                </div>
                                Inbox
                                <span class="badge badge-success badge-pill badge-round float-right"><?php echo $count_unread_msg; ?></span>
                            </a>
                            <a href="<?php echo base_url('Email?sentMail=' . 1 . '') ?>" class="list-group-item <?php echo isset($sentMail) ? 'active' : ''; ?>">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-play"></i>
                                </div>
                                Sent
                            </a>
                            <a href="<?php echo base_url('Email?draftMail=' . 1 . '') ?>" class="list-group-item <?php echo isset($draftMail) ? 'active' : ''; ?>">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-edit-1"></i>
                                </div> Draft
                            </a>
                            <a href="<?php echo base_url('Email?starredMail=' . 1 . '') ?>" class="list-group-item <?php echo isset($starredMail) ? 'active' : ''; ?>">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-star"></i>
                                </div>
                                Starred
                            </a>
                            <!--
                            <a href="#" class="list-group-item">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-info"></i>
                                </div>
                                Spam
                                <span class="badge badge-warning badge-pill badge-round float-right">3</span>
                            </a>
                            -->
                            <a href="<?php echo base_url('Email?trashMail=' . 1 . '') ?>" class="list-group-item <?php echo isset($trashMail) ? 'active' : ''; ?>">
                                <div class="d-inline mr-25">
                                    <i class="feather icon-trash-2"></i>
                                </div>
                                Trash
                            </a>
                        </div>
                        <!-- sidebar menu  end-->

                        <!-- sidebar label start -->
                        <label class="sidebar-label">Labels</label>
                        <div class="list-group list-group-labels ">
                            <a href="<?php echo base_url('Email?product=Product'); ?>" class="list-group-item d-flex justify-content-between align-items-center <?php echo isset($product) ? 'active' : ''; ?>">
                                Product
                                <span class="bullet bullet-success bullet-sm"></span>
                            </a>
                            <a href="<?php echo base_url('Email?work=Work'); ?>" class="list-group-item d-flex justify-content-between align-items-center <?php echo isset($work) ? 'active' : ''; ?>">
                                Work
                                <span class="bullet bullet-primary bullet-sm"></span>
                            </a>
                            <a href="<?php echo base_url('Email?misc=Misc'); ?>" class="list-group-item d-flex justify-content-between align-items-center <?php echo isset($misc) ? 'active' : ''; ?>">
                                Misc
                                <span class="bullet bullet-warning bullet-sm"></span>
                            </a>
                            <a href="<?php echo base_url('Email?family=Family'); ?>" class="list-group-item d-flex justify-content-between align-items-center <?php echo isset($family) ? 'active' : ''; ?>">
                                Family
                                <span class="bullet bullet-danger bullet-sm"></span>
                            </a>
                            <a href="<?php echo base_url('Email?design=Design'); ?>" class="list-group-item d-flex justify-content-between align-items-center <?php echo isset($design) ? 'active' : ''; ?>">
                                Design
                                <span class="bullet bullet-info bullet-sm"></span>
                            </a>
                        </div>
                        <!-- sidebar label end -->
                    </div>
                </div>
            </div>
            <!-- User new mail right area -->
            <div class="compose-new-mail-sidebar">
                <div class="card mb-0 shadow-none quill-wrapper p-0">
                    <div class="card-header">
                        <h3 class="card-title" id="emailCompose">New Message</h3>
                        <button type="button" class="close close-icon">
                            <i class="feather icon-x"></i>
                        </button>
                    </div>
                    <!-- form start -->
                    <form action="" method="POST" id="compose_form">
                        <input type="hidden" id="session_id" name="session_id" value="<?php echo (isset($session_id)) ? $session_id : ''; ?>">
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="form-group pb-50">
                                    <label for="emailfrom">from</label>
                                    <input type="email" value="<?php echo (isset($from_email)) ? $from_email : ''; ?>" id="from_email" name="from_email" class="form-control" placeholder="From" readonly>
                                </div>
                                <div class="form-label-group mb-1">
                                    <?php if (isset($session_name) && $session_name == 'Admin') { ?>
                                        <div class="form-group has-success">
                                            <select class="form-control custom-select" id="lables" name="lables">
                                                <option value="Product" selected>Product</option>
                                                <option value="Work">Work</option>
                                                <option value="Misc">Misc</option>
                                                <option value="Family">Family</option>
                                                <option value="Design">Design</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-label-group mb-1">
                                    <input type="email" name="to_email" value="" id="to_email" class="form-control" placeholder="To" required>
                                </div>
                                <div class="form-label-group mb-1">
                                    <input type="text" name="subject" value="" id="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="form-label-group mb-1">
                                    <input type="text" name="emailCC" value="" id="emailCC" class="form-control" placeholder="CC">
                                </div>
                                <div class="form-label-group mb-1">
                                    <input type="text" name="emailBCC" value="" id="emailBCC" class="form-control" placeholder="BCC">
                                </div>
                                <!-- Compose mail Quill editor -->
                                <div class="snow-container border rounded p-50">
                                    <div class="compose-editor mx-75"></div>
                                    <div class="d-flex justify-content-end">
                                        <div class="compose-quill-toolbar pb-0">
                                            <span class="ql-formats mr-0">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="custom-file">
                                        <input type="file" name="attachment" id="attachment">
                                        <label class="custom-file-label" for="attachment">Attach file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 d-flex justify-content-end pt-0">
                            <button type="button" class="btn btn-danger cancel-btn mr-1" id="save_draft">
                                <i class='feather icon-x mr-25'></i>
                                <span class="d-sm-inline d-none">Draft</span>
                            </button>
                            <button type="reset" class="btn btn-secondary cancel-btn mr-1">
                                <i class='feather icon-x mr-25'></i>
                                <span class="d-sm-inline d-none">Cancel</span>
                            </button>
                            <button type="submit" class="btn-send btn btn-success btn-glow">
                                <i class='feather icon-play mr-25'></i> <span class="d-sm-inline d-none">Send</span>
                            </button>                                                     
                        </div>
                    </form>
                    <!-- form start end-->
                </div>
            </div>
            <!--/ User Chat profile right area -->
        </div>
    </div>
    <div class="content-right">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- email app overlay -->
                <div class="app-content-overlay"></div>
                <div class="email-app-area">
                    <!-- Email list Area -->
                    <div class="email-app-list-wrapper">
                        <div class="email-app-list">
                            <div class="email-action">
                                <!-- action left start here -->
                                <div class="action-left d-flex align-items-center">
                                    <!-- select All checkbox -->
                                    <div class="custom-control custom-checkbox selectAll mr-50">
                                        <input type="checkbox" class="custom-control-input" id="checkboxsmall" value="-1">
                                        <label class="custom-control-label" for="checkboxsmall"></label>
                                    </div>
                                    <!-- delete unread dropdown -->
                                    <ul class="list-inline m-0 d-flex">
                                        <li class="list-inline-item mail-delete">
                                            <button type="button" class="btn btn-icon action-icon">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </li>
                                        <li class="list-inline-item mail-unread">
                                            <button type="button" class="btn btn-icon action-icon">
                                                <i class="feather icon-mail"></i>
                                            </button>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button type="button" class="dropdown-toggle btn btn-icon action-icon" id="folder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-folder mr-0"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                                                    <a class="dropdown-item" href="#"><i class="feather icon-edit"></i> Draft</a>
                                                    <a class="dropdown-item" href="#"><i class="feather icon-info"></i>Spam</a>
                                                    <a class="dropdown-item" href="#"><i class="feather icon-trash-2"></i>Trash</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-icon dropdown-toggle action-icon" id="tag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-tag mr-0"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                                                    <a href="#" class="dropdown-item align-items-center">
                                                        <span class="bullet bullet-success bullet-sm"></span>
                                                        <span>Product</span>
                                                    </a>
                                                    <a href="#" class="dropdown-item align-items-center">
                                                        <span class="bullet bullet-primary bullet-sm"></span>
                                                        <span>Work</span>
                                                    </a>
                                                    <a href="#" class="dropdown-item align-items-center">
                                                        <span class="bullet bullet-warning bullet-sm"></span>
                                                        <span>Misc</span>
                                                    </a>
                                                    <a href="#" class="dropdown-item align-items-center">
                                                        <span class="bullet bullet-danger bullet-sm"></span>
                                                        <span>Family</span>
                                                    </a>
                                                    <a href="#" class="dropdown-item align-items-center">
                                                        <span class="bullet bullet-info bullet-sm"></span>
                                                        <span> Design</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- action left end here -->

                                <!-- action right start here -->
                                <div class="action-right d-flex flex-grow-1 align-items-center justify-content-around">
                                    <!-- search bar  -->
                                    <div class="email-fixed-search flex-grow-1">
                                        <div class="sidebar-toggle d-block d-lg-none">
                                            <i class="feather icon-menu"></i>
                                        </div>
                                        <fieldset class="form-group position-relative has-icon-left m-0">
                                            <input type="text" class="form-control" id="email-search" placeholder="Search email">
                                            <div class="form-control-position">
                                                <i class="feather icon-search"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- pagination and page count -->
                                    <!--<span class="d-none d-sm-block">1-10 of 653</span>
                                    <button class="btn btn-icon email-pagination-prev d-none d-sm-block">
                                        <i class="feather icon-chevron-left"></i>
                                    </button>
                                    <button class="btn btn-icon email-pagination-next d-none d-sm-block">
                                        <i class="feather icon-chevron-right"></i>
                                    </button>-->
                                </div>
                            </div>
                            <!-- / action right -->

                            <!-- email user list start -->
                            <div class="email-user-list list-group">
                                <ul class="users-list-wrapper media-list">
                                    <?php if (isset($inboxData)) {
                                        foreach ($inboxData->result() as $row) { ?>
                                            <li class="media <?php echo ($row->status == 'read') ? '' : 'mail-read'; ?>" id="<?php echo $row->id; ?>">
                                                <div class="user-action">
                                                    <div class="checkbox-con chb">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="checkboxsmall<?php echo $row->id; ?>">
                                                            <label class="custom-control-label" for="checkboxsmall<?php echo $row->id; ?>"></label>
                                                        </div>
                                                    </div>
                                                    <span class="favorite <?php echo ($row->starred == 0) ? '' : 'warning'; ?>">
                                                        <i class="feather icon-star <?php echo ($row->starred == 0) ? 'bx-star' : 'bxs-star'; ?>"></i>
                                                    </span>
                                                </div>
                                                <div class="pr-50">
                                                    <div class="avatar">
                                                        <img src="<?php echo base_url(); ?>axxets/stack/images/portrait/small/avatar-s-20.png" alt="avtar img holder">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="user-details">
                                                        <div class="mail-items">
                                                            <span class="list-group-item-text text-truncate"><?php echo $row->session_name; ?></span>
                                                        </div>
                                                        <div class="mail-meta-item">
                                                            <span class="float-right">
                                                                <span class="mail-date"><?php echo $row->date; ?></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="mail-message">
                                                        <p class="list-group-item-text truncate mb-0">
                                                            <?php echo word_limiter(htmlentities($row->subject), 25); ?>
                                                        </p>
                                                        <div class="mail-meta-item">
                                                            <span class="float-right d-flex align-items-center">
                                                                <?php if (isset($row->attachment)) { ?><i class="feather icon-paperclip mr-50"></i><?php } ?>
                                                                <?php if ($row->lables == 'Product') { ?>
                                                                    <span class="badge badge-success">Product</span>
                                                                <?php } else if ($row->lables == 'Work') { ?>
                                                                    <span class="badge badge-primary">Work</span>
                                                                <?php } else if ($row->lables == 'Misc') { ?>
                                                                    <span class="badge badge-warning blue-grey-text text-darken-4">Misc</span>
                                                                <?php } else if ($row->lables == 'Family') { ?>
                                                                    <span class="badge badge-danger">Family</span>
                                                                <?php } else if ($row->lables == 'Design') { ?>
                                                                    <span class="badge badge-info">Design</span>
                                                                <?php } ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                                <!-- email user list end -->

                                <!-- no result when nothing to show on list -->
                                <div class="no-results">
                                    <i class="feather icon-info font-large-2"></i>
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Email list Area -->

                    <!-- Detailed Email View -->
                    <div class="email-app-details">
                        <!-- email detail view header -->
                        <div class="email-detail-header">
                            <div class="email-header-left d-flex align-items-center mb-1">
                                <span class="go-back mr-50">
                                    <i class="feather icon-chevron-left font-medium-4 align-middle"></i>
                                </span>
                                <h5 class="email-detail-title font-weight-normal mb-0" id="title">
                                    Advertising Internet Online
                                </h5>
                                <span class="badge badge-light-danger badge-pill ml-1" id="label_name">PRODUCT</span>
                            </div>
                            <div class="email-header-right mb-1 ml-2 pl-1">
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <button class="btn btn-icon action-icon" id="trash">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-icon action-icon">
                                            <i class="feather icon-mail"></i>
                                        </button>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn btn-icon dropdown-toggle action-icon" id="open-mail-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-folder mr-0"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="open-mail-menu">
                                                <a class="dropdown-item" href="#"><i class="feather icon-edit"></i> Draft</a>
                                                <a class="dropdown-item" href="#"><i class="feather icon-trash-2"></i> Trash</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn btn-icon dropdown-toggle action-icon" id="open-mail-tag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-tag mr-0"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="open-mail-tag">
                                                <a href="#" class="dropdown-item align-items-center">
                                                    <span class="bullet bullet-success bullet-sm"></span>
                                                    Product
                                                </a>
                                                <a href="#" class="dropdown-item align-items-center">
                                                    <span class="bullet bullet-primary bullet-sm"></span>
                                                    Work
                                                </a>
                                                <a href="#" class="dropdown-item align-items-center">
                                                    <span class="bullet bullet-warning bullet-sm"></span>
                                                    Misc
                                                </a>
                                                <a href="#" class="dropdown-item align-items-center">
                                                    <span class="bullet bullet-danger bullet-sm"></span>
                                                    Family
                                                </a>
                                                <a href="#" class="dropdown-item align-items-center">
                                                    <span class="bullet bullet-info bullet-sm"></span>
                                                    Design
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!--
                                    <li class="list-inline-item">
                                        <span class="no-of-list d-none d-sm-block ml-1">1-10 of 653</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-icon email-pagination-prev action-icon">
                                            <i class='feather icon-chevron-left'></i>
                                        </button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-icon email-pagination-next action-icon">
                                            <i class='feather icon-chevron-right'></i>
                                        </button>
                                    </li>
                                    -->
                                </ul>
                            </div>
                        </div>
                        <!-- email detail view header end-->
                        <div class="email-scroll-area">
                            <!-- email details  -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="collapsible email-detail-head">
                                        <div class="card collapse-header open" role="tablist">
                                            <div id="headingCollapse7" class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse" role="tab" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                                <div class="collapse-title media">
                                                    <div class="pr-1">
                                                        <div class="avatar mr-75">
                                                            <img src="<?php echo base_url(); ?>axxets/stack/images/portrait/small/avatar-s-18.png" alt="avtar img holder" width="30" height="30">
                                                        </div>
                                                    </div>
                                                    <div class="media-body mt-25">
                                                        <span class="text-primary" id="sender_name"></span>
                                                        <span class="d-sm-inline d-none" id="recive_from"></span>
                                                        <small class="text-muted d-block" id="receiver_mail"></small>
                                                        Subject: <span class="text-danger" id="sender_subject"></span>
                                                    </div>
                                                </div>
                                                <div class="information d-sm-flex d-none align-items-center">
                                                    <small class="text-muted mr-50" id="receive_time"></small>
                                                    <span class="favorite warning">
                                                        <i class="feather icon-star mr-25"></i>
                                                    </span>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" id="third-open-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class='feather icon-more-vertical mr-0'></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="second-open-submenu">
                                                            <a href="#" class="dropdown-item mail-reply">
                                                                <i class='feather icon-share-2'></i>
                                                                Reply
                                                            </a>
                                                            <a href="#" class="dropdown-item forward">
                                                                <i class='feather icon-corner-up-right'></i>
                                                                Forward
                                                            </a>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse7" role="tabpanel" class="collapse show">
                                                <div class="card-content">
                                                    <div class="card-body py-1" id="sender_msg">

                                                    </div>
                                                    <div class="card-footer pt-0 border-top">
                                                        <label class="sidebar-label">Attached Files</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="cursor-pointer pb-25">
                                                                <div class="sender_attachments">
                                                                    <a href=""><small class="text-muted ml-1 attchement-text"></small></a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="btn btn-success btn-sm d-none" id="draft_send">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- email details  end-->
                            <!-- reply form start-->
                            <form action="" method="POST" id="reply_form">
                                <input type="hidden" id="session_id" name="session_id" value="<?php echo (isset($session_id)) ? $session_id : ''; ?>">
                                <input type="hidden" value="<?php echo (isset($from_email)) ? $from_email : ''; ?>" id="from_email" name="from_email" class="form-control" placeholder="From">
                                <div class="row px-2">
                                    <div class="col-6 px-0">
                                        <div class="form-group">
                                            <input type="text" value="" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                                        </div>
                                    </div>
                                    <div class="col-6 px-0">
                                        <div class="form-group">
                                            <?php if (isset($session_name) && $session_name == 'Admin') { ?>
                                                <div class="form-group has-success">
                                                    <select class="form-control custom-select" id="lables" name="lables" required>
                                                        <option value="Product" selected>Product</option>
                                                        <option value="Work">Work</option>
                                                        <option value="Misc">Misc</option>
                                                        <option value="Family">Family</option>
                                                        <option value="Design">Design</option>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-2 mb-4">
                                    <!-- quill editor for reply message -->
                                    <div class="col-12 px-0">
                                        <div class="card shadow-none border rounded">
                                            <div class="card-body quill-wrapper">
                                                Reply to <span id="reply_to"></span>
                                                <div class="snow-container" id="detail-view-quill">
                                                    <div class="detail-view-editor"></div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="detail-quill-toolbar">
                                                            <span class="ql-formats mr-50">
                                                                <button class="ql-bold"></button>
                                                                <button class="ql-italic"></button>
                                                                <button class="ql-underline"></button>
                                                                <button class="ql-link"></button>
                                                                <button class="ql-image"></button>
                                                            </span>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary send-btn">
                                                            <i class='feather icon-play mr-25'></i>
                                                            <span class="d-none d-sm-inline"> Send</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- reply form end-->
                        </div>
                    </div>
                    <!--/ Detailed Email View -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->