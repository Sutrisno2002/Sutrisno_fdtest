<?php

namespace Modules\Administrator\Livewire\Post;

use App\Livewire\Component\Editor;
use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Category;
use Modules\Common\Models\Post;
use Modules\Common\Services\PostService;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Core\Http\Livewire\Component\Filepond\Image;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define post props
     * @var Post $post
     */
    public Post $post;

    /**
     * Define string properties
     * @var string
     */
    public ?string $post_id = '';
    public ?string $oldThumbnail = '';
    public ?string $published_at = '';
    public ?string $published_by = '';
    public ?string $title = '';
    public ?string $slug_title = '';
    public ?string $author = '';
    public ?string $description = '';
    public ?string $thumbnail = '';
    public ?string $thumbnail_source = '';
    public ?string $type = 'article';

    /**
     * Define int properties
     * @var int
     */
    public ?int $rating = null;

    /**
     * Define bool properties
     * @var bool
     */
    public ?bool $publish = true;
    public ?bool $archived = false;

    /**
     * Define event listeners
     * @var array
     */
    public $listeners = [
        self::UPDATED_EDITOR,
        self::UPDATED_FILEPOND,
    ];

    /**
     * Define properties value before component rendered
     *
     * @param  Post $post
     * @return void
     */
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->post_id = $post->id;
        $this->type = $post->type_id;
        $this->title = $post->title;
        $this->rating = $post->rating;
        $this->slug_title = $post->slug_title;
        $this->author = $post->author;
        $this->description = $post->description;
        $this->oldThumbnail = $post->thumbnail ?: cache('image_not_found');
        $this->published_at = $post->published_at;
        $this->published_by = $post->published_by;

        if ($post->published_at == null && $post->archived_at == null) {
            $this->publish = false;
        } else if ($post->published_at != null && $post->archived_at == null) {
            $this->publish = true;
        } else if ($post->published_by != null && $post->archived_at != null) {
            $this->archived = true;
        }
    }

    /**
     * Define validation rules
     * @return array
     */
    protected function rules()
    {
        return [
            'thumbnail' => 'nullable',
            'title' => 'required|max:191|unique:posts,title,' . $this->post_id . ',id',
            'slug_title' => 'required|max:191|unique:posts,slug_title,' . $this->post_id . ',id',
            'author' => 'nullable|max:191',
            'description' => 'required',
        ];
    }

    /**
     * Define validation message
     * @return array
     */
    protected function messages()
    {
        return [
            'description.required' => 'The content field is required.',
        ];
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
     * Get all categories and filter by post type
     *
     * @return void
     */
  

    /**
     * Update post to database
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        try {
            $data = [
                'title' => $this->title,
                'slug_title' => $this->slug_title,
                'type' => $this->type,
                'author' => $this->author,
                'description' => $this->description,
                'reading_time' => $this->description ? PostService::generateReadingTime($this->description) : '0 Menit',
                'created_by' => user('id'),

            ];

            // publish
            if ($this->publish) {
                $data['published_by'] = user('id');
                $data['published_at'] = $this->post->published_at ?: now()->toDateTimeString();
                $data['archived_at'] = null;
            } else {
                $data['published_at'] = null;
                $data['archived_at'] = null;
            }

            // archived
            if ($this->archived) {
                $data['published_at'] = null;
                $data['archived_at'] = now()->toDateTimeString();
            }

            if ($this->thumbnail) {
                $data['thumbnail'] = $this->thumbnail;
            }

            $this->post->update($data);

            return $this->dispatchSuccess('Artikel berhasil diperbarui.');

        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());

        }

    }

    public function render()
    {
        return view('administrator::livewire.post.edit');
    }
}
