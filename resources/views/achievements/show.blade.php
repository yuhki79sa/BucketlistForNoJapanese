<x-app-layout>
    
    @if($comments && count($comments) > 0)
    @foreach( $comments as $comment)
    <p>{{$comment->post->todo }}</p>
    <p>感想</p>
    <p>{{ $comment->body }}</p>
    <p>関連記事</p>
    <p>{{ $comment->URL }}</p>
    @endforeach
    @else
    <p>コメントがありません</p>
    @endif
    
</x-app-layout>