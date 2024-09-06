@if ($singer->created_at == null && $singer->updated_at == null)
    نامعلوم
@elseif($singer->updated_at != null)
    {{ jalaliDate($singer->updated_at) }}
@elseif($singer->created_at != null)
    {{ jalaliDate($singer->created_at) }}
@endif
