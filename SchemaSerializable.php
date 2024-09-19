<?php


/**
 * Abstract Class Serializable
 *
 * This abstract class defines the methods (and provides default behaviour) that can be overriden by a class to retrieve the required fields for creation.
 *
 */
abstract class SchemaSerializable
{
    /**@return string Список необходмых полей JSON для создания объекта*/
    public function getSchema()
    {

        $reflectionClass = new ReflectionClass($this);
        echo "Class Attributes: " . PHP_EOL;
        print_r($reflectionClass->getAttributes());

        //Тут можно и без ReflectionProperty::IS_PROTECTED
        $properties = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED);
        echo "Properies Attributes: " . PHP_EOL;
        print_r($properties);
        $result = [];

        foreach ($properties as $property) {
            $attributes = $property->getAttributes(ExportableAttribute::class);
            print_r($attributes);


            $exportedAttribute = $attributes[0]->newInstance();
            $propertyType = $property->getType();
            $propertyName = $property->getName();

            $exportedName = $exportedAttribute->name ?: $propertyName;
            $result[$exportedName] = $propertyType;
        }
        return (object) $result;
    }
}
