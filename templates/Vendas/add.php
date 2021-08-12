<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>

<?php $this->assign('title', __('Adicionar Venda') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Vendas' => ['action'=>'index'],
      'Add',
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
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
