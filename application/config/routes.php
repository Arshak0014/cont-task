<?php

return array(

    'admin/present/delete/([0-9]+)' => 'admin/present/delete/$1',
    'admin/present/update/([0-9]+)' => 'admin/present/update/$1',
    'admin/present/create' => 'admin/present/create',
    'admin/present' => 'admin/present/index',
    'admin/cinema/delete/([0-9]+)' => 'admin/cinema/delete/$1',
    'admin/cinema/update/([0-9]+)' => 'admin/cinema/update/$1',
    'admin/cinema/create' => 'admin/cinema/create',
    'admin/cinema' => 'admin/cinema/index',
    'admin' => 'admin/dashboard/index',

    'cinema/presents/([0-9]+)/([0-9]+)/([0-9]+)' => 'cinema/presents/$1/$2',
    'cinema/presents/([0-9]+)/([0-9]+)' => 'cinema/presents/$1',
    'cinema/booking/([0-9]+)' => 'cinema/booking/$1',
    'cinema/view/([0-9]+)' => 'cinema/details/$1',
    'cinema/time/([0-9]+)' => 'cinema/time/$1',
    'cinema' => 'cinema/index',


    'contact' => 'site/contact',
    'about' => 'site/about',
    'test' => 'site/test',
    '' => 'site/index',

);