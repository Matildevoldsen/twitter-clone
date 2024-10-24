<?php

namespace App\Livewire\Components;

use App\Livewire\Components\Tweets\Tweet;
use Illuminate\View\View;
use Livewire\Component;

class TimelineChunk extends Component
{
    public array $ids = [];

    public function render(): View
    {
        $idsAsString = implode(',', array_map('intval', $this->ids));

        return view('livewire.components.timeline-chunk', [
            'tweets' => \App\Models\Tweet::query()
                ->whereIn('id', $this->ids)
                ->orderByRaw("array_position(ARRAY[$idsAsString]::bigint[], id)")
                ->get(),
            ]);
    }
}
