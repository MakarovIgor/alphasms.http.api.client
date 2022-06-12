<?php

namespace igormakarov\AlphaSms;

class PropertiesToHttpQuery
{
    public function convert(array $properties): string
    {
        $paramsForHttpQuery = [];
        foreach ($properties as $key => $value) {
            $paramsForHttpQuery[$this->toSnakeCase($key)] = $value;
        }
        return http_build_query($paramsForHttpQuery);
    }

    private function toSnakeCase(string $string): string
    {
        return strtolower(
            preg_replace('/(?|([a-z\d])([A-Z])|([^\^])([A-Z][a-z]))/', '$1_$2', $string)
        );
    }
}