<?php
/**
 * @name person
 * @description filterbutton-component
 */

// do shite

class FilterButton {

    public function __construct($filter) {
        $this->filter = $filter;
    }

    public function __toString () {
        return
<<<EOT
<button type="button" class="filter-button">{$this->filter}</button>
EOT;
    }
}
