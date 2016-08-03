<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticias form large-9 medium-8 columns content">
    <?= $this->Form->create($noticia) ?>
    <fieldset>
        <legend><?= __('Add Noticia') ?></legend>
        <?php
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
            echo $this->Form->input('titulo');
            echo $this->Form->input('resumo');
            echo $this->Form->input('descricao');
            echo $this->Form->input('tags');
            echo $this->Form->input('imagem');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
