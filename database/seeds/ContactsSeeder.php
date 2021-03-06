<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 100)->create();
    }
}
