<?php

namespace App\Http\Requests\API;

use InfyOm\Generator\Request\APIRequest;
use Auth;

class InvitePersonaAPIRequest extends APIRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	return Auth::user()->is_mapkeeper || Auth::user()->is_admin ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	'email'			=> 'required|email',
        	'persona_id'	=> 'required|integer'
        ];
    }
}
