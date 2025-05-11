<style>
    .table2 tr td input {
        border: 1px solid transparent;
    }

    .new-row-1 .col-md-4 {
        margin-bottom: 8px;
    }

    .red,
    .red:focus {
        border-color: red;
    }

    .green,
    .green:focus {
        border-color: green;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->session->flashdata("confirmation"); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Invoice</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php echo form_open('replace/replace/update', ['class' => 'form-horizontal']); ?>

                <div class="row new-row-1">
                    <div class="col-md-2">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" value="<?php echo $voucherInfo->created_at; ?>" class="form-control"
                                   placeholder="Date" <?php echo (checkAuth('user') ? 'readonly' : ''); ?> required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="voucher_no" value="<?php echo $voucherInfo->voucher_no; ?>" class="form-control" readonly>
                        <input type="hidden" name="party_type" value="<?php echo $voucherInfo->party_type; ?>">
                    </div>

                    <div class="col-md-3">
                        <input type="text" value="<?php echo $voucherInfo->name; ?>" class="form-control" readonly>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table2">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Product Name</th>
                        <th>Model</th>
                        <th>Particular</th>
                        <th width="150">Qty</th>
                    </tr>

                    <?php
                        $totalQuantity = 0;
                    if (!empty($voucherItems)){
                        foreach ($voucherItems as $key => $row) {
                            $totalQuantity += $row->quantity;
                            ?>
                            <input type="hidden" name="item_id[]" value="<?php echo $row->id; ?>">
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo filter($row->product_cat); ?></td>
                                <td><?php echo filter($row->product_model); ?></td>
                                <td style="padding: 0px;">
                                    <input type="text" name="particular[]" value="<?php echo $row->particular; ?>" class="form-control">
                                </td>
                                <td style="padding: 0px;">
                                    <input type="number" name="quantity[]" value="<?php echo $row->quantity; ?>" class="form-control" step="any">
                                </td>
                            </tr>
                        <?php }
                    } ?>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th><?php echo $totalQuantity; ?></th>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-offset-6 col-md-6">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="" class="control-label">Remarks</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="remarks" rows="2" class="form-control" placeholder="Remarks...."><?php echo $voucherInfo->remarks; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="" class="control-label">Status</label>
                            </div>
                            <div class="col-md-8">
                                <select name="status" class="form-control" required>
                                    <option value="complete" <?php echo ($voucherInfo->status == 'complete' ? 'selected' : ''); ?>>Complete</option>
                                    <option value="pending" <?php echo ($voucherInfo->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="" class="control-label">Delivery Date</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" name="delivery_date" value="<?php echo $voucherInfo->delivery_date; ?>" class="form-control" placeholder="YYYY-MM-DD">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </div>
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
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });
</script>