<script>
    (function () {
        if (!document.ch) {
            document.ch = {};
        }

        document.ch.<?= $name ?> = $("#<?= $name ?>").dataTable({
            <?php foreach ($options as $key => $value): ?>
                <?= "\"{$key}\": " . datatable_attribute($value) . "," ?>
            <?php endforeach; ?>

            "aoColumns": [
                <?php $index = 0; ?>
                <?php foreach ($columns as $column): ?>
                    {
                        <?php foreach ($column->getOptions() as $key => $value): ?>
                            <?= "\"{$key}\": " . datatable_attribute($value) . "," ?>
                        <?php endforeach; ?>

                        "sName": "<?= $column->getName() ?>",
                        "mData": "<?= $column->getName() ?>"
                    },
                <?php endforeach; ?>
            ]
        });

        <?php if ($interactive): ?>
            setInterval(function () {document.ch.<?= $name ?>.fnDraw(false); }, <?= $interactive ?>);
        <?php endif; ?>

        <?php if ($delay): ?>
            document.ch.<?= $name ?>.fnSetFilteringDelay(<?= $delay ?>);
        <?php endif; ?>
    }) (jQuery);
</script>
