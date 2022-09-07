<?php

namespace System\Traits;



trait View
{

    #region View
    protected function view($dir, $vars = null)
    {
        $dir = str_replace('.', '/', $dir);
        if ($vars)
            extract($vars);
        $path = realpath(dirname(__FILE__) . "/../../application/view/" . $dir . ".php");
        if (file_exists($path)) {
            return require_once($path);
        } else
            echo "this view [" . $dir . "] not exist";
    }
    #endregion

    #region Assest

    protected function assest($dir)
    {
        global $base_url;
        $path  = $base_url . 'public/' . $dir;
        echo $path;
    }

    #endregion

    #region include

    protected function include($dir, $vars = null)
    {
        $dir = str_replace('.', '/', $dir);
        if ($vars)
            extract($vars);
        $path = realpath(dirname(__FILE__) . "/../../application/view/" . $dir . ".php");
        if (file_exists($path)) {
            return require_once($path);
        } else
            echo "this view [" . $dir . "] not exist";
    }

    #endregion

    #region url

    protected function url($url)
    {
        if ($url[0] == '/') {
            $url  = substr($url, 1, strlen($url) - 1);
        }

        global $base_url;
        echo $base_url . $url;
    }

    #endregion

}
