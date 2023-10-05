<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('profile.create') }}"><button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add
                Information
            </button></a>
        <a href="{{ route('portfolio.create') }}"><button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add
                Portfolio
            </button></a>
        <a href="{{ route('skill.create') }}"><button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add
                Skill
            </button></a>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <button class="btn btn-primary">Add Project</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="overflow-x-auto">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="close-alert">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 1 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L11.414 10l3.293-3.293a1 1 0 0 0 0-1.414z" />
                    </svg>
                </span>
            </div>
        @elseif(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                {{ session('success') }}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="close-alert">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 1 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L11.414 10l3.293-3.293a1 1 0 0 0 0-1.414z" />
                    </svg>
                </span>
            </div>

        @endif
        <table class="min-w-full my-6 bg-white border border-gray-300 text-center ">
            <caption class="text-3xl font-bold mb-2">User Message</caption>
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Message</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-slate-100">
                @foreach ($contacts as $contact)
                    <tr class="border border-gray-400">
                        <td class="px-4 py-2">{{ $contact->name }}</td>
                        <td class="px-4 py-2">{{ $contact->message }}</td>
                        <td class="px-4 py-2">{{ $contact->email }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('contact.destroy', $contact) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">delete</button>
                            </form>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script>
        document.getElementById('close-alert').addEventListener('click', function() {
            this.parentNode.style.display = 'none';
        });
    </script>


</x-app-layout>
