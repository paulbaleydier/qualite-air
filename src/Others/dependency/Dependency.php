<?php

namespace Others\dependency;

use Others\dependency\DepEnum; 

class Dependency {


    const DEFAULT_DEP = [
        DepEnum::JQUERY,
        DepEnum::FONTAWESOME,
        DepEnum::ADMINLTE,
        DepEnum::SWEATALERT2
    ];

    public static function loadDependency(array|null $dependency = null , string $class_call) {
        
        $js = ""; $css = "";
        
        // Load default dep
        foreach (self::DEFAULT_DEP as $dep) {

            foreach( $dep["css"] ?? [] as $depCss) {
                $css .= " <link rel='stylesheet' href='" . self::getPath($depCss) . "'>\n";
            }
            
            foreach( $dep["js"] ?? [] as $depJs) {
                $js .= "<script src='" . self::getPath($depJs) ."'></script>\n";
            }
        

        }

        // Load others dep
        foreach ($dependency ?? [] as $otherDep) {
            foreach( $otherDep["css"] ?? [] as $depCss) {
                $css .= " <link rel='stylesheet' href='" . self::getPath($depCss) . "'>\n";
            }
            
            foreach( $otherDep["js"] ?? [] as $depJs) {
                $js .= "<script src='" . self::getPath($depJs) ."'></script>\n";
            }
            
        }
            
        

        // Load js and css of view 
        $defaultDir = "webroot";

        // Default files
        $defaultCssFiles = self::processFiles($defaultDir, 'default', 'css');
        $defaultJsFiles = self::processFiles($defaultDir, 'default', 'js');

        $css .= implode('', $defaultCssFiles);
        $js .= implode('', $defaultJsFiles);

        // Files of class
        if (class_exists($class_call)) {
            
            $classSplit = explode("\\", $class_call);
            $classController = $classSplit[1] ?? null;
            $classView = $classSplit[2] ?? null;

            if ( $classController !== null && $classView !== null) {
                $className = $classController . "/" . $classView;
            }else {
                $className = substr($class_call, strrpos($class_call, '\\') + 1);
            }

            // var_dump($classController);
            // var_dump($classView);die();

            // 
        
            $cssFiles = self::processFiles($defaultDir, $className, 'css');
        
            $css .= implode('', $cssFiles);
        
            $jsFiles = self::processFiles($defaultDir, $className, 'js');
        
            $js .= implode('', $jsFiles);
        }
        
        return ["js" => $js, "css" => $css];
    }

    private static function processFiles($baseDir, $className, $fileType, $subFile = "") {
        $path = $baseDir . "/$fileType/$className/$subFile";
        
        if (is_dir($path)) {
            $contenuDossier = array_diff(scandir($path), ['.', '..']);
            
            $contenuDossier = array_filter($contenuDossier, function ($fichier) use ($fileType) {
                return $fichier[0] !== '-' && substr($fichier, -strlen($fileType) - 1) === ".$fileType";
            });
    
            return array_map(function ($fileName) use ($fileType, $className, $subFile) {
                if ( $fileType == "css" ){
                    return " <link rel='stylesheet' href='" . ("webroot/$fileType/$className/$subFile$fileName") ."?v=" . time() . "'>\n";
                }else {
                    return "<script src='" . ("webroot/$fileType/$className/$subFile$fileName") ."?v=" . time() . "'></script>\n";
                }
            }, $contenuDossier);
        }
    
        return [];
    }

    

    private static function getPath(string $dependency) {
        return $dependency;
    }

}
