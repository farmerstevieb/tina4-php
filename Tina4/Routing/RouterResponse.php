<?php

/**
 * Tina4 - This is not a 4ramework.
 * Copy-right 2007 - current Tina4
 * License: MIT https://opensource.org/licenses/MIT
 */

namespace Tina4;

/**
 * The response of a router
 * @package Tina4
 */
class RouterResponse
{
    public $content;
    public $httpCode;
    public $headers;
    public $cached;
    public $contentType;

    public function __construct($content, ?int $httpCode = HTTP_NOT_FOUND, array $headers = [], $cached=false, $contentType=TEXT_HTML)
    {
        $this->content = $content;
        $this->httpCode = $httpCode;
        $this->headers = $headers;
        $this->cached = $cached;
        $this->contentType = $contentType;

        if (empty($this->contentType)) {
            $this->contentType = TEXT_HTML;
        }

        if (!in_array("Content-Type: ".$this->contentType, $this->headers)) {
            $this->headers[] = "Content-Type: " . $this->contentType;
        }

    }
}
