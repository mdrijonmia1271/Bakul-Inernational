<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        
        <?php if(ck_action("party_menu","create")){ ?>
		<a href="<?php echo site_url('party/party/create'); ?>" class="btn btn-default" id="create">
			Add New
		</a>
		<?php } ?>
		
        <?php if(ck_action("party_menu","list")){ ?>
		<a href="<?php echo site_url('party/party'); ?>" class="btn btn-default" id="list">
			View All
		</a>
		<?php } ?>
		
        <a href="<?php echo site_url('party/transaction/create'); ?>" class="btn btn-default" id="transaction-create">
            Add Transaction
		</a>
		
		<a href="<?php echo site_url('party/transaction'); ?>" class="btn btn-default" id="transaction-list">
            All Transaction
		</a>

    </div>
</div>
