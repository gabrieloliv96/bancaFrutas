<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta $fruta
 */
?>

<?php
$this->assign('title', __('Fruta') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Frutas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($fruta->id_fruta) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Fruta') ?></th>
            <td><?= h($fruta->fruta) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Fruta') ?></th>
            <td><?= $this->Number->format($fruta->id_fruta) ?></td>
        </tr>
        <tr>
            <th><?= __('Classificacao Id') ?></th>
            <td><?= $this->Number->format($fruta->classificacao_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtd Disponivel') ?></th>
            <td><?= $this->Number->format($fruta->qtd_disponivel) ?></td>
        </tr>
        <tr>
            <th><?= __('Preco') ?></th>
            <td><?= $this->Number->format($fruta->preco) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($fruta->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($fruta->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Fresca') ?></th>
            <td><?= $fruta->fresca ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $fruta->id_fruta],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $fruta->id_fruta), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $fruta->id_fruta], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


