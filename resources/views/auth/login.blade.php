<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="background-color: #F3EEE7;">
        <div class="max-w-md w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <a href="/" class="block">
                        <img src="{{ asset('storage/images/amman.png') }}" alt="Amman Transit" class="w-20 h-20 object-contain mx-auto" />
                    </a>
                </div>
                <h2 class="mt-4 text-3xl font-bold" style="color: #1F594A;">
                    Welcome Back
                </h2>
                <p class="mt-2 text-sm" style="color: #1F594A; opacity: 0.7;">
                    Sign in to your account to continue
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form Container -->
            <div class="bg-white rounded-xl shadow-xl p-8 border-t-4" style="border-top-color: #3BB4B4;">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="group">
                        <label for="email" class="block text-sm font-medium mb-2 transition-colors group-focus-within:text-opacity-100" style="color: #1F594A;">
                            {{ __('Email Address') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 opacity-50" style="color: #1F594A;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   value="{{ old('email') }}"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-opacity-50 focus:border-transparent transition-all duration-200 placeholder-gray-400"
                                   placeholder="Enter your email address">
                        </div>
                        @if ($errors->get('email'))
                            <div class="mt-2 text-sm" style="color: #dc2626;">
                                @foreach ($errors->get('email') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="group">
                        <label for="password" class="block text-sm font-medium mb-2 transition-colors group-focus-within:text-opacity-100" style="color: #1F594A;">
                            {{ __('Password') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 opacity-50" style="color: #1F594A;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-opacity-50 focus:border-transparent transition-all duration-200 placeholder-gray-400"
                                   placeholder="Enter your password">
                        </div>
                        @if ($errors->get('password'))
                            <div class="mt-2 text-sm" style="color: #dc2626;">
                                @foreach ($errors->get('password') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" 
                                   type="checkbox" 
                                   class="rounded border-gray-300 shadow-sm focus:ring-2 focus:ring-opacity-50 transition-all duration-200" 
                                   style="color: #3BB4B4; focus:ring-color: #3BB4B4;" 
                                   name="remember">
                            <span class="ml-2 text-sm" style="color: #1F594A;">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium transition-colors duration-200 hover:underline" 
                               style="color: #3BB4B4;" 
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="space-y-4">
                        <button type="submit" 
                                class="w-full py-3 px-4 rounded-lg font-medium text-white transition-all duration-200 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-opacity-50 bg-gradient-to-r from-green-800 to-teal-500 hover:from-green-900 hover:to-teal-600 focus:ring-teal-300">
                            {{ __('Sign In') }}
                        </button>

                        <div class="text-center">
                            <p class="text-sm" style="color: #1F594A; opacity: 0.7;">
                                Don't have an account?
                                <a href="{{ route('register') }}" 
                                   class="font-medium transition-colors duration-200 hover:underline"
                                   style="color: #3BB4B4;">
                                    {{ __('Create account') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-xs" style="color: #1F594A; opacity: 0.5;">
                    
                </p>
            </div>
        </div>
    </div>

    <style>
        /* Custom CSS variables for consistent theming */
        :root {
            --transit-green: #1F594A;
            --transit-aqua: #3BB4B4;
            --transit-sand: #F3EEE7;
        }
        
        /* Custom focus styles for better accessibility */
        input:focus {
            --tw-ring-color: #3BB4B4 !important;
            border-color: #3BB4B4 !important;
            box-shadow: 0 0 0 3px rgba(59, 180, 180, 0.1) !important;
        }
        
        /* Checkbox styling */
        input[type="checkbox"]:checked {
            background-color: #3BB4B4;
            border-color: #3BB4B4;
        }
        
        input[type="checkbox"]:focus {
            --tw-ring-color: #3BB4B4 !important;
            box-shadow: 0 0 0 3px rgba(59, 180, 180, 0.1) !important;
        }
        
        /* Smooth label animations */
        .group:focus-within label {
            transform: translateY(-2px);
            transition: transform 0.2s ease-in-out;
        }
        
        /* Enhanced mobile responsiveness */
        @media (max-width: 640px) {
            .max-w-md {
                max-width: 95%;
                margin: 0 auto;
            }
            
            .space-y-8 > * + * {
                margin-top: 1.5rem;
            }
            
            .p-8 {
                padding: 1.5rem;
            }
        }
        
        /* Improved button accessibility */
        button:focus-visible {
            outline: 2px solid #3BB4B4;
            outline-offset: 2px;
        }
        
        /* Error message styling */
        .text-red-600 {
            color: #dc2626;
        }
        
        /* Link hover effects */
        a:hover {
            text-decoration-color: #3BB4B4;
        }

        /* Session status styling */
        .mb-4 {
            margin-bottom: 1rem;
        }
    </style>
</x-guest-layout>