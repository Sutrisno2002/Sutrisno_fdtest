<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Common\Services\PostService;
use Modules\Core\Models\User;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_book()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        Livewire::actingAs($user)
            ->test(\Modules\Administrator\Livewire\Post\Create::class)
            ->set('title', 'Clean Code')
            ->set('slug_title', 'clean-code-' . uniqid())
            ->set('author', 'Robert C. Martin')
            ->set('rating', 5)
            ->set('description', 'A book about writing clean code.')
            ->set('thumbnail', null)
            ->call('store');

      
    }

    public function test_guest_cannot_add_book()
    {
        Livewire::test(\Modules\Administrator\Livewire\Post\Create::class)
            ->set('title', 'Clean Code')
            ->set('slug_title', 'clean-code-' . uniqid())
            ->set('author', 'Robert C. Martin')
            ->set('rating', 5)
            ->set('description', 'A book about writing clean code.')
            ->call('store');
            
    }
}
