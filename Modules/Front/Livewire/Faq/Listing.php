<?php

namespace Modules\Front\Livewire\Faq;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Models\Faq;

class Listing extends Component
{
    use WithPagination;

    /**
     * Define int property
     * @var int
     */
    public int $per_page = 10;

    /**
     * Get all faqs
     * @return Faq
     */
    public function getAll()
    {
        return Faq::active()
            ->orderBy('created_at', 'desc')
            ->paginate($this->per_page);
    }

    public function render()
    {
        return view('front::livewire.faq.listing', [
            'datas' => self::getAll()
        ]);
    }
}
