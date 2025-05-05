@if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
        <strong>{{ session('success') }}</strong>
    </div>
@endif
