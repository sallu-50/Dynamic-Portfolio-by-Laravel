<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS Form with Image Upload</title>
    <!-- Include Tailwind CSS from a CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-4">

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
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

        <h1 class="text-2xl font-semibold mb-4 text-center">Add Information</h1>
        <a {{ route('dashboard') }}> <x-primary-button>Back To Dashboard</x-primary-button></a>
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-600">Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="Title" class="block text-gray-600">Title:</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Message Textarea -->
            <div class="mb-4">
                <label for="description" class="block text-gray-600">Description:</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Image Upload Input -->
            <div class="mb-4">
                <label for="image" class="block text-gray-600">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-input">
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Submit
                    Information</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('close-alert').addEventListener('click', function() {
            this.parentNode.style.display = 'none';
        });
    </script>

</body>

</html>
