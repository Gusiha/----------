<?php



#[Attribute]
class ExportableAttribute
{
    public string $name;

    public function __construct(string $name = "")
    {
        $this->name = $name;
    }
}
