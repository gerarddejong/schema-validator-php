<?php

interface SchemaValidator {
    public function __constuct($schema);
    public function isValid($data);
}
