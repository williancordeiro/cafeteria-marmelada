<tr>
    <td><?= $id ?></td>
    <td><?= $nome ?></td>
    <td>R$ <?= number_format($preco, 2, ',', '.') ?></td>
    <td><?= $qtd ?></td>
    <td>
        <a href="<?= URL_RAIZ . 'products/edit=?id=' . $id ?>" class="edit-btn">✏️</a>
        <button class="delete-btn">🗑️</button>
    </td>
</tr>