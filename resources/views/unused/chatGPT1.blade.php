<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Laravel Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Main Layout -->
    <div x-data="{ open: false }" class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <nav class="bg-white shadow-md p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-700">Book Haven</h1>
            <button @click="open = !open" class="text-gray-700 p-2 focus:outline-none">
                <svg x-show="!open" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <!-- Drawer Sidebar -->
        <aside x-show="open" @click.away="open = false"
            class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg transform transition-transform"
            x-transition:enter="transition-transform ease-in-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition-transform ease-in-out duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Menu</h2>
                <ul class="space-y-4">
                    <li><a href="#" class="block text-gray-600 hover:text-gray-900">Dashboard</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-gray-900">My Books</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-gray-900">Settings</a></li>
                    <li><a href="#" class="block text-gray-600 hover:text-gray-900">Logout</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="max-w-4xl mx-auto space-y-6">

                <!-- Welcome Box -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800">Welcome Back, Reader!</h2>
                    <p class="text-gray-600 mt-2">Continue your reading journey and explore new books.</p>
                </div>

                <!-- Book Reading Progress -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Reading Progress</h3>
                    <div class="mt-4 space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">The Great Gatsby</span>
                            <span class="text-gray-600">70%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 70%;"></div>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Atomic Habits</span>
                            <span class="text-gray-600">40%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 40%;"></div>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">1984</span>
                            <span class="text-gray-600">90%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-500 h-2 rounded-full" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>

                <!-- More Sections Can Be Added -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Discover New Books</h3>
                    <p class="text-gray-600 mt-2">Find new recommendations based on your reading preferences.</p>
                </div>

            </div>
        </main>

    </div>

</body>
</html>
