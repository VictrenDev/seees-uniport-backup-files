<x-layout>
    <main>
        <header class="header">
            <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Register</h1>
            <p class="responsive--text">Become a member of SEEES</p>
        </header>
        <div class="container">
            <form method="POST" action="/user">
                @csrf
                <div class="form__container">
                    <div>
                      <label for="name"><b>Full Name</b></label>
                        <input type="text" placeholder="Enter Full Name" name="name" value="{{old('name')}}" required min="3" max="250">
                        @error('name')
                            <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                        @enderror
                    </div>
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
                        <label for="password_confirmation"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                        @error('password_confirmation')
                            <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                        @enderror
                    </div>
                        {{-- <label>
                      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label> --}}
                  
                    <small>By creating an account you agree to our <a href="/privacypolicy" style="color:dodgerblue">Terms & Privacy</a>.</small>
                    <div class="form__clearfix">
                      <button type="submit" class="form__button form__signupbtn">Create account</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>