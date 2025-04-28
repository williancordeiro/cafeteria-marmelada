<table class="item-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>
