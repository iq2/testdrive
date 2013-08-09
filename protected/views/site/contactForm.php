<?php
/**
 * Created by JetBrains PhpStorm.
 * User: f.bacher
 * Date: 04.07.13
 * Time: 09:53
 * To change this template use File | Settings | File Templates.
 */

return array(
    'title'=>'Contact Us',
    'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'maxlength'=>'80'
        ),
        'email'=>array(
            'type'=>'email',
            'hint'=>'Enter a valid email address',
            'maxlength'=>'80'
        ),
        'subject'=>array(
            'type'=>'text',
            'maxlength'=>'120'
        ),
        'body'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>20,'cols'=>80)
        )
    ),
    'buttons'=>array(
        'submit'=>array(
            'type'=>'submit',
            'label'=>'Submit'
        )
    )
);