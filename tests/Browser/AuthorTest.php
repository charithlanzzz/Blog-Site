<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthorTest extends DuskTestCase
{
    /**
     * Admin can retrieve authors.
     * @test
     * @return void
     */
    public function can_retrieve_authors()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authors')
                    ->pause(1000)
                    ->assertSee('Niluka');
            

        });
    }

    
     /**
     * Admin can create author
     * @test
     * @return void
     */
    public function can_create_author()
    {
        $this->browse(function (Browser $browser) {
            
            $browser->visit('/authors/create')
                     ->assertSee('Name')
                     ->type('name','Nihal')
                     ->type('description','Sample description')
                     ->press('Add')
                     ->pause(1000)
                     ->assertSee('Added')
                     ->assertPathIs('/authors/create');
        });
    }
}
