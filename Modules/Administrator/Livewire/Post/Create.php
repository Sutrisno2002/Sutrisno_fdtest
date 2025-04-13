<?php

namespace Modules\Administrator\Livewire\Post;

use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Category;
use Modules\Common\Models\Post;
use Modules\Common\Services\PostService;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $title = null;
    public ?string $slug_title = null;
    public ?string $author = null;
    public ?string $description = null;
    public ?string $thumbnail = null;
    public ?string $thumbnail_source = null;
    public ?string $type = 'article';

    /**
     * Define int props
     * @var int
     */


    public ?int $rating = null;


    /**
     * Define bool props
     * @var bool
     */
    public ?bool $publish = true;

    /**
     * Define event listeners
     * @var array
     */
    public $listeners = [
        self::UPDATED_EDITOR,
        self::UPDATED_FILEPOND,
    ];

    /**
     * Define validation rules
     * @return void
     */
    protected function rules()
    {
        return [
            'thumbnail' => 'required',
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
            'author' => 'nullable|max:191',
            'description' => 'nullable',
        ];
    }

    /**
     * Define validation message
     * @return void
     */
    protected function messages()
    {
        return [
            'description.required' => 'The content field is required.',
        ];
    }

    /**
     * Hooks for title property
     * Doing title validation after
     * Title property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedTitle($value)
    {
        $this->slug_title = slug($value);
        $this->validate([
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
        ]);
    }

    /**
     * Hooks for slug_title property
     * Doing slug_title validation after
     * Slug_title property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedSlugTitle($value)
    {
        $this->validate([
            'slug_title' => 'required|max:191|unique:posts,slug_title',
        ]);
    }

    /**
     * Hooks for description property
     * When editor editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedEditor($value)
    {
        $this->description = $value;
    }

    /**
     * Hooks for thumbnail property
     * When image-upload has been updated,
     * Thumbnail property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedFilepond($value)
    {
        $this->thumbnail = $value;
    }

    /**
     * Hooks for tags property
     * When tags has been updated,
     * Tags property will be update
     *
     * @param  string $value
     * @return void
     */
   

   
    /**
     * Store post to database
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        try {
            $data = [
                'id' => Str::uuid(), 
                'title' => $this->title,
                'slug_title' => $this->slug_title,
                'type' => $this->type,
                'author' => $this->author,
                'rating' => $this->rating,
                'description' => $this->description,
                'reading_time' => $this->description ? PostService::generateReadingTime($this->description) : '0 Menit',
                'number_of_views' => 0,
                'number_of_shares' => 0,
                'created_by' => user('id'),
            ];

            // publish
            if ($this->publish) {
                $data['published_by'] = user('id');
                $data['published_at'] = now()->toDateTimeString();
                $data['archived_at'] = null;
            } else {
                $data['published_at'] = null;
                $data['archived_at'] = null;
            }

            if ($this->thumbnail) {
                $data['thumbnail'] = $this->thumbnail;
            }

            // Create Post
            Post::create($data);

            // Reset props
            $this->reset(
                'thumbnail',
                'title',
                'slug_title',
                'author',
                'description',
                'publish'
            );

            // Reset third party
            $this->resetThirdParty();

            return $this->dispatchSuccess('Artikel berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());

        }
    }

    public function render()
    {
        return view('administrator::livewire.post.create');
    }
}
