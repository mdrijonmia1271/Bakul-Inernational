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
                    <h1 class="pull-left">Event List</h1>
                </div>
            </div>

            <div class="panel-body none">
                <?php echo form_open(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerFrom">
                            <input type="text" name="dateFrom" class="form-control" placeholder="Date From">
                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group date" id="datetimepickerTo">
                            <input type="text" name="dateTo" class="form-control" placeholder="Date To">
                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <input type="submit" name="show" value="Search" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <hr style="margin: 0px;" class="none">


            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="20">SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th width="115" class="text-center">Action</th>
                    </tr>

                    <?php if (!empty($results)) {
                        foreach ($results as $key => $row) {
                            $startTime = (!empty($row->start_time) ? date('h:i A', strtotime($row->start_time)) : 'N/A');
                            $endTime   = (!empty($row->end_time) ? date('h:i A', strtotime($row->end_time)) : 'N/A');
                            ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                    <?php
                                    if (!empty($row->url)) {
                                        echo '<a target="_blank" href="'. $row->url .'"> '. $row->title .' </a>';
                                    } else {
                                        echo $row->title;
                                    } ?>
                                </td>
                                <td><?php echo $row->description; ?></td>
                                <td>Start: <?php echo $row->start_date; ?> <br> End: <?php echo $row->end_date; ?></td>
                                <td>Start: <?php echo $startTime; ?> <br> End: <?php echo $endTime; ?></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <a title="Edit" class="btn btn-warning btn-sm"
                                       href="<?php echo site_url('calendar/edit/' . $row->id); ?>">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-danger btn-sm"
                                       href="<?php echo site_url('calendar/delete/' . $row->id); ?>"
                                       onclick="return confirm('Do you want to delete this data?')">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <th colspan="6" class="text-center">No records found....!</th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Event</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">Title <span class="req">*</span></label>
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Description <span class="req">*</span></label>
                    <div class="col-md-8">
                        <textarea name="description" rows="2" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerFrom">
                                    <input type="text" name="dateFrom" class="form-control" placeholder="Start Date"
                                           required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerTo">
                                    <input type="text" name="dateTo" class="form-control" placeholder="End Date">
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
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerFromTime">
                                    <input type="text" name="timeFrom" class="form-control" placeholder="Start Time">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerToTime">
                                    <input type="text" name="timeTo" class="form-control" placeholder="End Time">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group control-label">
                    <label class="col-md-3">Url <span class="req">&nbsp;</span></label>
                    <div class="col-md-8">
                        <input type="text" name="url" class="form-control">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
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