<?php

namespace Supermon;

class Autoloader
{
    public function __construct( array $paths_namespaces = array() )
    {
        foreach ($paths_namespaces as $path)
        {
            set_include_path(get_include_path() . PATH_SEPARATOR . realpath( $path ) );
        }
    }
    
    public function autoload($class_name)
    {
        $include_class_name = str_replace('\\', '/', $class_name) . '.php';
        
        if( $include_class = $this->_fileExistsOnIncludePaths($include_class_name) )
        {
            require_once $include_class;
        }
        else
        {
            throw new Exception( 'Class ' . $include_class_name . ' not Found' );
        }
       
    }
    
    protected function _fileExistsOnIncludePaths($file)
    {
        $include_paths = explode( PATH_SEPARATOR, get_include_path());
        
        foreach ( $include_paths as $path ) 
        {
            $include_class = $path . '/' . $file;
            
            if( file_exists( $include_class ) )
            {
                return $include_class;
            }
        }
    }
}
