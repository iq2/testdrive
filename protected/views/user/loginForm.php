<?php
/**
 * Created by JetBrains PhpStorm.
 * User: f.bacher
 * Date: 08.07.13
 * Time: 13:28
 * To change this template use File | Settings | File Templates.
 */

return array(
    'title' => 'login',
    'elements' => array(
        'email' => array(
            'type' => 'email',
            'hint' => 'enter your email address',
            'maxlength' => '80'
        ),
        'pass' => array(
            'type' => 'password'
        )
    ),
    'buttons' => array(
        'submit' => array(
            'type' => 'submit',
            'label' => 'submit'
        )
    )
);