<?php
namespace App\Entities\Contracts;
interface EntityExtractorContract
{
    public function getHashtagEntities(): array;
    public function renderEntitiesWithLinks(): string;
    public function getMentionEntities(): array;
    public function getAllEntities(): array;
}
