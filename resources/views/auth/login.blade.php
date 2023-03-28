<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inventory Management System</title>
        <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    </head>
    <body>

       <div class="login">
            <div class="login__content">
               
        
                <div class="login__forms">
                    <form class="login__registre" method="post" id="login-in" action="{{route('login')}}">
                            @csrf
                        <h1 class="login__title">Sign In</h1>
    
                        <div class="login__box">
                            <i class='bx bx-envelope login__icon'></i>
                            <input type="email" class="login__input" name="email" placeholder="Email" required="required" value="{{old('email')}}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" class="login__input" name="password" placeholder="Password" required="required" value="{{old('password')}}">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        

                        <a href="{{route('password.request')}}" class="login__forgot">Forgot password?</a>

                        <button class="login__button" type="submit">Login</button>
                         


                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up"><a href="{{ route('register') }}"> Sign Up</span>
                        </div>
                    </form>

          
                </div>
            </div>
        </div>

    </body>
</html>