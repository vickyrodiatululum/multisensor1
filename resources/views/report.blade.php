<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-3 px-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Report Proses Ozon di ruang
                        ozonator</h2>
                    {{-- untuk membuka modal --}}
                    <x-primary-button x-data="" x-on:click="$dispatch('open-modal', 'create-report')">
                        {{ __('Create Report') }}
                    </x-primary-button>

                    <x-modal name="create-report" :show="$errors->any()" focusable>
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900">{{ __('Create Report') }}</h2>
                            <form method="post" action="{{ route('report.store') }}" class="mt-6">
                                @csrf
                                <div>
                                    <x-input-label for="train" :value="__('Train')" />
                                    <select id="train" name="train" type="number" step="any"
                                        class="mt-1 block rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 shadow-sm w-full"
                                        required autofocus>
                                        <option value="1">Train 1</option>
                                        <option value="2">Train 2</option>
                                        <option value="3">Train 3</option>
                                        <option value="4">Train 4</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('train')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="pompa_pre_ozon" :value="__('Setingan Pompa Pre Ozon')" />
                                    <x-text-input id="pompa_pre_ozon" name="pompa_pre_ozon" type="number"
                                        step="any" step="any" class="mt-1 block w-full" :value="old('pompa_pre_ozon')"
                                        required autofocus />
                                    <x-input-error :messages="$errors->get('pompa_pre_ozon')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="pompa_transfer" :value="__('Pompa Transfer')" />
                                    <x-text-input id="pompa_transfer" name="pompa_transfer" type="number"
                                        step="any" class="mt-1 block w-full" :value="old('pompa_transfer')" required autofocus />
                                    <x-input-error :messages="$errors->get('pompa_transfer')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="step" :value="__('Step')" />
                                    <x-text-input id="step" name="step" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('step')" required autofocus />
                                    <x-input-error :messages="$errors->get('step')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="kadar_ozon_static" :value="__('Kadar Ozon Static')" />
                                    <x-text-input id="kadar_ozon_static" name="kadar_ozon_static" type="number"
                                        step="any" class="mt-1 block w-full" :value="old('kadar_ozon_static')" required
                                        autofocus />
                                    <x-input-error :messages="$errors->get('kadar_ozon_static')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="kadar_ozon_ft" :value="__('Kadar Ozon FT')" />
                                    <x-text-input id="kadar_ozon_ft" name="kadar_ozon_ft" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('kadar_ozon_ft')" required autofocus />
                                    <x-input-error :messages="$errors->get('kadar_ozon_ft')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="kadar_ozon_analyzer" :value="__('Kadar Ozon Analyzer')" />
                                    <x-text-input id="kadar_ozon_analyzer" name="kadar_ozon_analyzer" type="number"
                                        step="any" class="mt-1 block w-full" :value="old('kadar_ozon_analyzer')" required
                                        autofocus />
                                    <x-input-error :messages="$errors->get('kadar_ozon_analyzer')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="airflow" :value="__('Air Flow')" />
                                    <x-text-input id="airflow" name="airflow" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('airflow')" required autofocus />
                                    <x-input-error :messages="$errors->get('airflow')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="cooling_water" :value="__('Cooling Water')" />
                                    <x-text-input id="cooling_water" name="cooling_water" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('cooling_water')" required autofocus />
                                    <x-input-error :messages="$errors->get('cooling_water')" class="mt-2" />
                                </div>
                                <x-input-label>{{ __('Set Level FT') }}</x-input-label>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <x-input-label for="set_level_ft_middle" :value="__('Middle')" />
                                        <x-text-input id="set_level_ft_middle" name="set_level_ft_middle" type="number"
                                            step="any" class="mt-1 block w-full" :value="old('set_level_ft_middle')" required
                                            autofocus />
                                        <x-input-error :messages="$errors->get('set_level_ft_middle')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="set_level_ft_high" :value="__('High')" />
                                        <x-text-input id="set_level_ft_high" name="set_level_ft_high" type="number"
                                            step="any" class="mt-1 block w-full" :value="old('set_level_ft_high')" required
                                            autofocus />
                                        <x-input-error :messages="$errors->get('set_level_ft_high')" class="mt-2" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="lampu_uv" :value="__('Lampu UV')" />
                                    <x-text-input id="lampu_uv" name="lampu_uv" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('lampu_uv')" required autofocus />
                                    <x-input-error :messages="$errors->get('lampu_uv')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="voltase" :value="__('Voltase')" />
                                    <x-text-input id="voltase" name="voltase" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('voltase')" required autofocus />
                                    <x-input-error :messages="$errors->get('voltase')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="Ampere" :value="__('Ampere')" />
                                    <x-text-input id="Ampere" name="ampere" type="number" step="any"
                                        class="mt-1 block w-full" :value="old('Ampere')" required autofocus />
                                    <x-input-error :messages="$errors->get('Ampere')" class="mt-2" />
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-primary-button class="ml-3">
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                    </x-modal>

                    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2.5 my-4">
                        @foreach ($latestReports as $train => $report)
                            <div class=" card mb-3">
                                <div class="card-header">
                                    <div class="flex justify-between">
                                        <div>train {{ $train }}</div>
                                    </div>
                                </div>

                                <div class="card-body relative">
                                        @if ($report)
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->pompa_pre_ozon }}<span
                                                        class="text-sm absolute">%</span></h2>
                                                <h1>Setingan Pompa pre ozon</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->pompa_transfer }}<span
                                                        class="text-sm absolute">%</span></h2>
                                                <h1>Setingan Pompa Transfer</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->step }}</h2>
                                                <h1>Step</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_static }}<span
                                                        class="text-sm absolute">ppm</span>
                                                </h2>
                                                <h1>kadar Ozon Static Mixer</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_ft }}<span
                                                        class="text-sm absolute">ppm</span>
                                                </h2>
                                                <h1>Kadar Ozon FT</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_analyzer }}<span
                                                        class="text-sm absolute">mg/I</span>
                                                </h2>
                                                <h1>Kadar Ozon Analyzer</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->airflow }}<span
                                                        class="text-sm absolute">m3/h</span>
                                                </h2>
                                                <h1>Air Flow</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->cooling_water }}<span
                                                        class="text-sm absolute">L/H</span>
                                                </h2>
                                                <h1>Cooling Water</h1>
                                            </div>
                                            <div class="mb-2">
                                                <div class="flex gap-2">
                                                    <div class="middle">
                                                        <h2 class="font-bold text-3xl">
                                                            {{ $report->set_level_ft_middle }}
                                                        </h2>
                                                        <p class="text-xs font-bold">Middle</p>
                                                    </div>
                                                    <div class="High">
                                                        <h2 class="font-bold text-3xl">
                                                            {{ $report->set_level_ft_high }}
                                                        </h2>
                                                        <p class="text-xs font-bold">High</p>
                                                    </div>
                                                </div>
                                                <h1>Set Level FT</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->lampu_uv }}<span
                                                        class="text-sm absolute"></span></h2>
                                                <h1>Lampu UV</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->voltase }}<span
                                                        class="text-sm absolute">volt</span>
                                                </h2>
                                                <h1>Voltase</h1>
                                            </div>
                                            <div class="mb-2">
                                                <h2 class="font-bold text-3xl">{{ $report->ampere }}<span
                                                        class="text-sm absolute">A</span></h2>
                                                <h1>Ampere</h1>
                                            </div>
                                        @else
                                            <h2 class="text-center">Tidak Ada Report</h2>
                                        @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="log_report">
                        <h1 class="font-bold text-xl mb-4">
                            Log Report
                        </h1>
                        @if ($dataReports && $dataReports->isNotEmpty())
                            @foreach ($dataReports as $train => $reports)
                                <div class="train mb-4">
                                    <h2 class="font-semibold text-xl">Tabel Report Train {{ $train }}</h2>
                                    <div class="table-responsive w-full rounded-md border shadow py-4">
                                        <table class="table table-hover table-striped table-bordered zero-configuration">
                                            <thead class="text-center">
                                                <tr>
                                                    <th rowspan="2">Tanggal & Waktu</th>
                                                    <th rowspan="2">Setingan Pompa pre ozon</th>
                                                    <th rowspan="2">Setingan Pompa Transfer</th>
                                                    <th rowspan="2">Step</th>
                                                    <th rowspan="2">kadar Ozon Static Mixer</th>
                                                    <th rowspan="2">Kadar Ozon FT</th>
                                                    <th rowspan="2">Kadar Ozon Analyzer</th>
                                                    <th rowspan="2">Air Flow</th>
                                                    <th colspan="2">Cooling Water</th>
                                                    <th rowspan="2">Set Level FT</th>
                                                    <th rowspan="2">Lampu UV</th>
                                                    <th rowspan="2">Voltase</th>
                                                    <th rowspan="2">Ampere</th>
                                                    <th rowspan="2">User</th>
                                                </tr>
                                                <tr>
                                                    <th>Middle</th>
                                                    <th>High</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reports as $report)
                                                    <tr>
                                                        <th>{{ $report->created_at }}</th>
                                                        <td>{{ $report->pompa_pre_ozon }}</td>
                                                        <td>{{ $report->pompa_transfer }}</td>
                                                        <td>{{ $report->step }}</td>
                                                        <td>{{ $report->kadar_ozon_static }}</td>
                                                        <td>{{ $report->kadar_ozon_ft }}</td>
                                                        <td>{{ $report->kadar_ozon_analyzer }}</td>
                                                        <td>{{ $report->airflow }}</td>
                                                        <td>{{ $report->cooling_water }}</td>
                                                        <td>{{ $report->set_level_ft_middle }}</td>
                                                        <td>{{ $report->set_level_ft_high }}</td>
                                                        <td>{{ $report->lampu_uv }}</td>
                                                        <td>{{ $report->voltase }}</td>
                                                        <td>{{ $report->ampere }}</td>
                                                        <td>{{ $report->user->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach                            
                        @else
                            <h2 class="text-center">Tidak Ada Log Report</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('plugins/common/common.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/gleek.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

<script src="{{ asset('./plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>