<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classificacao $classificacao
 */
?>

<?php
$this->assign('title', __('Classificacao') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Classificacao' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($classificacao->id_classificacao) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Classificacao') ?></th>
            <td><?= h($classificacao->classificacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Classificacao') ?></th>
            <td><?= $this->Number->format($classificacao->id_classificacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($classificacao->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($classificacao->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $classificacao->id_classificacao],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $classificacao->id_classificacao), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $classificacao->id_classificacao], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-frutas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Frutas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Frutas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Frutas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Fruta') ?></th>
          <th><?= __('Fruta') ?></th>
          <th><?= __('Classificacao Id') ?></th>
          <th><?= __('Fresca') ?></th>
          <th><?= __('Qtd Disponivel') ?></th>
          <th><?= __('Preco') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($classificacao->frutas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Frutas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($classificacao->frutas as $frutas) : ?>
        <tr>
            <td><?= h($frutas->id_fruta) ?></td>
            <td><?= h($frutas->fruta) ?></td>
            <td><?= h($frutas->classificacao_id) ?></td>
            <td><?= h($frutas->fresca) ?></td>
            <td><?= h($frutas->qtd_disponivel) ?></td>
            <td><?= h($frutas->preco) ?></td>
            <td><?= h($frutas->created) ?></td>
            <td><?= h($frutas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Frutas', 'action' => 'view', $frutas->id_fruta], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Frutas', 'action' => 'edit', $frutas->id_fruta], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Frutas', 'action' => 'delete', $frutas->id_fruta], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $frutas->id_fruta)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

