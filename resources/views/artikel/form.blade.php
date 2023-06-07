<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($artikel) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="POST" action="{{ isset($artikel) ? route('artikel.update', $artikel->id) : route('artikel.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @if(isset($artikel))
                            @method('patch')
                        @endif
                        <div>
                            <x-input-label for="title" value="title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$artikel->title ?? old('title')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="desc" value="desc" />
                           <x-textarea-input id="desc" name="desc" class="mt-1 block w-full" required autofocus>{{ $artikel->desc ?? old('desc') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                        </div>


                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>