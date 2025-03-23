<x-app-layout>
<p>
    {{ $post->todo }}
</p>
<form method="post" action="/posts/{{ $post->id }}/choice/store">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <select name="choiceCategory_id">
        <option value="" disabled {{ old('choiceCategory_id') ? '' : 'selected'}}>選択してください</option>
    @foreach($choiceCategories as $choiceCategory)
    <option value="{{ $choiceCategory->id }}" {{ old('choiceCategory_id') == $choiceCategory->id ? 'selected' : '' }}>
    {{ $choiceCategory->name }}
    </option>
    @endforeach
    </select>
    <input type="submit" value="送信">
</form>
</x-app-layout>