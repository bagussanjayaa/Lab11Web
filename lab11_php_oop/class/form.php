<?php
class Form {
    private $fields = [];
    private $submit;

    public function __construct($submit) {
        $this->submit = $submit;
    }

    public function addField($name, $label, $type = "text") {
        $this->fields[] = compact('name','label','type');
    }

    public function display() {
        echo "<form method='POST'>";
        foreach ($this->fields as $f) {
            echo "<div class='mb-3'>
                    <label>{$f['label']}</label>
                    <input type='{$f['type']}' name='{$f['name']}' class='form-control'>
                  </div>";
        }
        echo "<button class='btn btn-primary'>{$this->submit}</button></form>";
    }
}
