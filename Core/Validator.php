<?php

namespace Core;

class Validator
{
  private array $data;
  private array $errors = [];

  public function __construct($data) {
    $this->data = $data;
  }

  public function validate($validationRules): array {
    foreach($validationRules as $field => $rules) {
      $rulesArr = explode("|", $rules);
      foreach ($rulesArr as $rule) {
        $this->applyRule($field, $rule);
      }
    }

    return $this->errors;
  }

  private function applyRule($field, $rule): void
  {
    if ($rule === 'required') {
      $this->validateRequired($field);
    } elseif (str_starts_with($rule, "min:")) {
      $this->validateMin($field, (int) substr($rule, 4));
    } elseif (str_starts_with($rule, "max:")) {
      $this->validateMax($field, (int) substr($rule, 4));
    } elseif ($rule === 'email') {
      $this->validateEmail($field);
    } elseif ($rule === 'alphanumeric') {
      $this->validateAlphaNumeric($field);
    }
  }

  private function validateRequired(string $field): void
  {
    if (!array_key_exists($field, $this->data) || $this->isEmptyValue($this->data[$field])) {
      $this->addError($field, "{$field} is required.");
    }
  }

  private function validateEmail(string $field): void
  {
    if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
      $this->addError($field, "{$field} must be a valid email address.");
    }
  }

  private function validateAlphaNumeric(string $field): void
  {
    if (!preg_match("/^[a-zA-Z0-9]+$/",$this->data[$field])) {
      $this->addError($field, "{$field} must contain only letters a-z (case sensitive) and numbers 0-9.");
    }
  }

  private function validateMin($field, $minValue): void
  {
    if (strlen(trim($this->data[$field])) < $minValue) {
      $this->addError($field, "{$field} must be at least {$minValue} characters long.");
    }
  }

  private function validateMax($field, $maxValue): void
  {
    if (strlen(trim($this->data[$field])) > $maxValue) {
      $this->addError($field, "{$field} must not exceed {$maxValue} characters.");
    }
  }

  private function isEmptyValue($value): bool
  {
    if (is_null($value)) {
      return true;
    } else if (is_string($value)) {
      return empty(trim($value));
    } else if (is_array($value)) {
      return empty($value);
    }

    return false;
  }

  private function addError($field, $message): void
  {
    $this->errors[$field][] = capitalizeFirstLetter($message);
  }

}