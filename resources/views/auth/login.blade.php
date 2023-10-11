<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Login to your account</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="flex w-full h-[57vw] overflow-hidden">
        <div class="w-[50vw] h-screen flex flex-col justify-center px-[15vw]">
            <h2 class="text-[1.8vw] font-semibold text-[#2B3674]">Sign In</h2>
            <p class="text-[0.9vw] text-[#A3AED0] mt-[0.4vw]">
                Please Enter Your Email and Password
            </p>
            <a href="" class="text-[#2B3674] text-[0.9vw] mt-[2vw] w-full h-[3vw] flex items-center justify-center bg-[#F4F7FE] font-semibold">
                <img src="image/google.png" class="mr-[0.8vw] w-[1vw]" alt="">
                Sign in with Google
            </a>
            <div class="w-full my-[2vw] flex items-center justify-center">
                <div class="w-[40%] h-[0.4px] mt-[0.4vw] bg-[#A3AED0]"></div>
                <p class="text-[0.7vw] text-[#A3AED0] mt-[0.4vw] mx-[1vw]">or</p>
                <div class="w-[40%] h-[0.4px] mt-[0.4vw] bg-[#A3AED0]"></div>
            </div>

            {{-- LOGIN FORM --}}
            <label for="email" class="text-secondary text-[0.9vw] font-semibold">
                Email*
            </label>
            <input type="text" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] mb-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="Ex: mymail@mail.com">
            <label for="email" class="text-secondary text-[0.9vw] font-semibold">
                Password*
            </label>
            <input type="password" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="******">
            <div class="my-[1.3vw] flex items-center">
                <input type="checkbox" id="myCheckbox" name="myCheckbox" value="checked" 
                class="mr-[0.6vw] ml-[0.5vw] bg-secondary">
                <label for="myCheckbox" class="text-[0.9vw] text-third">Keep me logged in</label>
            </div>
            <input type="submit" value="Sign In" class="text-[0.9vw] bg-secondary text-white w-full h-[3vw] rounded-[1vw] cursor-pointer">
            <p class="text-third text-[0.9vw] mt-[1vw]">Not registered yet? <a href="" class="text-secondary">Create an Account</a></p>
        </div>

        {{-- Right Background --}}
        <div class="w-[50vw] overflow-hidden bg-black bg-auth rounded-bl-[10vw] flex items-center justify-center">
            <h1 class="text-[6vw] text-white font-semibold">
                SiPandu
            </h1>
        </div>
    </div>
</body>
</html>