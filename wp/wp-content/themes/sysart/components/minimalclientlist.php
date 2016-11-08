<?php
/**
 * @name minimal-clientlist
 * @description minimal-clientlist
 */

class MinimalClientList {

    public function __construct($clientlist) {
        foreach ($clientlist as $k => $client) {
            $fields = get_fields($client->ID);
            $clientlist[$k] = (array) array_merge((array) $client, (array) $fields);
        }

        $this->clientlist = $clientlist;
    }

    private function _createElements() {
        $clients = array_map(function($client) {
          $img = new Image($client['image']);
          $img = $img->__toString();
          return
<<<EOT
<div class="col-xs-6 client">
    {$img}
</div>
EOT;
        }, $this->clientlist);

        return implode($clients, '');

    }

    public function __toString () {
        $renderString = $this->_createElements();

        return
<<<EOT
<div class="minimal-clientlist row">{$renderString}</div>
EOT;
    }
}
