<?php namespace frictionlessdata\datapackage;

/**
 * repository of known profiles and the corresponding classes and validation requirements
 */
class Repository
{
    public static function getResourceClass($descriptor)
    {
        if (static::getResourceValidationProfile($descriptor) == "tabular-data-resource") {
            return Resources\TabularResource::class;
        } else {
            return Resources\DefaultResource::class;
        }
    }

    public static function getResourceValidationProfile($descriptor)
    {
        if (isset($descriptor->profile) && $descriptor->profile != "default") {
            return $descriptor->profile;
        } else {
            return "data-resource";
        }
    }

    public static function getDatapackageClass($descriptor)
    {
        return Datapackages\DefaultDatapackage::class;
    }

    public static function getDatapackageValidationProfile($descriptor)
    {
        if (isset($descriptor->profile) && $descriptor->profile != "default") {
            return $descriptor->profile;
        } else {
            return "data-package";
        }
    }
}