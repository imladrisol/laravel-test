@props(['name', 'type' => 'text'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">
        {{ ucwords($name) }}
    </label>

    @if ($type == 'textarea')
        <textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" required>{{old($name)}}</textarea>
    @elseif ($type == 'select')
        <select name="{{ $name }}" id="{{ $name }}" value="{{old($name)}}" required>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{$category->id}}" {{old($name) == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
            @endforeach
        </select>
    @else
        <input class="border border-gray-400 p-2 w-full" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{old($name)}}" required>
    @endif

    @error($name)
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>
