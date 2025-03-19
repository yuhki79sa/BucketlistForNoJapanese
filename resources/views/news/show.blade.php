<x-app-layout>
<x-slot name="header">
（ヘッダー名）
</x-slot>
<p>
    {{ $post->todo }}
</p>
@if($comments->isEmpty())
<P>投稿者の感想は存在しません</p>
@else
@foreach($comments as $comment)
<p>投稿者の感想</p>
<p>{{ $comment->body}}</p>
<p>関連記事</p>
<p>{{$comment->URL}}</p>
@endforeach
@endif

<a href='/posts' style = "color: blue">一覧に戻る</a>

</x-app-layout>