<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Create an Account</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex w-full h-[57vw] overflow-hidden">
        <form action="/register/auth" method="POST" class="w-[50vw] h-screen flex flex-col justify-center px-[15vw]">
            @csrf
            <h2 class="text-[1.8vw] text-[#2B3674] font-semibold">Sign Up</h2>
            <p class="text-[0.9vw] text-[#A3AED0] mt-[0.4vw] mb-[2vw]">
                Please Fill The Information Bellow
            </p>
            {{-- Register FORM --}}
            <label for="email" class="text-biru text-[0.9vw]">
                Name*
            </label>
            <input type="text" name="name" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] mb-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="Type here.." required>
            <label for="email" class="text-biru text-[0.9vw]">
                Email*
            </label>
            <input type="text" name="email" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] mb-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="Ex: mymail@mail.com" required>
            <label for="phone" class="text-biru text-[0.9vw]">
                Phone Number*
            </label>
            <input type="text" name="phone" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] rounded-[1vw] mb-[1vw] text-[0.9vw] outline-none" placeholder="Ex: +62878609XXXXX" required>
            <label for="password" class="text-biru text-[0.9vw]">
                Password*
            </label>
            <input type="password" name="password" class="mt-w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="******" required>
            <input type="submit" value="Sign Up" class="text-[0.9vw] bg-biru text-white w-full h-[3vw] rounded-[1vw] cursor-pointer mt-[2vw] hover:bg-[#8192f4] duration-[0.6s] ease-in-out">
            <p class="text-third text-[0.9vw] mt-[1vw]">Already have an account? <a href="/" class="text-biru">Sign In</a></p>
        </form>
        {{-- Right Background --}}
        <div class="w-[50vw] overflow-hidden bg-black bg-auth rounded-bl-[10vw] flex items-center justify-center">
            <h1 class="text-[6vw] text-white">
                SiPandu
            </h1>
        </div>
    </div>
</body>
</html>