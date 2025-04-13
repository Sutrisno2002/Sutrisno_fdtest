<?php

namespace Modules\Front\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Meta extends Component
{
    /**
     * Defines string properties
     * @var string
     */
    public ?string $title = '';
    public ?string $description = '';
    public ?string $keywords = '';
    public ?string $image = '';
    public ?string $url = '';
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $title,
        ?string $description,
        // ?string $keywords,
        ?string $image,
        // ?string $url
    ) {
        $this->title = $title;
        $this->description = $description;
        // $this->keywords = $keywords;
        $this->image = $image;
        // $this->url = $url;
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View | string
    {
        return view('front::components.meta');
    }
}
