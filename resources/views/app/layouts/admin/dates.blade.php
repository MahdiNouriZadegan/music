@if ($data->created_at == null && $data->updated_at == null)
    نامعلوم
@elseif($data->updated_at != null)
    {{ jalaliDate($data->updated_at) }}
@elseif($data->created_at != null)
    {{ jalaliDate($data->created_at) }}
@endif
