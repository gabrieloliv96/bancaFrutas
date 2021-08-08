<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>

<?php $this->assign('title', __('Edit Venda') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Vendas' => ['action'=>'index'],
      'View' => ['action'=>'view', $venda->id_venda],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($venda) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('fruta_id', ['options' => $frutas]);
      echo $this->Form->control('usuario_id', ['options' => $usuarios]);
      echo $this->Form->control('qtd_vendida');
      echo $this->Form->control('preco_venda');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $venda->id_venda],
          ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id_venda), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
