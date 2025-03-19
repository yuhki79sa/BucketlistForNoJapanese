<x-app-layout>
    
    <form action='/achievement/{{$post->id}}/comment' method='POST'>
        @csrf
        <input type='text' name='body' placeholder='感想' value="{{ old('body') }}">
        <p class="body__error" style="color:red">{{ $errors->first('body') }}</p>

        <input type='text' name='URL' placeholder='詳細記事のURLがあれば記入してください' value="{{ old('URL') }}">
        <p class="URL__error" style="color:red">{{ $errors->first('URL') }}</p>

        <input type='submit' value='投稿'>
        
    </form>
    
</x-app-layout>