<?php

namespace Parser\Content;

include "IContent.php";

use DOMDocument, DOMXPath;

class Link implements IContent
{
    public $xpath;

    public $text;
    public $href;

    /**
     * @param DOMDocument $html
     * @return IContent[]
     */
    public function get(DOMDocument $html): iterable
    {
        $links = [];
        $xpath = new DOMXPath($html);
        foreach ($xpath->query('//a') as $linkNode) {
            $link = new Link();
            $link->xpath = $linkNode->getNodePath();
            $link->text  = trim($linkNode->nodeValue);
            $links[] = $link;
        }

        return $links;
    }
}