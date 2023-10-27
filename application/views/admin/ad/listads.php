<?php

?>
<div class="container-fluid">
    <form action="<?php echo base_url('ads/ads_manage_new'); ?>" method="POST">
        <div class="row">
            <div class="col-sm-3">
                <select class="form-control" id="search_ads_type" name="search_ads_type">
                    <option value="">Choose Ads Type</option>
                    <?php foreach ($ads_types->result() as $row) { ?>
                        <option value="<?php echo $row->type; ?>"><?php echo $row->type; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" id="search_ads_sub_type" name="search_ads_sub_type">
                    <option value="">Choose sub type</option>
                </select>
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-success">search</button>
            </div>
            <div class="col-sm-2">
                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg pull-right"><i class="fa fa-bullhorn"></i>
                    Create Ad
                </a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Created By</th>
                        <th>Title</th>
                        <th>Expiry Date</th>
                        <th>Type</th>
                        <th>URL</th>
                        <th>Country</th>
                        <th>Point</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $sn = 1;
                    foreach ($ads_new as $e) { ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $e->created_by; ?></td>
                            <td><?php echo $e->ads_title; ?></td>
                            <td><?php echo $e->ads_expiry_date; ?></td>
                            <td><?php echo $e->ads_type; ?></td>
                            <td><?php echo $e->ads_url; ?></td>
                            <td><?php echo $e->ads_country; ?></td>
                            <td><?php echo $e->ads_point; ?></td>
                            <td><?php echo $e->ads_duration; ?></td>
                            <td>
                                <a target="_blank" href="<?php echo site_url('ads/ads_preview_new/' . $e->id); ?>" class="btn btn-info btn-sm">Preview</a>
                                <a href="<?php echo site_url('ads/ads_edit_new/' . $e->id); ?>" class="btn btn-danger btn-sm">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this Ad ?')" href="<?php echo site_url('ads/ads_remove_new/' . $e->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create a New Ad</h4>
                    </div>
                    <div class="modal-body">
                    <form id="create_ads" action="" method="POST">
                            <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">

                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_title">Ads Title</label><span style="color:red">*</span>
                                <input type="text" name="ads_title" class="form-control" id="ads_title" placeholder="Enter Ad Title">
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_description">Ads Description</label><span style="color:red">*</span>
                                <input type="text" name="ads_description" class="form-control" id="ads_description" placeholder="Enter Ads Description">
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_expiry_date">Ads Expiry Date</label><span style="color:red">*</span>
                                <input type="date" name="ads_expiry_date" class="form-control" id="ads_expiry_date" <?php echo $ads_days->ads_set_admin == 1 ? '' : 'readonly'; ?>>
                                <input type="hidden" name="ads_days" id="ads_days" value="<?php echo $ads_days->ads_value; ?>">
                                <input type="hidden" name="ads_set_admin" id="ads_set_admin" value="<?php echo $ads_days->ads_set_admin; ?>">
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_type">Ads Type</label><span style="color:red">*</span>
                                <select class="form-control" id="ads_type" name="ads_type">
                                    <option value="">Choose...</option>
                                    <?php foreach ($ads_types->result() as $row) { ?>
                                        <option value="<?php echo $row->type; ?>"><?php echo $row->type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_sub_type">Ads sub-types</label><span style="color:red">*</span>
                                <select class="form-control" id="ads_sub_type" name="ads_sub_type">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_url">URL</label><span style="color:red">*</span>
                                <input type="url" name="ads_url" class="form-control" id="ads_url" placeholder="Enter Ad URL">
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_country">Country</label><span style="color:red">*</span>
                                <select class="form-control" id="ads_country" name="ads_country">
                                </select>
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_state">Which State to show Ads</label><span style="color:red">*</span>
                                <select class="form-control" id="ads_state" name="ads_state">
                                    <option value="all_states">All States</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_point">Earning Points for watching Ads</label><span style="color:red">*</span>
                                <input type="number" name="ads_point" class="form-control" id="ads_point" placeholder="Enter Ads Earning">
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_duration">How long Ad should be shown</label><span style="color:red">*</span>
                                <input type="number" min="1" max="<?php echo $ads_timer->ads_set_admin == 1 ? $ads_timer->ads_value : '30'; ?>" id="ads_duration" name="ads_duration" class="form-control" placeholder="Enter Ad Time in sec" value="<?php echo $ads_timer->ads_set_admin == 1 ? $ads_timer->ads_value : '30'; ?>" <?php echo $ads_timer->ads_set_admin == 1 ? '' : 'readonly'; ?>>
                            </div>
                            <div class="form-group col-sm-6 text-left">
                                <label for="ads_stop_showing">Stop showing Ad after?</label><span style="color:red">*</span>
                                <select class="form-control" id="ads_stop_showing" name="ads_stop_showing">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 text-left views" hidden>
                                <label for="ads_views">After How many views?</label><span style="color:red">*</span>
                                <input type="number" name="ads_views" class="form-control" id="ads_views" value="" placeholder="Enter Ads Views">
                            </div>
                            <div class="form-group col-sm-12 text-left"></div>
                            <div class="card-footer pull-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("advtincome").classList.add('active');
        document.querySelector("#advtincome > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>


<script src="<?php echo base_url('axxets/base/js/countries.js'); ?>"></script>


<script language="javascript">
    populateCountries("ads_country", "ads_state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
</script>

<script>
    $(document).ready(function() {

        var ads_set_admin = $('#ads_set_admin').val();
        if (ads_set_admin == 0) {
            var ads_days = parseInt($('#ads_days').val());
            var date = new Date();
            date.setDate(date.getDate() + ads_days);
            var dd = date.getDate();
            var mm = date.getMonth() + 1;
            var yyyy = date.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            date = yyyy + '-' + mm + '-' + dd;
            $('#ads_expiry_date').val(date);
            //document.getElementById("ads_expiry_date").setAttribute("value", date);
        }

        $('#ads_expiry_date').change(function(e) {
            e.preventDefault();
            var ads_set_admin = $('#ads_set_admin').val();
            var dateString = $('#ads_expiry_date').val();
            var ads_expiry_date = new Date(dateString);
            var today = new Date();
            var ads_days = $('#ads_days').val();
            var Difference_In_Days = parseInt((ads_expiry_date - today) / (1000 * 3600 * 24));
            //console.log(Difference_In_Days);

            if (ads_set_admin > 0) {
                if (ads_days > Difference_In_Days) {
                    $('#button').removeAttr('disabled');
                } else {
                    alert('Expiry Date should be less than ' + ads_days + ' days from todays!');
                    $('#button').attr('disabled', 'disabled');
                }
            }
        });

        $('#ads_stop_showing').change(function(e) {
            e.preventDefault();
            var ads_stop_showing = $('#ads_stop_showing').val();
            if (ads_stop_showing == 'yes') {
                $('.views').show();
                $('#ads_views').attr('required', 'required');
            } else {
                $('.views').hide();
                $('#ads_views').removeAttr('required');
                //$('#ads_stop_showing').val(null);
            }
        });

        $('#create_ads').validate({
            rules: {
                ads_title: {
                    required: true
                },
                ads_description: {
                    required: true
                },
                ads_expiry_date: {
                    required: true
                },
                ads_type: {
                    required: true
                },
                ads_url: {
                    required: true,
                    url: true
                },
                ads_point: {
                    required: true
                },
                ads_duration: {
                    required: true
                },
                ads_stop_showing: {
                    required: true
                }
            },
            messages: {
                ads_title: {
                    required: "Please enter a ad title"
                },
                ads_description: {
                    required: "Please provide a ads description"
                },
                ads_expiry_date: {
                    required: "Please enter a ad expiry date"
                },
                ads_type: {
                    required: "Please provide a ads type"
                },
                ads_url: {
                    required: "Please provide a url",
                    url: "Please provide a valid url"
                },
                ads_point: {
                    required: "Please provide a ads earnings"
                },
                ads_duration: {
                    required: "Please provide a ads timeout"
                },
                ads_stop_showing: {
                    required: "Please provide a ads showing"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#search_ads_type').change(function(e) {
            e.preventDefault();
            let search_ads_type = $('#search_ads_type').val();
            if (search_ads_type) {
                $.ajax({
                    type: "POST",
                    url: base_url + "ads/get_ads_sub_types",
                    data: {
                        "ads_type": search_ads_type
                    },
                    success: function(res) {
                        $("#search_ads_sub_type option").remove();
                        $.each(res.split(', '), function(key, value) {
                            $('#search_ads_sub_type').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $("#search_ads_sub_type option").remove();
                $('#search_ads_sub_type').append('<option value="">Choose sub type</option>');
            }
        });

        $('#ads_type').change(function(e) {
            e.preventDefault();
            let ads_type = $('#ads_type').val();
            if (ads_type) {
                $.ajax({
                    type: "POST",
                    url: base_url + "ads/get_ads_sub_types",
                    data: {
                        "ads_type": ads_type
                    },
                    success: function(res) {
                        $("#ads_sub_type option").remove();
                        $.each(res.split(', '), function(key, value) {
                            $('#ads_sub_type').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $("#ads_sub_type option").remove();
                $('#ads_sub_type').append('<option value="">Choose...</option>');
            }
        });

        $('#create_ads').submit(function(e) {
            e.preventDefault();
            let form = $('#create_ads').serialize();
            if ($('#create_ads').valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "ads/ads_create_new",
                    data: $('#create_ads').serialize(),
                    success: function(res) {
                        if (res == 0) {
                            console.log(res);
                        } else if (res == 1) {
                            console.log(res);
                        }
                        location.reload();
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            }
        });
    });
</script>