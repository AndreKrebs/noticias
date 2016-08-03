<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Noticias'), ['controller' => 'Noticias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Noticia'), ['controller' => 'Noticias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($usuario->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Noticias') ?></h4>
        <?php if (!empty($usuario->noticias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Titulo') ?></th>
                <th><?= __('Resumo') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Imagem') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->noticias as $noticias): ?>
            <tr>
                <td><?= h($noticias->id) ?></td>
                <td><?= h($noticias->usuario_id) ?></td>
                <td><?= h($noticias->titulo) ?></td>
                <td><?= h($noticias->resumo) ?></td>
                <td><?= h($noticias->descricao) ?></td>
                <td><?= h($noticias->tags) ?></td>
                <td><?= h($noticias->imagem) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Noticias', 'action' => 'view', $noticias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Noticias', 'action' => 'edit', $noticias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Noticias', 'action' => 'delete', $noticias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
