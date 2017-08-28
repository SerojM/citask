<div class="col-md-4"></div>

<div class="col-md-4   div_register">

    <?= form_open(base_url() . 'home/register'); ?>
    <div class="form-group">
        <?= form_label('Username') ?>
        <?= form_input('username', set_value('username'), ['class' => 'form-control', 'placeholder' => 'Username']); ?>
        <span><?= form_error('username') ?></span>
    </div>
    <div class="form-group">

        <?= form_label('Email') ?>
        <?= form_input('email', set_value('email'), ['class' => 'form-control', 'placeholder' => 'Email']); ?>
        <span><?= form_error('email') ?></span>
    </div>
    <div class="form-group">
        <?= form_label('Password') ?>
        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
        <span><?= form_error('password') ?></span>
    </div>
    <div class="form-group">
        <?= form_label('Repeat Password') ?>
        <?= form_password('repeat_pass', '', ['class' => 'form-control', 'placeholder' => 'Repeat Password']) ?>
        <span><?= form_error('repeat_pass') ?></span><br/>
    </div>
    <div class="form-group">
        <strong>  <?= form_submit('submit_reg', 'Register', ['class' => 'form-control', 'id' => 'submit']); ?></strong>
    </div>

    <?= form_close(); ?>

</div>
<div class="col-md-4"></div>

