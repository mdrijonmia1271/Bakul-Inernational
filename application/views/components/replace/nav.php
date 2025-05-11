<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if (ck_action("replace_menu", "clientReplaceCreated")) { ?>
            <a href="<?php echo site_url('replace/client/create'); ?>" class="btn btn-default"
               id="clientReplaceCreated">
                Client Replace
            </a>
        <?php } ?>

        <?php if (ck_action("replace_menu", "clientReplace")) { ?>
            <a href="<?php echo site_url('replace/client'); ?>" class="btn btn-default" id="clientReplace">
                All Client Replace
            </a>
            
            <a href="<?php echo site_url('replace/item_report/client'); ?>" class="btn btn-default" id="clientItemReplace">
                Client Replace Item Report
            </a>
        <?php } ?>

        <?php if (ck_action("replace_menu", "supplierReplaceCreated")) { ?>
            <a href="<?php echo site_url('replace/supplier/create'); ?>" class="btn btn-default"
               id="supplierReplaceCreated">
                Supplier Replace
            </a>
        <?php } ?>

        <?php if (ck_action("replace_menu", "supplierReplace")) { ?>
            <a href="<?php echo site_url('replace/supplier'); ?>" class="btn btn-default" id="supplierReplace">
                All Supplier Replace
            </a>
            
            <a href="<?php echo site_url('replace/item_report/supplier'); ?>" class="btn btn-default" id="supplierItemReplace">
                Supplier Replace Item Report
            </a>
        <?php } ?>

        <?php if (ck_action("replace_menu", "replaceStock")) { ?>
            <a href="<?php echo site_url('replace/stock'); ?>" class="btn btn-default" id="replaceStock">
                Replace Stock
            </a>
        <?php } ?>
    </div>
</div>
