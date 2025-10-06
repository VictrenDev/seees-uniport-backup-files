<x-layout>
    <main>
        <header class="header">
            <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Login</h1>
            <p class="responsive--text">Login to your SEEES profile</p>
        </header>
        <div class="container">
            <form method="POST" action="/user/authenticate">
                @csrf
                <div class="form__container">
                    <div>
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" value="{{old('email')}}" required>
                        @error('email')
                            <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" value="{{old('password')}}" >
                        @error('password')
                            <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </div>
                    <div class="form__clearfix">
                      <button type="submit" class="form__button form__signupbtn">Login to account</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>