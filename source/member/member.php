<?php
// Member extension

class YellowMember {
    const VERSION = "0.1.0";
    public $yellow;         // access to API

    const NAME = 0;
    const NUMBER = 1;
    const DATE = 2;

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("memberCryptSecret", "j96Y+rKMC8B27G&j");
        $this->yellow->system->setDefault("memberCreateLocation", "/member/create");
        $this->yellow->system->setDefault("memberValidateLocation", "/member/validate");
        $this->yellow->system->setDefault("memberCreateOrientation", "portrait");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="member" && ($type=="block" || $type=="inline")) {
            list($command) = $this->yellow->toolbox->getTextArguments($text);
            
            $output .= "<div class=\"member\">";

            // create qrcode for member
            if ($command == "create") {
                list($command, $orientation) = $this->yellow->toolbox->getTextArguments($text);
                $number = trim($this->yellow->page->getRequest("number"));

                $output .= "<h2>Mitgliedsausweis erzeugen</h2>";
                $output .= "<form class=\"member-form\" action=\"".$page->base.$this->yellow->system->get("memberCreateLocation")."\" method=\"post\">\n";
                $output .= "<p><label for=\"number\">Mitgliedsnummer</label><br /><input type=\"text\" class=\"form-control\" name=\"number\" id=\"number\" value=\"".$number."\" /></p>\n";
                $output .= "<input type=\"hidden\" name=\"referer\" value=\"".$page->getUrl()."\" />\n";
                $output .= "<input type=\"hidden\" name=\"status\" value=\"create\" />\n";
                $output .= "<input type=\"submit\" value=\"Erzeugen\" class=\"btn\" />\n";
                $output .= "</form>\n";

                if ($page->getRequest("status")=="create") {
                    $number = trim($this->yellow->page->getRequest("number"));
                    if (!$this->yellow->extension->isExisting("table")) {
                        $page->error(500, "Extension 'table' gibts nicht!");
                    } else if (!$this->yellow->extension->isExisting("qrcode")) {
                        $page->error(500, "Extension 'qrcode' gibts nicht!");
                    } else if (!$number) {
                        $output .= "<p>Du hast keine Mitgliedsnummer eingegeben!";
                    }  else {
                        $result = $this->findByNumber($number);
                        if ($number != $result[Self::NUMBER]) {
                            $output .= "<p>Die Mitgliedsnummer '$number' gibts nicht! Entweder du hast die falsch eingegeben oder du musst die Daten aktualisieren.</p>";
                        } else {
                            $output .= "<h2>Mitgliedsausweis drucken</h2>";
                            $output .=  "<div class=\"notice3\">".
                                            "<div>".
                                                "<div>".
                                                    "<p>Bitte nur Seite 1 als PDF drucken</p>".
                                                "</div>".
                                            "</div>".
                                        "</div>";
                            $validatePagePath = $this->yellow->lookup->normaliseUrl(
                                $this->yellow->system->get("coreServerScheme"),
                                $this->yellow->system->get("coreServerAddress"),
                                $this->yellow->system->get("coreServerBase"),
                                $this->yellow->system->get("memberValidateLocation"));
                            if (!$orientation) {
                                $orientation = $this->yellow->system->get("memberCreateOrientation");
                            }
                            $output .= "<div class=\"pass ".$orientation."\">";
                            $output .= "<img src=\"/media/themes/mtbi-logo.png\" width=\"124\" height=\"50\" class=\"img-fluid\" alt=\"".$this->yellow->page->getHtml("sitename")."\">";
                            $output .=  "<style>";
                            $output .=      "@media print {";
                            $output .=          "@page {";
                            $output .=              $orientation=="landscape" ? "size: 85mm 55mm" : "size: 55mm 85mm";
                            $output .=          "}";
                            $output .=      "}";
                            $output .=  "</style>";
                            $urlEncoded = $validatePagePath."?number=".rawurlencode($this->encrypt($number));
                            $output .= "<a href=\"".$urlEncoded."\">";
                            $output .= $this->yellow->extension->get("qrcode")->onParseContentShortcut($page, "qrcode", $urlEncoded, $type);
                            $output .= "</a>";
                            $output .= $this->formatMember($result);
                            $output .= "</div>";
                            $output .= "<input type=\"submit\" value=\"Drucken\" class=\"btn print\" />";
                        }
                    }
                }
            }
            // validate member
            else if ($command == "validate") {
                list($command, $additionalContent) = $this->yellow->toolbox->getTextArguments($text);
                $numberEncoded = trim($this->yellow->page->getRequest("number"));
                $numberDecoded = $this->decrypt(rawurldecode($numberEncoded));
                $result = $this->findByNumber($numberDecoded);
                if ($result[Self::NUMBER]) {
                    $output .= "<p>Das Mitglied ist <strong>aktiv</strong> und hat die folgenden Daten:</p>";
                    $output .= "<div class=\"pass\">";
                    $output .= $this->formatMember($result);
                    $output .= "</div>";
                    if ($additionalContent) {
                        $output .= $this->yellow->page->getPage($additionalContent)->getContent();
                    }
                } else {
                    $output .= "<p>Ups! Entweder das Mitglied gibts nicht oder es ist nicht mehr aktiv.</p><p>Sollte das falsch sein, bitte bei <a href=\"mailto:info@mtb-bielefeld.de\">info@mtb-bielefeld.de</a> melden.</p>";
                }
            }
            // no command given
            else {
                $page->error(500, "Parameter 'command' fehlt!");
            }

            $output .= "</div>";
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

    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreExtensionLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}member.css\" />\n";
        }
        return $output;
    }

    private function formatMember($result) {
        $output = "";
        $output .= "<p>";
        $output .= "<small>Name, Vorname:</small>";
        $output .= $result[Self::NAME];
        $output .= "<small>Mitgliedsnummer:</small>";
        $output .= $result[Self::NUMBER];
        $output .= "<small>Eintrittsdatum:</small>";
        $output .= $result[Self::DATE];
        $output .= "<small>Nur gültig mit einem aktuellen Lichtbildausweis.</small>";
        $output .= "</p>";
        return $output;
    }

    private function findByNumber($number) {
        $tableHandler = $this->yellow->extension->get("table");
        $table = $tableHandler->getTable($this->yellow->system->get("tableDirectory")."members.csv");
        return $tableHandler->filterTable($table, [["Mitgliedsnummer", "==", $number]])["data"][0];
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
