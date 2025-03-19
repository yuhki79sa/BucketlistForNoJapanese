<x-app-layout>
    <div>やりたいことリストに登録する</div>
    <form action="/todo" method="POST">
        @csrf
        <input type="text" placeholder="世界一周" name="posts[todo]" required>
        <input type="submit" value="実行">
    </form>

    <div>
        @foreach($posts as $post)
            <div class="max-w-md mx-auto p-4">
                <div class="py-4 border-t border-gray-300 flex items-center justify-between">
                    <p>{{ $posts->firstItem() + $loop->index }}. {{ $post->todo }}</p>
                    <div class = "flex space-x-2 button">
                    <form action="/posts/{{$post->id}}/isDone" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" class="bg-blue-500 text-white px-3 py-1 rounded" value="達成">
                    </form>
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded">削除</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>{{ $posts->links() }}</div>
</x-app-layout>