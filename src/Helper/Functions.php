<?php

if (!function_exists('view')) {

    /**
     * @param string      $template
     * @param array       $data
     * @param string|null $layout
     *
     * @return \Swoft\Http\Message\Server\Response
     */
    function view(string $template, array $data = [], $layout = null)
    {
        /**
         * @var \Swoft\View\Base\View               $view
         * @var \Swoft\Http\Message\Server\Response $response
         */
        $view     = \Swoft\App::getBean('view');
        $response = \Swoft\Core\RequestContext::getResponse();

        $content  = $view->render(\Swoft\App::getAlias($template), $data, $layout);
        $response = $response->withContent($content)->withoutHeader('Content-Type')->withAddedHeader('Content-Type', 'text/html');

        return $response;
    }
}
if (!function_exists('e')) {
    /**
     * Escape HTML entities in a string.
     * @param      $value
     * @param bool $doubleEncode
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
    }
}

if (!function_exists('array_except')) {
    /**
     * Get all of the given array except for a specified array of items.
     * @param  array        $array
     * @param  array|string $keys
     * @return array
     */
    function array_except($array, $keys)
    {
        foreach ((array)$keys as $key) {
            unset($array[$key]);
        }

        return $array;
    }
}

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     * @param  mixed $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     * @param  mixed    $value
     * @param  callable $callback
     * @return mixed
     */
    function tap($value, $callback)
    {
        $callback($value);

        return $value;
    }
}
