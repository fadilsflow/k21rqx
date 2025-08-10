<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $mahasiswaId = $this->route('mahasiswa') ? $this->route('mahasiswa')->id : null;

        return [
            'nim' => [
                'required',
                'digits:8',
                Rule::unique('mahasiswa','nim')->ignore($mahasiswaId),
            ],
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
