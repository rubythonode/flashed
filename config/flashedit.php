<?php

return [

    /*
    |------------------------------------------------------------------------------------
    | Driver
    |------------------------------------------------------------------------------------
    |
    | The driver will be a styles list to be used in the flash message.
    |
    | Note: The "bootstrap" is the only driver available at the moment.
    |
    */
    'driver' => 'bootstrap',

    /*
    |------------------------------------------------------------------------------------
    | Error Title
    |------------------------------------------------------------------------------------
    |
    | The error title will be the language key where to select by default the
    | translation line from. For example: "errors.title"
    |
    | You should have a language file like so "resources/lang/en/errors"
    | with a key named "title".
    |
    | Note: This key can be replaced by the one that fits your needs.
    |
    */
    'error_title' => 'errors.whoops.title',

    /*
    |------------------------------------------------------------------------------------
    | Makeup
    |------------------------------------------------------------------------------------
    |
    | Makeup is the styles list to be used within your view and it is strictly related
    | to the driver type selected. For example, if you happen to select a bootstrap
    | driver, you should add just bootstrap class styles.
    |
    | Note: These makeups can be overwritten with the styles information that fits
    | better for your needs.
    |
    */
    'makeup' => [
        'panelClass' => [
            'primary' => 'panel-primary',
            'success' => 'panel-success',
            'warning' => 'panel-warning',
            'danger' => 'panel-danger',
            'info' => 'panel-info',
        ],
        'icon' => [
            'primary' => 'fa fa-check-square-o',
            'success' => 'fa fa-check-square-o',
            'danger' => 'fa fa-times-circle-o',
            'info' => 'fa fa-info-circle',
            'warning' => 'fa fa-warning',
        ]
    ],
];