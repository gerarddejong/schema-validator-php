<?php

class SchemaValidatorTest extends PHPUnit_Framework_TestCase {
    public function testStringLengthValidation() {
        $schemaValidator = new StubbedSchemaValidator(json_decode('{"type": "string", "minLength": 2, "maxLength": 3}'));
        $this->assertFalse($schemaValidator->isValid("A"));
        $this->assertTrue($schemaValidator->isValid("AB"));
        $this->assertTrue($schemaValidator->isValid("ABC"));
        $this->assertFalse($schemaValidator->isValid("ABCD"));
    }
    
    public function testStringRegularExpressionValidation() {
        $schemaValidator = new StubbedSchemaValidator(json_decode('{"type": "string", "pattern": "^(\\([0-9]{3}\\))?[0-9]{3}-[0-9]{4}$"}'));
        $this->assertTrue($schemaValidator->isValid("555-1212"));
        $this->assertTrue($schemaValidator->isValid("(888)555-1212"));
        $this->assertFalse($schemaValidator->isValid("(888)555-1212 ext. 532"));
        $this->assertFalse($schemaValidator->isValid("(800)FLOWERS"));
    }
    
}
