<x-guest-layout>
    <x-slot name="title">
        Register
    </x-slot>

    <div class="box">
        <h1>Register</h1>
        <form action="{{ route('register.process') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="name" name="name" id="name" class="form-control">
                <x-validation-message name="name"/>
            </div>
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

            <button type="submit">Register</button>
        </form>
    </div>
</x-guest-layout>