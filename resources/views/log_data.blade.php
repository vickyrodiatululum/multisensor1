<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Data') }}
        </h2>
    </x-slot>
    <div class="bg-white rounded max-w-7xl mx-auto p-2 mt-2 shadow">
        <div class="flex justify-end mb-2">
            <x-text-input id="filter-date" name="filter-date" type="date" value="{{ now()->format('Y-m-d') }}"></x-text-input>
        </div>
        <div id="char" class="w-full"></div>
    </div>
    <div class="bg-white rounded max-w-7xl mx-auto p-4 mt-2 shadow">
        <h1 class="font-bold text-2xl mb-4">Lampu UV</h1>
        <div class="md:grid md:grid-cols-2 gap-2.5 w-full">
            @foreach ($dataTrains as $data)
                <div class="train w-full mb-4 card max-h-96">
                    <div class="card-header text-center">
                        <h1 class="font-bold">{{ $data['name'] }}</h1>
                    </div>
                    <div class="card-body mx-auto w-full grid grid-cols-2 md:grid-cols-4 justify-between gap-2">
                        @foreach ([1, 2, 3, 4] as $slot)
                            <div class="lamp text-center">
                                <div class="w-16 mx-auto">
                                    <img src="{{ asset('img/lamp_bulb.png') }}" alt="lamp_bulb" class="object-contain">
                                </div>
                                <h2 class="text-xl font-bold">
                                    {{ $data['latestLampu'][$slot]->jenis_lampu ?? 'Tidak ada data' }}</h2>
                                <p>{{ $data['latestLampu'][$slot]->pergantian ?? 'Tidak ada data' }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mx-auto mb-2">
                        <x-primary-button x-data=""
                            x-on:click="$dispatch('open-modal', 'change-{{ Str::slug($data['name']) }}')">
                            Ganti lampu
                        </x-primary-button>
                        <x-modal name="change-{{ Str::slug($data['name']) }}" :show="$errors->any()" focusable>
                            <div class="p-6">
                                <h2 class="text-lg font-medium text-gray-900">Pergantian Lampu</h2>
                                <form method="post"
                                    action="{{ route('log_data.train', ['train' => Str::slug($data['name'])]) }}"
                                    class="mt-6">
                                    @csrf
                                    <div>
                                        <x-input-label for="pilih_lampu" :value="__('Pilih Lampu')" />
                                        <select id="pilih_lampu" name="pilih_lampu"
                                            class="mt-1 block rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm w-full"
                                            required>
                                            <option value="1">Lampu 1</option>
                                            <option value="2">Lampu 2</option>
                                            <option value="3">Lampu 3</option>
                                            <option value="4">Lampu 4</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('pilih_lampu')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="jenis_lampu" :value="__('Jenis Lampu')" />
                                        <x-text-input id="jenis_lampu" name="jenis_lampu" type="text"
                                            class="mt-1 block w-full" :value="old('jenis_lampu')" required />
                                        <x-input-error :messages="$errors->get('jenis_lampu')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="pergantian" :value="__('Tanggal Pergantian')" />
                                        <x-text-input id="pergantian" name="pergantian" type="date"
                                            class="mt-1 block w-full" :value="old('pergantian')" required />
                                        <x-input-error :messages="$errors->get('pergantian')" class="mt-2" />
                                    </div>
                                    <p>Pastikan kembali data sesuai</p>
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                                        <x-primary-button class="ml-3">
                                            {{ __('Simpan') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </x-modal>
                    </div>
                </div>
                <div class="card mx-auto h-60 overflow-auto mb-4">
                    <x-train-table :trainData="$data['train']" :trainName="$data['name']" />
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    var options = {
        chart: {
            type: 'area'
        },
        series: [],
        xaxis: {
            categories: []
        }
    };

    var chart = new ApexCharts(document.querySelector("#char"), options);
    chart.render();

    // Fungsi untuk mengambil data dari server berdasarkan tanggal dan memperbarui chart
    function fetchDataAndUpdateChart(date) {
        $.ajax({
            url: '/chart-data',
            method: 'GET',
            data: { date: date },
            success: function(response) {
                chart.updateOptions({
                    series: [
                        { name: 'Train 2', data: response.train2 },
                        { name: 'Train 3a', data: response.train3a },
                        { name: 'Train 3b', data: response.train3b },
                        { name: 'Train 4', data: response.train4 }
                    ],
                    xaxis: {
                        categories: response.categories
                    }
                });
            },
            error: function() {
                console.error('Gagal mengambil data chart.');
            }
        });
    }

    // Jalankan fungsi saat halaman pertama kali dimuat dengan tanggal default
    fetchDataAndUpdateChart($('#filter-date').val());

    // Event untuk memuat ulang chart ketika tanggal dipilih
    $('#filter-date').on('change', function () {
        let selectedDate = $(this).val();
        fetchDataAndUpdateChart(selectedDate);
    });
</script>

