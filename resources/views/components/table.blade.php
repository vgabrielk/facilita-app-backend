@props([
    'headers' => [],
    'rows' => [],
    'editRoute' => '',
])

<div class="overflow-x-auto bg-white rounded-lg shadow-lg">
    <table class="min-w-full table-auto">
        <thead>
        <tr class="bg-gray-100 text-gray-700">
            @foreach($headers as $header)
                <th class="px-6 py-3 text-left">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @forelse($rows as $row)
            @if(isset($row['id']))
                <tr class="border-t border-gray-200 cursor-pointer hover:bg-gray-200"
                    onclick="window.location='{{ route($editRoute, $row['id']) }}'">
                    @foreach($row['cells'] as $cell)
                        <td class="px-6 py-4">{{ $cell }}</td>
                    @endforeach
                </tr>
            @else
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center text-red-500">ID não encontrado!</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center text-gray-500 py-4">Nenhum registro encontrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($rows instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="p-4">
            {{ $rows->links() }}
        </div>
    @endif
</div>
