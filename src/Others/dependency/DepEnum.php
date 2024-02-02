<?php

namespace Others\dependency;

class DepEnum {


    /**
     * 
     * NODE_MODULES
     * 
     */
    
    const JQUERY_3_7_1 = [
        "css" => [],
        "js" => ["node_modules/jquery/dist/jquery.min.js"]
    ];

    

    const BOOTSTRAP_5_1_3 = [
        "css" => ["node_modules/bootstrap/dist/css/bootstrap.min.css"],
        "js" => ["node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"]
    ];


    const SWEATALERT2 = [
        "css" => ["node_modules/sweetalert2/dist/sweetalert2.min.css"],
        "js" => ["node_modules/sweetalert2/dist/sweetalert2.all.min.js"]
    ];

    

    const CHARTJS = [
        "css" => [],
        "js" => ["node_modules/chart.js/dist/chart.umd.js"]
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

    const FONTAWESOME_6_5_1 = [
        "css" => ["plugins/fontawesome-free-6.5.1/css/all.min.css"],
        "js" => ["plugins/fontawesome-free-6.5.1/js/all.min.js"]
    ];

  

}
