<?php

namespace Supermon\Url;

class Route
{
    private static $_get = [];
    private static $_post = [];
    
    /**
     * @var \Supermon\Url\Uri
     */
    private static $_uri;

    /**
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return \Supermon\Url\Uri
     */
    public static function get( $uri, $controller, $action )
    {
        return self::$_get[] = new \Supermon\Url\Uri( $uri, $controller, $action );
    }
    
    /**
     * @param string $uri
     * @param string $controller
     * @param string $action
     * @return \Supermon\Url\Uri
     */
    public static function post( $uri, $controller, $action )
    {
        return self::$_post[] = new \Supermon\Url\Uri( $uri, $controller, $action );
    }

    /**
     * 
     * @param \Supermon\Http\Request $request
     * @return \Supermon\Url\Uri
     */
    public static function match( \Supermon\Http\Request $request )
    {
        $method = $request->isPost() ? '_post' : '_get';
        
        foreach (self::${$method} as self::$_uri)
        {
            if ( self::$_uri->match( $request->server('REQUEST_URI') ) )
            {
                return self::$_uri;
            }
        }
        
        return false;
    }

}
