<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta $fruta
 */
?>

<?php $this->assign('title', __('Add Fruta') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Frutas' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($fruta) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('fruta');
      echo $this->Form->control('classificacao_id');
      echo $this->Form->control('fresca', ['custom' => true]);
      echo $this->Form->control('qtd_disponivel');
      echo $this->Form->control('preco');
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
