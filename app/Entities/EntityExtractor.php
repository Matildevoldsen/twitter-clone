<?php

namespace App\Entities;

use App\Entities\Contracts\EntityExtractorContract;
use App\EntityType;

class EntityExtractor implements EntityExtractorContract
{
    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';

    const MENTION_REGEX = '/(?=[^\w!])@(\w+)\b/';
    public function __construct(protected ?string $string = null)
    {}

    public function getHashtagEntities(): array
    {
        return $this->buildEntityCollection(
            $this->match(self::HASHTAG_REGEX),
            EntityType::HASHTAG
        );
    }

    public function renderEntitiesWithLinks(): string
    {
        $stringWithHashtags = preg_replace_callback(self::HASHTAG_REGEX, function ($matches) {
            $hashtag = $matches[1];
            return '<a href="/hashtag/' . urlencode($hashtag) . '">#' . htmlspecialchars($hashtag) . '</a>';
        }, $this->string);

        return preg_replace_callback(self::MENTION_REGEX, function ($matches) {
            $mention = $matches[1];
            return '<a href="/profile/' . urlencode($mention) . '">@' . htmlspecialchars($mention) . '</a>';
        }, $stringWithHashtags);
    }

    public function getMentionEntities(): array
    {
        return $this->buildEntityCollection(
            $this->match(self::MENTION_REGEX),
            \App\EntityType::MENTION
        );
    }

    public function getAllEntities(): array
    {
        return array_merge($this->getHashtagEntities(), $this->getMentionEntities());
    }

    protected function buildEntityCollection($entities, $type): array
    {
        return array_map(function ($entity, $index) use ($entities, $type) {
            return [
                'body' => $entity[0],
                'body_plain' => $entities[1][$index][0],
                'start' => $start = $entity[1],
                'end' => $start + strlen($entity[0]),
                'type' => $type,
                'user_id' => auth()->id(),
            ];
        }, $entities[0], array_keys($entities[0]));
    }

    protected function match($pattern): array
    {
        preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);

        return $matches;
    }
}
