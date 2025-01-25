<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trafigura Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="relative bg-[#0e1624] flex justify-center items-center min-h-screen text-white font-sans">

  <!-- Background Image extending up to the subtitle -->
  <div class="absolute bottom-0 left-0 w-full h-2/3 bg-cover bg-bottom opacity-70" style="background-image: url('https://placehold.co/800x400');"></div>

  <!-- Container -->
  <div class="w-full max-w-md px-8 py-12 bg-gradient-to-b from-transparent to-[#111827] rounded-lg shadow-lg text-center relative z-10">
    
    <!-- Title -->
    <h1 class="text-4xl font-bold mb-6">Trafigura</h1>
    
    <!-- Subtitle -->
    <p class="text-base mb-8">We connect vital resources to power and build the world</p>

    <!-- Form -->
    <form>
      <!-- Mobile Number -->
      <div class="mb-6">
        <label class="block text-sm mb-2 text-gray-400" for="mobile">Mobile number</label>
        <input type="tel" id="mobile" placeholder="Enter your Mobile number" class="w-full p-3 bg-[#111827] border border-gray-600 rounded-full text-gray-200 placeholder-gray-500 focus:outline-none focus:border-gray-500">
      </div>

      <!-- Password -->
      <div class="mb-8">
        <label class="block text-sm mb-2 text-gray-400" for="password">Password</label>
        <input type="password" id="password" placeholder="Password ( ≥6 characters )" class="w-full p-3 bg-[#111827] border border-gray-600 rounded-full text-gray-200 placeholder-gray-500 focus:outline-none focus:border-gray-500">
      </div>

      <!-- Login Button -->
      <button type="submit" class="w-full py-3 mb-6 text-lg font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 rounded-full hover:from-blue-600 hover:to-purple-600">Login</button>
    </form>

    <!-- Signup Link -->
    <p class="text-sm text-gray-400">Already have an account ? <a href="#" class="text-blue-500 hover:underline">Sign up</a></p>
  </div>

</body>
</html>