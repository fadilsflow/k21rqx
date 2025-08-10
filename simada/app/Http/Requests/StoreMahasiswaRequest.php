<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nim' => ['required','digits:8','unique:mahasiswa,nim'],
            'nama' => ['required','string','max:255'],
            'jurusan' => ['required','string'],
            'angkatan' => ['required','integer','min:2020'],
        ];
    }

    public function messages()
    {
        return [
            'nim.digits' => 'NIM harus 8 digit angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'angkatan.min' => 'Angkatan minimal 2020.',
        ];
    }
}
