<?php

namespace KCS;

class Config
{
    private array $configList = [];

    public function __construct()
    {
        (new DotEnv(__DIR__.'/../.env'))->load();
        
        $this->loadConfigFiles();
    }
    
    private function loadConfigFiles(): void
    {
        //load all files from config folder, merge arrays
        //if mandatory file is missing throw exception
        $configDirPath = __DIR__.'/../config';
        $filenames = scandir($configDirPath);
        
        foreach ($filenames as $filename) {
            if ($filename === '..' || $filename === '.') {
                continue;
            }
            $filePath = $configDirPath . "/" . $filename;
            //echo $filePath;
            
            $this->configList[explode(".", $filename)[0]] = include $filePath;
        }
        
    }
    
    public function get(string $configName)
    {
        
        return $this->configList[$configName];
    }
    
}