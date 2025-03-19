<x-app-layout>
    @if($posts->isEmpty())
    <div>達成した項目は存在しません</div>
    <a href="/bucketlist" class="text-blue-500">やりたいことリストに戻る</a>
    @else
    <div class="max-w-md mx-auto p-4">
        @foreach($posts as $post)
            <div class="py-4 border-t border-gray-300 flex justify-between items-center">
                <p>{{ $posts->firstItem() + $loop->index }}. {{ $post->todo }}</p>
                <div class="space-x-2">
                    <a href="/posts/{{$post->id}}/impression" class="bg-blue-500 text-white px-3 py-1 rounded">感想</a>
                    <a href="/achievements/{{$post->id}}/show" class="bg-gray-500 text-white px-3 py-1 rounded">詳細</a>
                </div>
            </div>
        @endforeach
    </div>
    @endif

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-app-layout>