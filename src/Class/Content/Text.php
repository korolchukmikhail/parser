<?php

namespace Parser\Content;

include "IContent.php";

use DOMDocument, DOMXPath;

class Text implements IContent
{
    public $xpath;

    public $text;

    /**
     * @param DOMDocument $html
     * @return IContent[]
     */
    public function get(DOMDocument $html): iterable
    {
        $textNodes = [];
        $xpath = new DOMXPath($html);
        foreach ($xpath->query('//text()') as $textNode) {
            if(preg_match('/^[\n\r\t ]+$/', $textNode->nodeValue) === 0){
                $text = new Text();
                $text->xpath = $textNode->getNodePath();
                $text->text  = trim($textNode->nodeValue);
                $textNodes[] = $text;
            }
        }

        return $textNodes;
    }
}