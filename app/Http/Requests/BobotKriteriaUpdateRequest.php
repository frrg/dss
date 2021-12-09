<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BobotKriteriaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $id = $this->bobot_kriterium ?? '';
        return [
            'bobot' => 'required|unique:bobot_kriteria,bobot,'.$id,
            'keterangan' => 'required|min:3',
        ];
    }
}
