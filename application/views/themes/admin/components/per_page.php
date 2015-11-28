<?php
$options = [
    1 => 1,
    10 => 10,
    20 => 20,
    50 => 50,
];

$params = [
    'id' => 'per-page-select',
    'class' => 'form-control',
];

echo form_dropdown('per_page', $options, $this->session->admin_per_page, $params);
?>

<script>

    $('#per-page-select').change(function () {
        var value = parseInt($(this).val());

        window.location.href = "<?php echo admin_url('main/change_per_page/'); ?>" + value;
    });

</script>