<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenilaianStoreRequest extends FormRequest
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
        return [
            // 'pelamar_nama' => 'required',
            // 'pelamar_alamat' => 'required|min:3',
            // 'pelamar_jekel' => 'required|in:LAKI-LAKI,PEREMPUAN'
        ];
    }
}
