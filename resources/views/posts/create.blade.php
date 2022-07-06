<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Create post!</h1>
            <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
                @csrf

                <x-form-input name='title'></x-form-input>

                <x-form-input name='slug'></x-form-input>

                <x-form-input name='excerpt' type="textarea"></x-form-input>

                <x-form-input name='thumbnail' type="file"></x-form-input>

                <x-form-input name='body' type="textarea"></x-form-input>

                <x-form-input name='category_id' type="select"></x-form-input>


                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-2">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
