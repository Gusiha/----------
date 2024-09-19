<?php



#[ExportableAttribute]
class CountableDevice extends Device
{
    #[ExportableAttribute]
    private $amount;

    public function __construct(int $id, string $type, string $vendor, string $modelName, string $modelNumber, ?string $partCatalogLink, int $amount)
    {
        $this->id = $id;
        $this->type = $type;
        $this->vendor = $vendor;
        $this->modelName = $modelName;
        $this->modelNumber = $modelNumber;
        $this->partCatalogLink = $partCatalogLink;
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSerialNumber(): ?string
    {
        return null;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getModelName(): string
    {
        return $this->modelName;
    }

    public function getModelNumber(): string
    {
        return $this->modelNumber;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getVendor(): string
    {
        return $this->vendor;
    }

    public function getIssue(): string
    {
        return $this->issue;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }
}
