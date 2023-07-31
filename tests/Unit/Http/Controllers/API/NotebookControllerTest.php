<?php

namespace Tests\Unit\Http\Controllers\API;

use App\Models\Notebook;
use Tests\TestCase;

class NotebookControllerTest extends TestCase
{
    private $notebook;

    public function setUp(): void
    {
        parent::setUp();
        $this->notebook = $this->createNotebook(['title' => 'Test API title']);
    }

    public function test_get_method_return_array_notebooks()
    {
        $response = $this->getJson(route('notebook.index'))
            ->json();

        $this->assertEquals(3, count($response));
        $this->assertEquals('Test API title', $response['data'][0]['title']);
    }

    public function test_show_fetch_single_notebook()
    {
        $response = $this
            ->getJson(route('notebook.show', $this->notebook->id))
            ->assertOk()
            ->json();

        $this->assertEquals($this->notebook->title, $response['data']['title']);
    }

    public function test_store_create_new_notebook()
    {
        $notebook = Notebook::factory()->make();

        $response = $this
            ->postJson(route('notebook.store'), [
                "title" => $this->notebook->title,
                "company" => $notebook->company,
                "phone" => $notebook->phone . rand(0, 1000),
                "email" => $notebook->email,
                "birthday" => '1990-01-01',
                "photo" => $notebook->photo,
            ])
            ->assertCreated()
            ->json();

        $this->assertEquals($notebook->email, $response['data']['email']);
        $this->assertDatabaseHas('notebooks', [
            'title' => $this->notebook->title
        ]);
    }

    public function test_while_storing_notebooks_title_email_and_phone_are_require()
    {
        $this->withExceptionHandling();

        $this->postJson(route('notebook.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['title'])
            ->assertJsonValidationErrors('email')
            ->assertJsonValidationErrors(['phone']);
    }

    public function test_delete_notebooks()
    {
        $this->deleteJson(route('notebook.destroy', $this->notebook->id))
            ->assertOk();

        $this->assertDatabaseMissing('notebooks', ['email' => $this->notebook->email]);
    }

    public function test_update_notebook()
    {
        $this->postJson(route('notebook.update', $this->notebook->id), [
            'title' => 'PATCHED title test',
            "phone" => $this->notebook->phone,
            "email" => $this->notebook->email,
        ])
            ->assertOk();

        $this->assertDatabaseHas('notebooks', [
            'id' => $this->notebook->id,
            'title' => 'PATCHED title test'
        ]);
    }
}
