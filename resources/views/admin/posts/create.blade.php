<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts"
              method="post"
              enctype="multipart/form-data"
        >
            @csrf
            <div>
                <div class="mb-6 space-y-4">
                    <x-form.input name="title"/>
                    <x-form.input name="slug"/>
                    <x-form.input name="thumbnail" type="file"/>
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name="body" rows="10"/>
                    <x-form.select name="Categories" />

                    <x-basic-button>Publish</x-basic-button>
                </div>
            </div>
        </form>
    </x-setting>

</x-layout>