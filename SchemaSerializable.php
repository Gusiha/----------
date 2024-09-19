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
    public function getSchema(): string
    {

        $reflectionClass = new ReflectionClass($this);

        //Тут можно и без ReflectionProperty::IS_PROTECTED
        $properties = $reflectionClass->getProperties();
        $result = [];

        foreach ($properties as $property) {
            $attributes = $property->getAttributes(ExportableAttribute::class);

            if (empty($attributes)) {
                continue;
            }

            $exportedAttributeName = $attributes[0]->newInstance()->name;
            $propertyType = $property->getType();
            $propertyName = $property->getName();

            $exportedName = $exportedAttributeName ?: $propertyName;
            $result[$exportedName] = $propertyType->getName();
            if ($propertyType->allowsNull()) {
                $result[$exportedName] = "?" . $result[$exportedName];
            }
        }
        return json_encode((object)$result, JSON_PRETTY_PRINT);
    }
}
