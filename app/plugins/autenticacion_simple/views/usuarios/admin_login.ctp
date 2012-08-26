<div id="login_box">
<?php
    echo $session->flash('auth');
    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('nombre_de_usuario');
    echo $form->input('password');
    echo $form->end('Ingresar');
?>
</div>