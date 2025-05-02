<tr>
    <td><?= $id ?></td>
    <td><?= $nome ?></td>
    <td>R$ <?= number_format($preco, 2, ',', '.') ?></td>
    <td><?= $qtd ?></td>
    <td>
        <button class="edit-btn">✏️</button>
        <button class="delete-btn">🗑️</button>
    </td>
</tr>

