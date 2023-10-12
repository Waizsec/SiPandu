<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Login to your account</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')

</head>
<body>
    <div class="flex w-full h-[57vw] overflow-hidden">
        <div class="w-[50vw] h-screen flex flex-col justify-center px-[15vw]">
            <h2 class="text-[1.8vw] font-semibold text-[#2B3674]">Cashier</h2>
            <p class="text-[0.9vw] text-[#A3AED0] mt-[0.4vw]">
                Please, Enter your tokens
            </p>

            {{-- LOGIN FORM --}}
            <label for="token" class="text-biru text-[0.9vw] font-semibold mt-[2vw]">
                Tokens*
            </label>
            <input type="text" class="w-full h-[3vw] border-[0.1vw] border-grey-500 placeholder:text-[0.9vw] pl-[1vw] mt-[1vw] mb-[1vw] rounded-[1vw] text-[0.9vw] outline-none" placeholder="Ex: ABHGS312">
            <div class="my-[1.3vw] flex items-center">
                <input type="checkbox" id="myCheckbox" name="myCheckbox" value="checked" 
                class="mr-[0.6vw] ml-[0.5vw] bg-biru">
                <label for="myCheckbox" class="text-[0.9vw] text-third">Keep me logged in</label>
            </div>
            <input type="submit" value="Sign In" class="text-[0.9vw] bg-biru text-white w-full h-[3vw] rounded-[1vw] cursor-pointer">
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