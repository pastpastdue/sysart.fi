<?php
use FilterButton;
/**
 * @name person
 * @description filterlist-component
 */

class FilterList {

    public function __construct($filterlist = []) {
        $this->filters = $filterlist;
    }

    private function _createFilterElements() {
        $filters = array_map(function($filter) {
          return new FilterButton($filter);
        }, $this->filters);

        return implode($filters, '');
    }

    public function __toString () {
        $filters = $this->_createFilterElements();
        return
<<<EOT
<div class="filter-list">
    {$filters}
</div>
EOT;
    }
}
