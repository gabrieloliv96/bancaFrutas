<?php

/**
 * @var \App\View\AppView $this
 */
?>


<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg"><?= __('Novo usuario') ?></p>

    <?= $this->Form->create() ?>

    <?= $this->Form->control('nome', [
      'placeholder' => __('Nome'),
      'label' => false,
      'append' => '<i class="fas fa-user"></i>'
    ]) ?>

    <?= $this->Form->control('documento', [
      'placeholder' => __('RG'),
      'label' => false,
      'append' => '<i class="fas fa-envelope"></i>'
    ]) ?>

    <?= $this->Form->control('password', [
      'placeholder' => __('Password'),
      'label' => false,
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

    <div class="row">
      <div class="col-4">
        <?= $this->Form->control(__('Register'), [
          'type'=>'submit',
          'class'=>'btn btn-primary btn-block'
        ]) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>

    <?= $this->Html->link(__('I already have a membership'), ['action'=>'login']) ?>
  </div>
  <!-- /.register-card-body -->
</div>
