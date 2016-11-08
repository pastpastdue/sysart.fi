<?php
/**
 * @name person
 * @description person-component
 */

// do shite

class PersonList extends BaseObject {
  public $DEFAULT_CONFIG = array(
    'displayPhonenumbers' => true,
    'displayLinks' => true,
    'classNames' => array('personlist', 'flex-row', 'flex-wrap'),
    'itemClassNames' => array('col-xs-12', 'col-sm-6', 'col-md-4', 'col-lg-3')
  );

  public function __construct ($options = array()) {
    parent::__construct($options);
    // , $employees, $displayPhonenumbers = true, $displayLinks = true  }
  }

  private function createPerson($id) {
    return new PersonPreview(array(
      'item' => $id,
      'displayPhonenumber' => $this->config['displayPhonenumbers'],
      'classNames' => $this->config['itemClassNames'],
      'displayLinks' => $this->config['displayLinks']
    ));
  }

  public function __toString () {

    $people = array_map(function($id) {
      return $this->createPerson($id);
    }, $this->config['items']);

    $renderString = implode($people, '');
    $classNames = $this->getClassNames();

    return
<<<EOT
    <div class="row {$classNames}">
            {$renderString}
    </div>
EOT;
  }
}
