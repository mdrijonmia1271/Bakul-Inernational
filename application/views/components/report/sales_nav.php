<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("report_menu","sales_report")){ ?>
		<a href="<?php echo site_url('report/sales_report'); ?>" class="btn btn-default" id="sales_report">
			Sales Report
		</a>
		<?php } ?>
		
        <?php if(ck_action("report_menu","sales_report")){ ?>
		<a href="<?php echo site_url('report/sales_report/sales_report_item'); ?>" class="btn btn-default" id="sales_report_item">
			Sales Item Report
		</a>
		<?php } ?>
		
		 <?php if(ck_action("report_menu","clientwise_item_report")){ ?>
    		<a href="<?php echo site_url('report/sales_report/clientwise_item_report'); ?>" class="btn btn-default" id="clientwise_item_report">
    			Clientwise Report
    		</a>
		<?php } ?>
		
    </div>
</div>
