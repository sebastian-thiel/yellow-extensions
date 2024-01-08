<?php
// Member extension

class YellowMember {
    const VERSION = "0.1.0";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("memberCryptSecret", "X2yc6&3UUcxePIU");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="member" && ($type=="block" || $type=="inline")) {
            list($command) = $this->yellow->toolbox->getTextArguments($text);
            
            // create qrcode for member
            if ($command == "create") {
                list($command, $createLocation, $validateLocation) = $this->yellow->toolbox->getTextArguments($text);
                $number = trim($this->yellow->page->getRequest("number"));

                $output = "<div class=\"".htmlspecialchars($name)."\">\n";
                $output .= "<form class=\"member-form\" action=\"".$page->base.$createLocation."\" method=\"post\">\n";
                $output .= "<p><label for=\"number\">Mitgliedsnummer</label><br /><input type=\"text\" class=\"form-control\" name=\"number\" id=\"number\" value=\"".$number."\" /></p>\n";
                $output .= "<input type=\"hidden\" name=\"referer\" value=\"".$page->getUrl()."\" />\n";
                $output .= "<input type=\"hidden\" name=\"status\" value=\"create\" />\n";
                $output .= "<input type=\"submit\" value=\"Erzeugen\" class=\"btn\" />\n";
                $output .= "</form>\n";
                $output .= "</div>\n";

                if ($page->getRequest("status")=="create") {
                    $number = trim($this->yellow->page->getRequest("number"));
                    if (!$this->yellow->extension->isExisting("table")) {
                        $page->error(500, "Extension 'table' gibts nicht!");
                    } else if (!$this->yellow->extension->isExisting("qrcode")) {
                        $page->error(500, "Extension 'qrcode' gibts nicht!");
                    } else if (!$number) {
                        $output .= "<p>Du hast keine Mitgliedsnummer eingegeben!";
                    } else if ($number != $this->findNumber($number)) {
                        $output .= "<p>Die Mitgliedsnummer '$number' gibts nicht! Entweder du hast die falsch eingegeben oder du musst die Daten aktualisieren.</p>";
                    }  else {
                        $validatePagePath = $this->yellow->lookup->normaliseUrl(
                            $this->yellow->system->get("coreServerScheme"),
                            $this->yellow->system->get("coreServerAddress"),
                            $this->yellow->system->get("coreServerBase"),
                            $validateLocation);
                        $urlEncoded = $validatePagePath."?number=".rawurlencode($this->encrypt($number));
                        $output .= $this->yellow->extension->get("qrcode")->onParseContentShortcut($page, "qrcode", $urlEncoded, $type);
                    }
                }
            }

            // validate member
            if ($command == "validate") {
                list($command, $sharedAdditionalContent) = $this->yellow->toolbox->getTextArguments($text);
                $numberEncoded = trim($this->yellow->page->getRequest("number"));
                $numberDecoded = $this->decrypt(rawurldecode($numberEncoded));
                if ($this->findNumber($numberDecoded)) {
                    $additionalContent = $this->yellow->page->getPage($sharedAdditionalContent)->getContent();
                    $output .= "<strong>Herzlichen Glückwunsch! Du bist ein aktives Mitglied und hast die folgende Mitgliedsnummer: $numberDecoded.</strong>".$additionalContent;
                } else {
                    $output .= "<p>Ups! Entweder dich gibts nicht oder du bist kein aktives Mitglied mehr.</p><p>Wenn du denkst das ist falsch, meld dich bitte bei <a href=\"mailto:info@mtb-bielefeld.de\">info@mtb-bielefeld.de</a></p>";
                }
            }
        }
        return $output;
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="member") {
            if ($this->yellow->isCommandLine()) $page->error(500, "Static website not supported!");
            if (!$page->isRequest("referer")) {
                $page->setRequest("referer", $this->yellow->toolbox->getServer("HTTP_REFERER"));
            }
            $page->setHeader("Last-Modified", $this->yellow->toolbox->getHttpDateFormatted(time()));
            $page->setHeader("Cache-Control", "no-cache, no-store");
        }
    }

    private function findNumber($number) {
        $tableHandler = $this->yellow->extension->get("table");
        $table = $tableHandler->getTable($this->yellow->system->get("tableDirectory")."members.csv");
        return $tableHandler->filterTable($table, [["Nummer", "==", $number]])["data"][0][0];
    }

    private function encrypt($string) { 
        $ENCRYPTION_KEY = $this->yellow->system->get("memberCryptSecret");
        return base64_encode(openssl_encrypt($string, 'AES-256-CBC', $ENCRYPTION_KEY, 0, str_pad(substr($ENCRYPTION_KEY, 0, 16), 16, '0', STR_PAD_LEFT))); 
    }

    private function decrypt($string) { 
        $ENCRYPTION_KEY = $this->yellow->system->get("memberCryptSecret");
        return openssl_decrypt(base64_decode($string), 'AES-256-CBC', $ENCRYPTION_KEY, 0, str_pad(substr($ENCRYPTION_KEY, 0, 16), 16, '0', STR_PAD_LEFT)); 
    }
    
}
