<x-app-layout>
    <h1>最新</h1>
    <form action = "{{ route('posts.index')}}" method = "get" >
        <input type = "text" name = "keyword" placeholder = "検索内容を記入" required value = {{request('keyword')}}>
        <button type = "submit">検索</button>
    </form>
    @foreach($posts as $post)
        <div class="max-w-md mx-auto p-4">
            <div class="py-4 border-t border-gray-300 flex">
                <div class="w-1/2">
                    <div>
                        <p>{{ $posts->firstItem() + $loop->index }}.{{ $post->todo }}</p>
                    </div>
                    <div>
                        <a href="posts/{{ $post->id }}/show" class="bg-gray-500 text-white px-3 py-1 rounded">詳細</a>
                        <a href="posts/{{ $post->id }}/choice" class="bg-blue-500 text-white px-3 py-1 rounded">評価する</a>
                    </div>
                    <div class="flex items-center space-x-2">
                        @if($post->likes->where('user_id', $user_id)->isEmpty())
                        <i class="fa-regular fa-thumbs-up liked-Btn" id="{{$post->id}}"></i>
                        @else
                        <i class="fa-regular fa-thumbs-up liked-Btn liked" id="{{$post->id}}"></i>
                        @endif
                        <p>{{$post->likes->count()}}</p>
                    </div>
                </div>
                <div class = "w-1/2">
                    <div>
                        @if($post->choices->where('choiceCategory_id', 1)->isEmpty())
                        <p>やってみたい0%</p>
                        @else
                        <p>やってみたい{{round($post->choices->where('choiceCategory_id', 1)->count()/$post->choices->count(),2)*100}}%</p>
                        @endif
                    </div>
                     <div>
                        @if($post->choices->where('choiceCategory_id', 2)->isEmpty())
                        <p>やりたくない0%</p>
                        @else
                        <p>やりたくない{{round($post->choices->where('choiceCategory_id', 2)->count()/$post->choices->count(),2)*100}}%</p>
                        @endif
                    </div>
                     <div>
                        @if($post->choices->where('choiceCategory_id', 3)->isEmpty())
                        <p>やった0%</p>
                        @else
                        <p>やった{{round($post->choices->where('choiceCategory_id', 3)->count()/$post->choices->count(),2)*100}}%</p>
                        @endif
                    </div>
                     <div>
                        @if($post->choices->where('choiceCategory_id', 4)->isEmpty())
                        <p>特になし0%</p>
                        @else
                        <p>特になし{{round($post->choices->where('choiceCategory_id', 4)->count()/$post->choices->count(),2)*100}}%</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
     <div>{{ $posts->links() }}</div>
    
</x-app-layout>