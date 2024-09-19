<?php

require_once "./SchemaSerializable.php";

abstract class Device extends SchemaSerializable
{
    #[ExportableAttribute]
    protected int $id;
    #[ExportableAttribute("Type")]
    protected string $type;
    #[ExportableAttribute("Vendor")]
    protected string $vendor;
    #[ExportableAttribute]
    protected string $modelNumber;
    #[ExportableAttribute]
    protected string $modelName;
    #[ExportableAttribute]
    protected ?string $partCatalogLink;
    #[ExportableAttribute]
    protected string $issue;
    /** @var ?IDetail[]*/
    protected array $details;

    abstract function getId(): int;
    abstract function getType(): string;
    /** @return int Серийный номер */
    abstract function getSerialNumber(): ?string;
    abstract function getAmount(): int;
    /** @return int Марка */
    abstract function getVendor(): string;
    abstract function getModelName(): string;
    abstract function getModelNumber(): string;
    /** @return int Причина поломки */
    abstract function getIssue(): string;
    /**
     *  @return ?IDetail[] Детали устройства
     */
    abstract function getDetails(): ?array;
    // abstract function addDetail(IDetail $detail) : IDetail;
}
