<?php 	if(isset($meta->header)){$header_info = json_decode($meta->header,true);}
    	if(isset($meta->footer)){$footer_info = json_decode($meta->footer,true);}
    	$logo_data  = json_decode($meta->logo,true); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="__print-border hide">
            <div class="row">
                <?php
                    $this->load->helper('url');
                    $module = $this->uri->segment(1);
                ?>
                <div class="col-xs-2">
                    <img class="img-responsive" src="<?php echo site_url('private/print_logo.png'); ?>">
                </div>
                <div class="col-xs-10">
                    <div class="__info">
                        <?php  
                            $branch = $this->session->userdata('branch');
                            if($branch){$branch_info =$this->action->read('godowns',array('code' => $branch));}
                            if(!empty($branch_info)){
                        ?>
                            <h2 class="site_name"><?php echo strtoupper($header_info['site_name']); ?></h2>
                    	    
                    	    <p>Showroom:<?php echo $branch_info[0]->name; ?></p>
                    	    <p><?php if($module!= 'sale'){ echo $branch_info[0]->mobile;  echo ' ||'; } ?>  <?php echo $footer_info['addr_email']; ?></p>
                    	    <p><?php echo $branch_info[0]->address; ?></p>
                	    <?php }else{ ?>
                    	    <h2 class="site_name"><?php echo strtoupper($header_info['site_name']); ?></h2>
                    	    <p><?php echo $header_info['place_name'];?></p>
                    	    <p id="_mobile_"><?php echo $footer_info['addr_moblile']; ?> || <?php echo $footer_info['addr_email']; ?></p>
                	    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .__print-border {
        border-bottom: 2px solid #0C4DA2;
        margin-bottom: 12px;
        padding: 0 0 12px;
    }
    .__info {text-align: center;}
    .__info h2.site_name {letter-spacing: 0.15em;}
    .__info h2, .__info p {margin: 0;}
    .__logo img {margin-top: -10px;}
    .__info h4 {
        font-size: 18px;
        margin: 5px 0;
        color: #0C4DA2 !important;
    }
    .__info p {font-size: 15px; color: #0C4DA2 !important;}
    .hide {display: none;}
    .site_name {
        color: #0C4DA2 !important;
        margin-bottom: 5px;
        font-size: 36px;
        font-weight: 700;
        word-spacing: 4px;
        letter-spacing: 2px;
    }
</style>