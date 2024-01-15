<?php

namespace Others\dependency;

use Others\dependency\DepEnum; 

class Dependency {


    const DEFAULT_DEP = [
        DepEnum::BOOTSTRAP_5_1_3,
        DepEnum::JQUERY_3_7_1,
        DepEnum::FONTAWESOME_6_5_1
    ];

    public static function loadDependency(array|null $dependency = null ) {
        
        $js = ""; $css = "";
        
        // Load default dep
        foreach (self::DEFAULT_DEP as $dep) {

            if ( !empty($dep["css"]) && !is_null($dep["css"]) && isset($dep["css"])){
                foreach( $dep["css"] as $depCss) {
                    $css .= " <link rel='stylesheet' href='" . self::getPath($depCss) . "'>\n";
                }
            }
            
            if ( !empty($dep["js"]) && !is_null($dep["js"]) && isset($dep["js"])){
            foreach( $dep["js"] as $depJs) {
                $js .= "<script src='" . self::getPath($depJs) ."'></script>\n";
            }
        }

        }

        // Load others dep
        if (  isset($dependency) || !is_null($dependency) ) {
            foreach ($dependency as $otherDep) {
                if ( !empty($otherDep["css"]) && !is_null($otherDep["css"]) && isset($otherDep["css"])){
                    foreach( $otherDep["css"] as $depCss) {
                        $css .= " <link rel='stylesheet' href='" . self::getPath($depCss) . "'>\n";
                    }
                }
                
                if ( !empty($otherDep["js"]) && !is_null($otherDep["js"]) && isset($otherDep["js"])){
                    foreach( $otherDep["js"] as $depJs) {
                        $js .= "<script src='" . self::getPath($depJs) ."'></script>\n";
                    }
                }
                
            }
            
        }
        

        return ["js" => $js, "css" => $css];
    }

    private static function getPath(string $dependency) {
        return "./node_modules". $dependency;
    }

}
