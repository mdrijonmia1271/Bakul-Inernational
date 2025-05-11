<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <a href="<?php echo site_url('calendar'); ?>" class="btn btn-default" id="showCalendar">
            Calendar
        </a>

        <a href="<?php echo site_url('calendar/event_list'); ?>" class="btn btn-default" id="eventList">
            Event List
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left">Edit Event</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                echo form_open('calendar/update', ['class' => 'form-horizontal']);

                $startTime = (!empty($info->start_time) ? date('h:i A', strtotime($info->start_time)) : '');
                $endTime   = (!empty($info->end_time) ? date('h:i A', strtotime($info->end_time)) : '');
                ?>

                <input type="hidden" name="id" value="<?php echo $info->id; ?>">
                
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Title <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="title" value="<?php echo $info->title; ?>" class="form-control" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Description <span class="req">*</span></label>
                    <div class="col-md-5">
                        <textarea name="description" rows="2" class="form-control" required> <?php echo $info->description; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerFrom">
                                    <input type="text" name="start_date" class="form-control" value="<?php echo $info->start_date; ?>" placeholder="Start Date" required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerTo">
                                    <input type="text" name="end_date" class="form-control" value="<?php echo $info->end_date; ?>" placeholder="End Date">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Time <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerFromTime">
                                    <input type="text" name="start_time" class="form-control" value="<?php echo $startTime; ?>" placeholder="Start Time">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerToTime">
                                    <input type="text" name="end_time" class="form-control" value="<?php echo $endTime; ?>" placeholder="End Time">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Url <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <input type="text" name="url" value="<?php echo $info->url; ?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-8 text-right">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepickerFromTime').datetimepicker({
        format: 'LT',
        useCurrent: false
    });
    $('#datetimepickerToTime').datetimepicker({
        format: 'LT',
        useCurrent: false
    });
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerFrom").on("dp.change", function (e) {
        $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerTo").on("dp.change", function (e) {
        $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>