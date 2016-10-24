<?php

class StubbedSchemaValidator implements SchemaValidator {
    public function __constuct($schema) {
        return true;
    }
    
    public function isValid($data) {
        return true;
    }
}
