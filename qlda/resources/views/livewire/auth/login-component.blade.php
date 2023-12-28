<!-- resources/views/livewire/auth/unified-login-component.blade.php -->
@section('title')
    Sinh viên
@endsection
<div>
    <!-- Your login form HTML goes here -->
    <form wire:submit.prevent="login">
        <!-- Email, Password, UserType fields go here -->
        <input type="email" wire:model="email">
        <input type="password" wire:model="password">
        <select wire:model="userType">
            <option value="admin">Admin</option>
            <option value="giangvien">Giangvien</option>
            <option value="sinhvien">Sinhvien</option>
        </select>
        <button type="submit">Login</button>
    </form>
</div>
