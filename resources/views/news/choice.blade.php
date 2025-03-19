<x-app-layout>
<p>
    {{ $post->todo }}
</p>
<form method="post" action="/posts/{{ $post->id }}/choice/store">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <select name="choiceCategory_id">
    @foreach($choiceCategories as $choiceCategory)
    <option value="{{ $choiceCategory->id }}">
        {{ $choiceCategory->name }}
        </option>
    @endforeach
    </select>
    <input type="submit" value="送信">
</form>
</x-app-layout>