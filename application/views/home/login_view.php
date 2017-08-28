<div class="col-md-4"></div>

<div class="col-md-4  div_register">
    <span style="color:red;margin-top: 5px"> <?= $this->session->flashdata("error"); ?> </span>
    <?= form_open(base_url() . 'home/login'); ?>
    <div class="form-group">
        <?= form_label('Username') ?>
        <?= form_input('username', set_value('username'), ['class' => 'form-control', 'placeholder' => 'Username']); ?>
        <span><?= form_error('username') ?></span>
    </div>
    <div class="form-group">
        <?= form_label('Password') ?>
        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
        <span><?= form_error('password') ?></span>
    </div>
    <br/>
    <div class="form-group">
        <strong>  <?= form_submit('submit_login', 'Login', ['class' => 'form-control', 'id' => 'submit']); ?> </strong>
    </div><?= form_close(); ?>
     <?php if(!empty($authUrl)) : ?>
    <?php  echo '<a href="'.$authUrl.'"><img width="70%" height="70px" src="'.base_url().'inc/images/flogin.png" alt=""/></a>'; ?>
 <?php endif;?>
</div>

<div class="col-md-4  div_register">

</div>
