<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/>
<style>
<style>
.mrgb-15{margin-bottom: 15px;}
</style>

<div class="container-fluid" ng-controller = "EditClientCtrl" ng-cloak>
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Customer</h1>
                </div>
            </div>
            
            <div class="panel-body">
                <?php
                
                $attr = array("class"=>"form-horizontal");
                echo form_open_multipart('client/client/edit?partyCode=' . $this->input->get("partyCode"), $attr);
                ?>
                    
                    <div class="row">
                        <div class="col-md-offset-3 col-md-3">
                            <img style="width: 150px; margin: 10px; padding: 5px; border: 1px solid #ccc;" src="<?php echo site_url($info[0]->path); ?>">
                        </div>
                    
                    </div>
                    <br>
                    
                    <div class="form-group" ng-init="partyCode = '<?php echo $info[0]->code; ?>'" ng-model="partyCode">
                        <label class="col-md-3 control-label">Code <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <input type="hidden" name="client_code" class="form-control" value="<?php echo $_GET['partyCode']; ?>">
                            <input type="text" name="code" class="form-control" value="<?php echo $info[0]->code; ?>" readonly>
                            <input type="hidden" name="godown_code" class="form-control" value="<?php echo $info[0]->godown_code; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Customer Type<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <select name="customer_type" class="form-control" >
                                <option value="dealer" <?php  if($info[0]->customer_type == 'dealer'){ echo 'Selected'; } ?> >Dealer</option>
                                <option value="sub_dealer"  <?php  if($info[0]->customer_type == 'sub_dealer'){ echo 'Selected'; } ?>>Sub Dealer</option>
                                <option value="user"  <?php  if($info[0]->customer_type == 'user'){ echo 'Selected'; } ?>>User</option>
                            </select>
                        </div>
                    </div>
                    
                    <?php if($info[0]->customer_type=='sub_dealer'){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Dealer<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <select name="reference_dealer" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                                <?php if($dealers) foreach($dealers as $key=>$value){ ?>
                                 <option value="<?php echo $value->name; ?>" <?php echo (strtolower($value->name) == strtolower($info[0]->reference_dealer) ? 'selected' : '')?> ><?php echo $value->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
         <!--           <?php if($info[0]->customer_type == 'dealer'){ ?>
                    <div class="form-group hide_column2">
                        <label class="col-md-3 control-label">Dealer Type<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <select name="dealer_type" class="form-control">
                                <?php 
                                $dealer_type = config_item('dealer_type');
                                if(!empty($dealer_type)){
                                foreach($dealer_type as $item){ ?>
                                    <option value="<?= $item ?>" <?= (!empty($info) && $info[0]->dealer_type == $item ? "selected" : "")?>><?= $item ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>-->
                
                    <div class="form-group">
                        <label class="col-md-3 control-label">Customer/Company Name <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <input type="text" name="name" value="<?php echo $info[0]->name; ?>" class="form-control">
                        </div>
                    </div>


				<div class="form-group">
                    <label class="col-md-3 control-label">Customer Zone<span class="req">&nbsp;*</span></label>
                    <div class="col-md-5">
                        <select name="zone"  class="selectpicker form-control" data-show-subtext="true"
                                data-live-search="true">
                            <option value="" >Select Zone&nbsp; </option>
                            <?php
                           
                            $zone = $this->action->readOrderBy('zone','zone',array());
                            if(!empty($zone)){
                            foreach($zone as $zone){ ?>
                                <option value="<?php echo $zone->zone; ?>"  <?php if($info[0]->zone == $zone->zone){ echo 'selected'; }  ?>  ><?php echo $zone->zone; ?></option>
                            <?php } } ?>
                            
                           </select>
                    </div>
                </div>       




                    <div class="form-group">
                        <label class="col-md-3 control-label">Shop Name<span class="req">&nbsp;*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="father_name"  value="<?php echo $info[0]->father_name; ?>" class="form-control" required>
                        </div>
                    </div>                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">ID Card No. <span class="req">&nbsp;</span></label>
                        <div class="col-md-5">
                            <input type="text" name="id_card" value="<?php echo $info[0]->id_card; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group hide">
                        <label class="col-md-3 control-label">Contact Person</label>
                        <div class="col-md-5">
                            <input type="text" name="contact_person" value="<?php echo $info[0]->contact_person; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile Number</label>
                        <div class="col-md-5">
                            <input type="text" name="contact" class="form-control" value="<?php echo $info[0]->mobile; ?>" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address </label>
                        <div class="col-md-5">
                            <textarea name="address" cols="15" rows="3" class="form-control"><?php echo $info[0]->address; ?></textarea>
                        </div>
                    </div>
                    
                    <?php /* if($info[0]->customer_type != 'dealer'){ ?>                    
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3 class="text-right" style="margin: 10px 0 0 0;">1<sup>st</sup> Guarantor</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <hr style="margin: 10px 0 10px 0;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" name="guarantor_name" value="<?php echo $info[0]->guarantor_name; ?>" class="form-control">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile<span class="req"></span></label>
                        <div class="col-md-5">
                            <input type="text" name="guarantor_mobile" value="<?php echo $info[0]->guarantor_mobile; ?>" class="form-control" >
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-5">
                            <textarea name="guarantor_address" value="<?php echo $info[0]->guarantor_address; ?>" class="form-control"><?php echo $info[0]->guarantor_address; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3 class="text-right" style="margin: 10px 0 0 0;">2<sup>nd</sup> Guarantor</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <hr style="margin: 10px 0 10px 0;">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-5">
                        <input type="text" name="guarantor_name2" value="<?php echo $info[0]->guarantor_name2; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mobile<span class="req"></span></label>
                    <div class="col-md-5">
                        <input type="text" name="guarantor_mobile2" value="<?php echo $info[0]->guarantor_mobile2; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address</label>
                    <div class="col-md-5">
                        <textarea name="guarantor_address2" class="form-control"><?php echo $info[0]->guarantor_address2; ?></textarea>
                    </div>
                </div>
                <?php }  */ ?>    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Initial Balance (TK)</label>
                        <div class="col-md-3">
                            <input type="number" name="initial_balance" class="form-control" step="any" value="<?php echo abs($info[0]->initial_balance); ?>" >
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-control">
                                <option <?php if($info[0]->initial_balance >= 0){echo "selected";} ?> value="receivable">Receivable</option>
                                <option <?php if($info[0]->initial_balance < 0){echo "selected";} ?> value="payable">Payable</option>
                            </select>
                        </div>
                    </div>
                    
                    <!--<div class="form-group">
                        <label class="col-md-3 control-label">Customer Type</label>
                        <div class="col-md-5">
                            <select name="customer_type" class="form-control">
                                <option value="customer" <?php if($info[0]->customer_type == 'customer_type'){echo "selected";} ?> >Customer</option>
                                <option value="dealer" <?php if($info[0]->customer_type == 'dealer'){echo "selected";} ?> >Dealer</option>
                                <option value="walton_exclusive" <?php //if($info[0]->customer_type == 'walton_exclusive'){echo "selected";} ?>>Walton Exclusive</option>
                                <option value="home_appliance" <?php //if($info[0]->customer_type == 'home_appliance'){echo "selected";} ?>>Home Appliance</option>
                            </select>
                        </div>
                    </div>-->
                    
                    <!--<div class="form-group">
                        <label class="col-md-3 control-label">Credit Limit</label>
                        <div class="col-md-6">
                            <input type="number" name="credit_limit" class="form-control" step="any" value="<?php echo $info[0]->credit_limit; ?>" >
                        </div>
                    </div>-->
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Photo <span class="req"></span></label>
                        <div class="col-md-5">
                            <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="col-md-8">
                            <input type="submit" name="update" value="Update" class="btn btn-success pull-right">
                        </div>
                    </div>
                    
                <?php echo form_close(); ?>
                </div>
                
                <div class="panel-footer">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>