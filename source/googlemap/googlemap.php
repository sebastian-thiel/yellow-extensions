<?php
// Googlemap extension, https://github.com/datenstrom/yellow-extensions/tree/master/source/googlemap

class YellowGooglemap {
    const VERSION = "0.9.0";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("googlemapZoom", "15");
        $this->yellow->system->setDefault("googlemapStyle", "flexible");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="googlemap" && ($type=="block" || $type=="inline")) {
            list($address, $zoom, $style, $width, $height) = $this->yellow->toolbox->getTextArguments($text);
            if (empty($zoom)) $zoom = $this->yellow->system->get("googlemapZoom");
            if (empty($style)) $style = $this->yellow->system->get("googlemapStyle");
            $language = $page->get("language");
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $url = "https://www.google.com/maps";
            if (preg_match('/[a-zA-Z\d]{28}/', $address)) {
            	$url .= "/d/embed?mid=".$address;
            } else {
            	$url .= "?q=".rawurlencode($address);
            }
            $output .= "<iframe src=\"".$url."&amp;ie=UTF8&amp;t=m&amp;z=".rawurlencode($zoom)."&amp;hl=$language&amp;iwloc=near&amp;num=1&amp;output=embed\" frameborder=\"0\"";
            if ($width && $height) $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
