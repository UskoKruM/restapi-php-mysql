<?php

class Developer implements JsonSerializable {

    private $id;
    private $name;
    private $yearsOfCoding;

    public function __construct($id, $name, $yearsOfCoding) {
        $this->id = $id;
        $this->name = $name;
        $this->yearsOfCoding = $yearsOfCoding;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getYearsOfCoding() {
        return $this->yearsOfCoding;
    }

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}
