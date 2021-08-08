<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta[]|\Cake\Collection\CollectionInterface $frutas
 */
?>

<?php $this->assign('title', __('Frutas') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Frutas',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('New Fruta'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_fruta') ?></th>
              <th><?= $this->Paginator->sort('fruta') ?></th>
              <th><?= $this->Paginator->sort('classificacao_id') ?></th>
              <th><?= $this->Paginator->sort('fresca') ?></th>
              <th><?= $this->Paginator->sort('qtd_disponivel') ?></th>
              <th><?= $this->Paginator->sort('preco') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($frutas as $fruta): ?>
          <tr>
            <td><?= $this->Number->format($fruta->id_fruta) ?></td>
            <td><?= h($fruta->fruta) ?></td>
            <td><?= $this->Number->format($fruta->classificacao_id) ?></td>
            <td><?= ($fruta->fresca) ? __('Yes') : __('No') ?></td>
            <td><?= $this->Number->format($fruta->qtd_disponivel) ?></td>
            <td><?= $this->Number->format($fruta->preco) ?></td>
            <td><?= h($fruta->created) ?></td>
            <td><?= h($fruta->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $fruta->id_fruta], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fruta->id_fruta], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fruta->id_fruta], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $fruta->id_fruta)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape'=>false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>
