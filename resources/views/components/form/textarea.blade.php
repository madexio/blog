@props(["name", "rows"=>2, "cols"=>10, "placeholder"=>"Input here"])
<div>
    <x-form.label name="{{$name}}" />
    <textarea class="border border-gray-400 p-2 w-full"
              name="{{$name}}"
              id="{{$name}}"
              rows="{{$rows}}"
              cols="{{$cols}}"
              placeholder="{{$placeholder}}"
              required>{{old($name)}}</textarea>
    <x-form.error name={{$name}}/>
</div>