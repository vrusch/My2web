<div class="container">
    <div class="row">
        <div class="span12">
            <br/>

            <div class="well well-small">
                <small>
                    <small>Copyright &copy; <?php echo date('Y'); ?> <?php echo lang('website_design'); ?></small>
                </small>

                <div class="pull-right">
                    <small>
						<?php echo sprintf(lang('website_page_rendered_in_x_seconds'), $this->benchmark->elapsed_time()); ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
