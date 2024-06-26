<x-app-layout>
    <x-heading level="h2">
        <x-slot name="title">
            {{ __('Laporan Data Artikel') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Laporan Data Artikel pada aplikasi') . ' ' . config('app.name') }}
        </x-slot>
    </x-heading>

    <div class="flex flex-col justify-start gap-6 lg:items-end lg:flex-row">
        <a href="{{ route('admins.articles.export', ['format' => 'csv']) }}">
            <x-button variant="outline">
                <i data-lucide="download"></i>
                {{ __('Unduh CSV') }}
            </x-button>
        </a>

        <a href="{{ route('admins.articles.export', ['format' => 'pdf']) }}" target="_blank">
            <x-button variant="outline">
                <i data-lucide="download"></i>
                {{ __('Unduh PDF') }}
            </x-button>
        </a>
    </div>

    <x-table>
        <x-slot name="head">
            <th>{{ __('No') }}</th>
            <th>{{ __('Judul') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Tanggal Dibuat') }}</th>
            <th>{{ __('Dilihat') }}</th>
            <th>{{ __('Deskripsi') }}</th>
        </x-slot>

        <x-slot name="body">
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ \Illuminate\Support\Str::words($article->title, 7) }}</td>
                    <td> <x-badge value="{{ $article->status }}" /> </td>
                    <td> <x-date value="{{ $article->created_at }}" /> </td>
                    <td> <x-badge value="{{ $article->views }}" /> </td>
                    <td>{{ \Illuminate\Support\Str::words($article->excerpt, 7) }}</td>
                </tr>
            @empty
                <tr>
                    <td colSpan="6" class="text-center">{{ __('Tidak ada data') }}</td>
                </tr>
            @endforelse
        </x-slot>
    </x-table>

    {{ $articles->links() }}
</x-app-layout>
