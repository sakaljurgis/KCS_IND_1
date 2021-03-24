<?php

namespace KCS;

class Config
{
    public $dbHost;
    public $dbUser;
    public $dbPassword;
    public $dbName;
    
    public function __construct(string $settingsFilePath = null)
    {
        $dbHost = null;
        $dbUser = null;
        $dbPassword = null;
        $dbName = null;
        
        if ($settingsFilePath) {
            $settings = $this->loadSettingsFile($settingsFilePath);
            
            if ($settings) {
                $dbHost = $settings['DB_HOST'];
                $dbUser = $settings['DB_USER'];
                $dbPassword = $settings['DB_PASSWORD'];
                $dbName = $settings['DB_NAME'];
            } else {
                throw new \Exception('Unable to parse settings file in '.$settingsFilePath);
            }
        }
        
        $this->dbHost = $dbHost ?: getenv('DB_HOST');
        $this->dbUser = $dbUser ?: getenv('DB_USER');
        $this->dbPassword = $dbPassword ?: getenv('DB_PASSWORD');
        $this->dbName = $dbName ?: getenv('DB_NAME');
    }
    
    private function loadSettingsFile(string $settingsFilePath)
    {
        
        if (!file_exists($settingsFilePath)) {
            throw new \Exception('Settings file not found in '.$settingsFilePath);
        }
        
        //json?
        $settingsFileContents = file_get_contents($settingsFilePath);
        $settingsFileContentsJSON= json_decode($settingsFileContents, true);
        
        if (json_last_error() === JSON_ERROR_NONE) {
            return $settingsFileContentsJSON;
        }
        
        //ini?
        try {
            $settingsFileContentsIni = parse_ini_file($settingsFilePath);
        } catch (\Exception $exception) {
            return null;
        }
        return $settingsFileContentsIni;
    }
    
}