<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siterians Nexus - Student Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/school-logo.png">
    @vite('resources/css/app.css')
</head>

<body
    class="min-h-screen bg-gradient-to-br from-blue-800 to-blue-900 bg-opacity-90 flex flex-col items-center justify-center p-6"
    style="background-image: url('{{ asset('images/bg.png') }}'); background-size: cover; background-position: center; background-blend-mode: overlay;">
    <!-- Header Section -->
    <div class="text-center mb-8 text-white">
        <h1 class="text-4xl font-bold mb-2 text-[#53BEE4]">SITERIANS NEXUS</h1>
        <h2 class="text-xl">STUDENT PORTAL</h2>
    </div>

    <!-- Login Card -->
    <div class="max-w-md w-full bg-blue-900/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8">
        <div class="flex justify-between items-start mb-8">
            <div class="text-white w-full">
                <h2 class="text-2xl font-semibold mb-8 text-center">LOG IN</h2>

                @if ($errors->any())
                    <div class="mb-4 bg-red-500/20 text-red-200 p-4 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 bg-white/10 rounded-lg border border-blue-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors text-white"
                            placeholder="Enter your email" required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 bg-white/10 rounded-lg border border-blue-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors text-white"
                                placeholder="Enter password" required>
                            <button type="button" id="togglePassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-300 hover:text-blue-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="#" class="text-sm text-blue-300 hover:text-blue-200">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 ease-in-out">
                        LOG IN
                    </button>
                </form>
            </div>

            {{-- <div class="flex-shrink-0 ml-8">
                <img src="{{ asset('images/school-logo.png') }}" alt="School Logo" class="w-28 h-28 object-contain">
            </div> --}}
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-8 text-center text-white">
        <h3 class="text-xl font-semibold">SITERO FRANCISCO MEMORIAL NATIONAL HIGH SCHOOL</h3>
    </div>

    <!-- Toggle Password Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Update icon based on password visibility
            if (type === 'text') {
                this.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                `;
            } else {
                this.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
            }
        });
    </script>
</body>

</html>
