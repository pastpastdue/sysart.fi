<?php
/**
 * @name contactboxlist
 * @description contactboxlist-component
 */

// do shite

class ContactBoxList {
  public function __construct ($contactInfos) {
     $this->contactInfos = $contactInfos;
  }

  private function createContactBox($contactInfo) {
    return new ContactBox($contactInfo);
  }

  public function __toString () {

    $contacts = array_map(function($contactInfo) {
        return $this->createContactBox($contactInfo);
    }, $this->contactInfos);

    $renderString = implode($contacts, '');

    return
<<<EOT
  <div class="row contactboxlist">
        {$renderString}
  </div>
EOT;
  }
}
