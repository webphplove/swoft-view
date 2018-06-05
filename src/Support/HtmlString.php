<?php

namespace Swoft\View\Support;

class HtmlString
{
    /**
     * The HTML string.
     * @var string
     */
    protected $html;

    /**
     * Create a new HTML string instance.
     * @param  string $html
     * @return void
     */
    public function __construct($html)
    {
        $this->html = $html;
    }

    /**
     * Get the HTML string.
     * @return string
     */
    public function toHtml()
    {
        return $this->html;
    }

    /**
     * Get the HTML string.
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }
}
