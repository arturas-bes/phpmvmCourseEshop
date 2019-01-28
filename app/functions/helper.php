<?php
use Philo\Blade\Blade;

function view($path, array $data = [])
{
    $view = __DIR__.'/../../resources/views';
    $cache = __DIR__.'/../../bootstrap/cache';
    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}
function make($filename, $data)
{
    extract($data);
    ob_start();
    //include template
    include(__DIR__.'/../../resources/views/emails/'.$filename.'.php');
    // get content
    $content = ob_get_contents();
    //erease the output and turn of output buffering
    ob_end_clean();

    return $content;
}
function slug($value)
{
    // preg_replace performs regular search preg_quote used to quote regular expression
    // remove all characters not in this list: underscore | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));
    //replace underscore and whitespace with a dash -
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);
    //remove whitespace
    return trim($value, '-');
}
//// vardump
//function d($params = array())
//{
//    print('<pre>');
//    print_r($params);
//    print('</pre>');
//}
//// dump die
//function dd($params = array())
//{
//    dd($params);
//    die;
//}