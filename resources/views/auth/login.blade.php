<x-guest-layout>
    <x-slot name="title">
        Login
    </x-slot>

    <div class="box">
        <h1>Login</h1>
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <x-validation-message name="email"/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <x-validation-message name="password"/>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

</x-guest-layout>