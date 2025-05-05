@if (session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
        <strong>{{ session('error') }}</strong>
    </div>
@endif
