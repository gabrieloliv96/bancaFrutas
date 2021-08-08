<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>

<?php
$this->assign('title', __('Venda') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Vendas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($venda->id_venda) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Fruta') ?></th>
            <td><?= $venda->has('fruta') ? $this->Html->link($venda->fruta->id_fruta, ['controller' => 'Frutas', 'action' => 'view', $venda->fruta->id_fruta]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $venda->has('usuario') ? $this->Html->link($venda->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $venda->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Venda') ?></th>
            <td><?= $this->Number->format($venda->id_venda) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtd Vendida') ?></th>
            <td><?= $this->Number->format($venda->qtd_vendida) ?></td>
        </tr>
        <tr>
            <th><?= __('Preco Venda') ?></th>
            <td><?= $this->Number->format($venda->preco_venda) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($venda->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($venda->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $venda->id_venda],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $venda->id_venda), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $venda->id_venda], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


