<?php

namespace Others\dependency;

class DepEnum
{



    const JQUERY = [
        "css" => [
            "vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.css"
        ],
        "js" => [
            "vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js",
            "vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js",
            "vendor/almasaeed2010/adminlte/plugins/jquery-knob/jquery.knob.min.js"
        ]
    ];

    const ADMINLTE = [
        "css" => [
            "vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
            "vendor/almasaeed2010/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css",
            "vendor/almasaeed2010/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css",
            "vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css",
        ],
        "js" => [
            "vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
            "vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js",
            "vendor/almasaeed2010/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js",
            "vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"
        ]
    ];





    const SWEATALERT2 = [
        "css" => [
            "vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.min.css",
        ],
        "js" => [
            "vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.min.js"
        ]
    ];



    const CHARTJS = [
        "css" => ["vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.css"],
        "js" => ["vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js"]
    ];

    const DATERANGEPICKER = [
        "css" => [
            "vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.css"
        ],
        "js" => [
            "vendor/almasaeed2010/adminlte/plugins/moment/moment.min.js",
            "vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js",
            
        ]
        ];
    
        const JQUERY_KNOB = [
            "css" => [],
            "js" => [
                "vendor/almasaeed2010/adminlte/plugins/jquery-knob/jquery.knob.min.js"
            ]
            ];

    /**
     * 
     * PLUGINS
     * 
     */

    const DATATABLESJS = [
        "css" => ["plugins/DataTables-1.13.8/datatables.min.css"],
        "js" => ["plugins/DataTables-1.13.8/datatables.min.js"]
    ];



    const FONTAWESOME = [
        "css" => ["plugins/fontawesome-free-6.5.1/css/all.min.css"],
        "js" => ["plugins/fontawesome-free-6.5.1/js/all.min.js"]
    ];



    const ICHECK_BOOTSTRAP = [
        "css" => ["vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css"],
        "js" => []
    ];

    const DAYJS = [
        "css" => [
            ""
        ],
        "js" => [
            "plugins/dayjs/dayjs.min.js"
        ]
    ];
}
