<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Log In</title>
      @vite('resources/css/app.css')
  </head>
<body>
  <main class="login w-full h-screen flex justify-center items-center p-4">
    <div class="flex flex-col gap-3 w-full max-w-[450px] border-2 p-4 shadow-lg rounded-lg">
      <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="h-[100px] mx-auto">
      <h1 class="text-3xl text-center font-bold text-black/90 mt-8">Log In</h1>
      @if(session()->get("error"))
        <p class="text-erentRed text-center">{{ session()->get("error") }}</p>
      @endif
      <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <div class="flex flex-col gap-1">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
        </div>
        <div class="flex flex-col gap-1">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="input w-full p-1 rounded-md focus:outline-2 focus:outline-erentGreen" required>
        </div>
        <div>
          <button type="submit" class="w-full mt-4 transition duration-100 ease-in-out text-white px-4 py-2 rounded-md bg-emerald-500">Login</button>
        </div>
        <div>
          <p class="text-center">Don't have account? <a href="{{ route('signup-page') }}" class="text-semibold hover:opacity-90 hover:underline active:opacity-85">Sign Up</a></p>
        </div>
      </form>
    </div>
  </main>
</body>
</html>