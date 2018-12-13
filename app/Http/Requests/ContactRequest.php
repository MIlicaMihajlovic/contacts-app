<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  //promenili iz false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->route()->parameters['contact']->id);

        $contactId = $this->method() == 'PUT'
            ? $this->route()->parameters['contact']->id  //ovde pristupamo modelu contact koji je tamo injection i bindovan
            : null;

        return [
            
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:contacts,email' .
                ($contactId ? ",$contactId" : '')
                // ($this->method() == 'PUT') ? ',' .request()->
                    
        ];
    }
}
