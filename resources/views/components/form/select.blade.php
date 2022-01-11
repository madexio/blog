@props(["name", "post"])
<div>
    <x-form.label name="{{$name}}"/>

    <select name="category_id"
            id="category_id">
        @php
            $categories = \App\Models\Category::all();
        @endphp
        @foreach($categories as $category)
            <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>{{ucwords($category->name)}}</option>
        @endforeach
    </select>

    <x-form.error name="{{$name}}"/>
</div>