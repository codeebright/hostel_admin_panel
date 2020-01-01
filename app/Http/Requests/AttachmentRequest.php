<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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
            'file_name'  => 'required',
            'file'       => 'required|max:30000|mimes:jpg,JPG,jpeg,JPEG,png,PNG,doc,docx,pdf,xls,ppt,pptx,xlsx',
        ];
    }
}
