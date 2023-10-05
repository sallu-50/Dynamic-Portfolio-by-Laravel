<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <!-- Include the Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-red-500 text-2xl font-semibold">Sallu-50</a>

            <!-- Mobile Menu Button (hidden on larger screens) -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-black">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu (hidden on smaller screens) -->
            <ul class="hidden md:flex space-x-8 font-bold text-lg">
                <li><a href="#" class="text-black">Home</a></li>
                <li><a href="#" class="text-black">About</a></li>
                <li><a href="#" class="text-black">Services</a></li>
                <li><a href="#" class="text-black">Contact</a></li>
            </ul>

            <a href="#"
                class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">
                <button>About me</button>
            </a>
        </div>

        <!-- Mobile Menu (hidden on larger screens) -->
        <div class="hidden md:hidden" id="mobile-menu">
            <ul class="bg-blue-500">
                <li><a href="#" class="block text-white py-2 px-4">Home</a></li>
                <li><a href="#" class="block text-white py-2 px-4">About</a></li>
                <li><a href="#" class="block text-white py-2 px-4">Services</a></li>
                <li><a href="#" class="block text-white py-2 px-4">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content goes here -->
    <!-- About Me Section -->
    <!-- About Me Section -->
    @if ($information)
        <section class=" bg-gray-200">
            <div class="container mx-auto flex flex-col md:flex-row items-center">
                <!-- Left Side: Name and Title (Responsive Order) -->
                <div class="md:w-1/3 md:order-2 px-8">
                    <h6 class="text-red-500 mb-4">GET EVERY SINGLE SOLUTION</h6>
                    <h2 class="text-4xl font-bold mb-4">{{ $information->name }}</h2>
                    <p class="text-gray-600 font-bold">{{ $information->title }}</p>

                    <p class="mt-4">{{ $information->description }}</p>
                    <a href="#"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out mt-4">
                        <button>Learn More</button>
                    </a>
                    <a href="#"
                        class="inline-block bg-gray-200 border border-red-300 text-red-500 hover:bg-red-500 hover:text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out mt-4">
                        <button>Learn More</button>
                    </a>
                </div>

                <!-- Right Side: Picture (Responsive Order) -->
                <div class="md:w-1/2 md:order-1 md:pb-14">
                    <img src="{{ $information->url() }}" alt="Your Picture"
                        class="w-[600px] h-auto shadow-black rounded-full md:ml-12">


                </div>
            </div>
        </section>
    @endif


    <!-- Portfolio Section -->
    <section class="py-10">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-6 text-center">My Portfolio</h2>

            <!-- Portfolio Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Portfolio Item 1 -->

                @foreach ($portfolio as $allshow)
                    <div class="bg-gray-300 rounded-lg shadow-inherit p-4">
                        <img src="{{ $allshow->url() }}" alt="Portfolio Item 1"
                            class="w-full h-[300px] rounded-lg mb-4">
                        <h3 class="text-xl font-semibold">{{ $allshow->name }}</h3>
                        <p class="text-gray-600 ">{{ $allshow->description }}</p>
                        {{-- <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Learn More</a> --}}
                    </div>
                @endforeach



            </div>
        </div>
    </section>


    <section class="py-10 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-6 text-center">Skills </h2>

            <!-- Skills Ratings Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($skills as $skill)
                    <!-- Skill 1 -->
                    <div class="bg-gray-300 rounded-lg shadow-lg p-4">
                        <h3 class="text-xl font-semibold text-center">{{ $skill->title }}</h3>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                @foreach ($skill->skills as $name)
                                    <span class="text-gray-600  font-bold">{{ $name }}</span>
                                @endforeach
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Contact Section -->

    <!-- Contact Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-6 text-center">Contact Me</h2>

            {{-- error or success message start --}}
            <!-- Contact Form -->
            <div class="flex justify-center items-center">

                <!-- Center-aligned Contact Form -->
                <div class="w-full md:w-1/2 p-4 bg-gray-300 shadow-lg rounded-lg">
                    <form action="{{ route('contact.store') }}" method="post">

                        {{-- error or success message start --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="close-alert">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 1 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L11.414 10l3.293-3.293a1 1 0 0 0 0-1.414z" />
                                    </svg>
                                </span>
                            </div>
                        @elseif(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Success!</strong>
                                {{ session('success') }}
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="close-alert">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 1 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L11.414 10l3.293-3.293a1 1 0 0 0 0-1.414z" />
                                    </svg>
                                </span>
                            </div>

                        @endif
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your Name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold">Email</label>
                            <input type="email" id="email" name="email" placeholder="Your Email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-semibold">Message</label>
                            <textarea id="message" name="message" rows="4" placeholder="Your Message"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto">
            <div class="md:flex md:justify-between">
                <!-- Left Side: Copyright Text -->
                <div class="md:w-1/2 mb-4 md:mb-0">
                    <p>&copy; 2023 Sallu. All Rights Reserved.</p>
                </div>

                <!-- Right Side: Social Media Links -->
                <div class="md:w-1/2">
                    <ul class="flex justify-center md:justify-end space-x-4">
                        <li>
                            <a href="#" class="text-white hover:text-blue-400">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white hover:text-blue-400">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white hover:text-blue-400">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white hover:text-blue-400">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>






    <!-- Include the Tailwind CSS JavaScript for responsive classes -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.js"></script>

    <!-- JavaScript to toggle mobile menu -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        document.getElementById('close-alert').addEventListener('click', function() {
            this.parentNode.style.display = 'none';
        });
    </script>
</body>

</html>
