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
                    <h1 class="pull-left">Calendar</h1>
                    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#addEventModal">Add
                        Event
                    </button>
                </div>
            </div>
            <div class="panel-body">

                <div id='calendar'></div>

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
            <?php echo form_open('calendar/store', ['class' => 'form-horizontal']); ?>
            <div class="modal-body">

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
                                    <input type="text" name="start_date" class="form-control" placeholder="Start Date" required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerTo">
                                    <input type="text" name="end_date" class="form-control" placeholder="End Date">
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
                                    <input type="text" name="start_time" class="form-control" placeholder="Start Time">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group date" id="datetimepickerToTime">
                                    <input type="text" name="end_time" class="form-control" placeholder="End Time">
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="save" value="Save" class="btn btn-primary">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo site_url("private/plugins/fullcalendar/main.min.css"); ?>">
<script src="<?php echo site_url("private/plugins/fullcalendar/main.min.js"); ?>"></script>
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

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialView: 'dayGridMonth',
            events: '<?php echo site_url("calendar/allEvent")?>'
        });

        calendar.render();

        /*[
            {
                title: 'All Day Event',
                description: 'description for All Day Event',
                start: '2021-03-01'
            },
            {
                title: 'Long Event',
                description: 'description for Long Event',
                start: '2021-03-07',
                end: '2021-03-10'
            },
            {
                title: 'Repeating Event',
                description: 'description for Repeating Event',
                start: '2021-03-09T16:00:00'
            },
            {
                title: 'Repeating Event',
                description: 'description for Repeating Event',
                start: '2021-03-16T16:00:00'
            },
            {
                title: 'Conference',
                description: 'description for Conference',
                start: '2021-03-11',
                end: '2021-03-13'
            },
            {
                title: 'Meeting',
                description: 'description for Meeting',
                start: '2021-03-12T10:30:00',
                end: '2021-03-12T12:30:00'
            },
            {
                title: 'Lunch',
                description: 'description for Lunch',
                start: '2021-03-12T12:00:00'
            },
            {
                title: 'Meeting',
                description: 'description for Meeting',
                start: '2021-03-12T14:30:00'
            },
            {
                title: 'Birthday Party',
                description: 'description for Birthday Party',
                start: '2021-03-13T07:00:00'
            },
            {
                title: 'Click for Google',
                description: 'description for Click for Google',
                url: 'http://google.com/',
                start: '2021-03-28'
            }
        ]*/
    });
</script>

<style>
    .fc-scrollgrid tr td a {
        color: #000000 !important;
    }

    .fc-button-group .fc-button, .fc-toolbar-chunk .fc-button {
        text-transform: capitalize;
    }

    .fc-toolbar-chunk .fc-button-group {
        border-top-left-radius: 0;
        border-bottom-left-radius;
    }
</style>
