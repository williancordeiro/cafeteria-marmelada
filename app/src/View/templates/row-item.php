<tr>
    <td><?= $id ?></td>
    <td><?= $nome ?></td>
    <td>R$ <?= number_format($preco, 2, ',', '.') ?></td>
    <td><?= $qtd ?></td>
    <td>
        <div class="actions">
            <a href="<?= URL_RAIZ . 'products/edit?id=' . $id ?>" class="edit-btn">✏️</a>
            <form action="<?= URL_RAIZ . 'products/delete?id=' . $id ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                <button class="delete-btn" type="submit">🗑️</button>
            </form>
        </div>
    </td>
</tr>