<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $noticia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticias form large-9 medium-8 columns content">
    <?= $this->Form->create($noticia, ['enctype'=> 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit Noticia') ?></legend> 
        <?php
                
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
            echo $this->Form->input('titulo');
            echo $this->Form->input('resumo');
            echo $this->Form->input('descricao');
            echo $this->Form->input('tags');
            echo $this->Form->input('imagem', ['type'=>'file', 'required'=>false]);
            echo $this->Html->image('noticias/'.$noticia['imagem'], ['fullBase' => true, 'style'=>'width:20%;height:20%;']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
