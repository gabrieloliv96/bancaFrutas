<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta $fruta
 */
?>

<?php $this->assign('title', __('Edit Fruta') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Frutas' => ['action'=>'index'],
      'View' => ['action'=>'view', $fruta->id_fruta],
      'Edit',
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
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $fruta->id_fruta],
          ['confirm' => __('Are you sure you want to delete # {0}?', $fruta->id_fruta), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
