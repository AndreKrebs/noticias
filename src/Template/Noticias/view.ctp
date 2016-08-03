<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Noticia'), ['action' => 'edit', $noticia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Noticia'), ['action' => 'delete', $noticia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Noticia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="noticias view large-9 medium-8 columns content">
    <h3><?= h($noticia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $noticia->has('usuario') ? $this->Html->link($noticia->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $noticia->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($noticia->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Resumo') ?></th>
            <td><?= h($noticia->resumo) ?></td>
        </tr>
        <tr>
            <th><?= __('Tags') ?></th>
            <td><?= h($noticia->tags) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($noticia->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($noticia->descricao)); ?>
    </div>
</div>
