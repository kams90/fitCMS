<?php echo form_open(current_url(), 'method="post" id="pages-edit-form" novalidate="novalidate"'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <a href="<?php echo $return_link; ?>" type="button" class="btn btn-default btn-sm" ><i class="ion-ios-arrow-back"></i></a>
                <button class="btn btn-primary pull-right" type="submit"><i class="ion-ios-download"></i> &nbsp; <?php echo lang('save'); ?></button>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">

                        <!-- title -->
                        <div class="form-group">
                            <label for="title"><?php echo lang('title'); ?></label>
                            <?php echo form_input('title', $page->title, ['class' => 'form-control', 'id' => 'title', 'required' => 'required']); ?>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <!-- slug -->
                        <div class="form-group">
                            <label for="slug"><?php echo lang('slug'); ?></label>
                            <?php echo form_input('slug', $page->slug, ['class' => 'form-control', 'id' => 'slug']); ?>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="slug"><?php echo lang('content'); ?></label>
                            <?php echo form_textarea('content', $page->content, ['id' => 'content']); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">

                        <!-- meta_title -->
                        <div class="form-group">
                            <label for="meta_title"><?php echo lang('meta').' '.lang('title'); ?></label>
                            <?php echo form_input('meta_title', $page->meta_title, ['class' => 'form-control', 'id' => 'meta_title']); ?>
                        </div>

                        <!-- meta_keywords -->
                        <div class="form-group">
                            <label for="meta_keywords"><?php echo lang('meta').' '.lang('keywords'); ?></label>
                            <?php echo form_input('meta_keywords', $page->meta_keywords, ['class' => 'form-control', 'id' => 'meta_keywords']); ?>
                        </div>

                        <!-- meta_description -->
                        <div class="form-group">
                            <label for="meta_description"><?php echo lang('meta').' '.lang('description'); ?></label>
                            <?php echo form_textarea('meta_description', $page->meta_description, ['class' => 'form-control', 'id' => 'meta_description']); ?>
                        </div>

                    </div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button class="btn btn-primary pull-right" type="submit"><i class="ion-ios-download"></i> &nbsp; <?php echo lang('save'); ?></button>
            </div><!-- /.box-footer -->
        </div>
    </div>
</div>

<?php echo form_close(); ?>

<script src="<?php echo site_url('assets/themes/' . config_item('admin_theme') . '/plugins/ckeditor/ckeditor.js'); ?>"></script>

<script>
    $(function () {

        var editor = CKEDITOR.replace('content', {
            language: 'pl',
            uiColor: '#ffffff',
            height: 500
        });

    });
</script>