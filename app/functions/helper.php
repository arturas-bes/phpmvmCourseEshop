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