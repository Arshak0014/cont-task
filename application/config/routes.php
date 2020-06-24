<?php

return array(


    'cinema/presents/([0-9]+)/([0-9]+)/([0-9]+)' => 'cinema/presents/$1/$2',
    'cinema/presents/([0-9]+)/([0-9]+)' => 'cinema/presents/$1',
    'cinema/book/([0-9]+)/([0-9]+)/([0-9]+)' => 'cinema/book/$1',
    'cinema/booking/([0-9]+)' => 'cinema/booking/$1',
    'cinema/view/([0-9]+)' => 'cinema/details/$1',
    'cinema/time/([0-9]+)' => 'cinema/time/$1',
    'cinema' => 'cinema/index',


    'contact' => 'site/contact',
    'about' => 'site/about',
    'test' => 'site/test',
    '' => 'site/index',

);