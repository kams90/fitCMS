<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">
                    <?php $this->load->view('themes/'.config_item('admin_theme').'/components/per_page.php'); ?>
                </div>

                <div class="pull-right">
                    <?php $this->load->view('themes/'.config_item('admin_theme').'/components/search_form.php'); ?>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->

            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm formConfirm" data-formId="pages-list-form" data-confirmMsg="<?php echo lang('confirm_delete_checked'); ?>"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <div class="btn-group">
                        <a href="<?php echo admin_url('pages/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                    <!-- /.btn-group -->
                    <?php echo $this->pagination->create_links(); ?>
                </div>

                <?php echo form_open(current_url(), 'id="pages-list-form"'); ?>

                <div class="table-responsive mailbox-messages">

                    <?php if ($pages) : ?>

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><?php echo lang('pages.title'); ?></th>
                                    <th style="width: 150px;"><?php echo lang('created_at'); ?></th>
                                    <th style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($pages as $page) : ?>

                                    <tr id="item_<?php echo $page->id_page; ?>">
                                        <td style="width: 50px;"><input type="checkbox" name="check_item[<?php echo $page->id_page; ?>]"></td>
                                        <td>
                                            <a href="<?php echo admin_url('pages/edit/'.$page->id_page); ?>">
                                                <?php echo $page->title; ?>
                                            </a>
                                        </td>
                                        <td><?php echo $page->created_at; ?></td>
                                        <td class="text-right">
                                            <a href="<?php echo admin_url('pages/edit/'.$page->id_page); ?>" class="text-aqua"><i class="fa fa-pencil"></i></a> &nbsp; 
                                            <a href="<?php echo admin_url('pages/delete'); ?>" rel="<?php echo $page->id_page; ?>" class="text-red deleteRecord" data-confirmMsg="<?php echo lang('pages.messages.confirm_delete'); ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    <?php else : ?>

                        <div class="alert alert-info margin">
                            <?php echo lang('pages.noresults'); ?>
                        </div>

                    <?php endif; ?>

                </div>

                <?php echo form_close(); ?>

            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm formConfirm" data-formId="pages-list-form" data-confirmMsg="<?php echo lang('confirm_delete_checked'); ?>"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <div class="btn-group">
                        <a href="<?php echo admin_url('pages/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                    </div>

                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>