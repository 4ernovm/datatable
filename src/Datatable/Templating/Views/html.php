<table id="<?= $name ?>" <?= html_attributes($attributes) ?>>
    <thead>
        <tr>
        <?php foreach ($columns as $column): ?>
            <th <?= html_attributes($column->getAttributes()) ?>>
            <?= $column->getLabel() ?>
            </th>
        <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $row): ?>
        <tr <?= html_attributes($row->getAttributes()) ?>>
            <?php foreach ($row->getData() as $cell_name => $cell): ?>
            <td <?= html_attributes($row->getCellAttributes($cell_name)) ?>>
                <?= $cell ?>
            </td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    <?php endif ?>
    </tbody>
    <tfoot>
        <tr>
        <?php foreach ($columns as $column): ?>
            <th <?php foreach ($column->getAttributes() as $name => $value) echo " {$name}=\"{$value}\""; ?>>
            <?= $column->getLabel() ?>
            </th>
        <?php endforeach; ?>
        </tr>
    </tfoot>
</table>
