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
                                        :value="old('train')" required autofocus>
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

                    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2.5 mt-4">
                        @foreach ($latestReports as $train => $report)
                            {{-- <tr>
                                <td>Train {{ $train }}</td>
                                <td>
                                    @if ($report)
                                        {{ $report->pompa_pre_ozon }} - {{ $report->created_at }}
                                    @else
                                        Tidak ada data.
                                    @endif
                                </td>
                            </tr> --}}


                            <div class=" card mb-3">
                                <div class="card-header">
                                    <div class="flex justify-between">
                                        <div>train {{ $train }}</div>
                                    </div>
                                </div>
                                <div class="card-body relative">
                                    @if ($report)
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->pompa_pre_ozon }}<span class="text-sm absolute">%</span></h2>
                                        <h1>Setingan Pompa pre ozon</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->pompa_transfer }}<span class="text-sm absolute">%</span></h2>
                                        <h1>Setingan Pompa Transfer</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->step }}</h2>
                                        <h1>Step</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_static }}<span class="text-sm absolute">ppm</span>
                                        </h2>
                                        <h1>kadar Ozon Static Mixer</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_ft }}<span class="text-sm absolute">ppm</span>
                                        </h2>
                                        <h1>Kadar Ozon FT</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->kadar_ozon_analyzer }}<span class="text-sm absolute">mg/I</span>
                                        </h2>
                                        <h1>Kadar Ozon Analyzer</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->airflow }}<span class="text-sm absolute">m3/h</span>
                                        </h2>
                                        <h1>Air Flow</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->cooling_water }}<span class="text-sm absolute">L/H</span>
                                        </h2>
                                        <h1>Cooling Water</h1>
                                    </div>
                                    <div class="mb-2">
                                        <div class="flex gap-2">
                                            <div class="middle">
                                                <h2 class="font-bold text-3xl">{{ $report->set_level_ft_middle }}</h2>
                                                <p class="text-xs font-bold">Middle</p>
                                            </div>
                                            <div class="High">
                                                <h2 class="font-bold text-3xl">{{ $report->set_level_ft_high }}</h2>
                                                <p class="text-xs font-bold">High</p>
                                            </div>
                                        </div>
                                        <h1>Set Level FT</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->lampu_uv }}<span class="text-sm absolute"></span></h2>
                                        <h1>Lampu UV</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->voltase }}<span class="text-sm absolute">volt</span>
                                        </h2>
                                        <h1>Voltase</h1>
                                    </div>
                                    <div class="mb-2">
                                        <h2 class="font-bold text-3xl">{{ $report->ampere }}<span class="text-sm absolute">A</span></h2>
                                        <h1>Ampere</h1>
                                    </div>
                                    @else
                                    <h2 class="text-center">Tidak Ada Report</h2>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class=" card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 2</div>
                                </div>
                            </div>
                            <div class="card-body relative">
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">75<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa pre ozon</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">90<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa Transfer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">5</h2>
                                    <h1>Step</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,28<span class="text-sm absolute">ppm</span></h2>
                                    <h1>kadar Ozon Static Mixer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,19<span class="text-sm absolute">ppm</span></h2>
                                    <h1>Kadar Ozon FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,20<span class="text-sm absolute">mg/I</span></h2>
                                    <h1>Kadar Ozon Analyzer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">1,5<span class="text-sm absolute">m3/h</span></h2>
                                    <h1>Air Flow</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">652<span class="text-sm absolute">L/H</span></h2>
                                    <h1>Cooling Water</h1>
                                </div>
                                <div class="mb-2">
                                    <div class="flex gap-2">
                                        <div class="middle">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">Middle</p>
                                        </div>
                                        <div class="High">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">High</p>
                                        </div>
                                    </div>
                                    <h1>Set Level FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">99<span class="text-sm absolute"></span></h2>
                                    <h1>Lampu UV</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">395<span class="text-sm absolute">volt</span></h2>
                                    <h1>Voltase</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,8<span class="text-sm absolute">A</span></h2>
                                    <h1>Ampere</h1>
                                </div>
                            </div>
                        </div>
                        <div class=" card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 3</div>
                                </div>
                            </div>
                            <div class="card-body relative">
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">75<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa pre ozon</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">90<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa Transfer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">5</h2>
                                    <h1>Step</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,28<span class="text-sm absolute">ppm</span></h2>
                                    <h1>kadar Ozon Static Mixer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,19<span class="text-sm absolute">ppm</span></h2>
                                    <h1>Kadar Ozon FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,20<span class="text-sm absolute">mg/I</span></h2>
                                    <h1>Kadar Ozon Analyzer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">1,5<span class="text-sm absolute">m3/h</span></h2>
                                    <h1>Air Flow</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">652<span class="text-sm absolute">L/H</span></h2>
                                    <h1>Cooling Water</h1>
                                </div>
                                <div class="mb-2">
                                    <div class="flex gap-2">
                                        <div class="middle">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">Middle</p>
                                        </div>
                                        <div class="High">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">High</p>
                                        </div>
                                    </div>
                                    <h1>Set Level FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">99<span class="text-sm absolute"></span></h2>
                                    <h1>Lampu UV</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">395<span class="text-sm absolute">volt</span></h2>
                                    <h1>Voltase</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,8<span class="text-sm absolute">A</span></h2>
                                    <h1>Ampere</h1>
                                </div>
                            </div>
                        </div>
                        <div class=" card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 4</div>
                                </div>
                            </div>
                            <div class="card-body relative">
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">75<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa pre ozon</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">90<span class="text-sm absolute">%</span></h2>
                                    <h1>Setingan Pompa Transfer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">5</h2>
                                    <h1>Step</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,28<span class="text-sm absolute">ppm</span></h2>
                                    <h1>kadar Ozon Static Mixer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,19<span class="text-sm absolute">ppm</span></h2>
                                    <h1>Kadar Ozon FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,20<span class="text-sm absolute">mg/I</span></h2>
                                    <h1>Kadar Ozon Analyzer</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">1,5<span class="text-sm absolute">m3/h</span></h2>
                                    <h1>Air Flow</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">652<span class="text-sm absolute">L/H</span></h2>
                                    <h1>Cooling Water</h1>
                                </div>
                                <div class="mb-2">
                                    <div class="flex gap-2">
                                        <div class="middle">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">Middle</p>
                                        </div>
                                        <div class="High">
                                            <h2 class="font-bold text-3xl">75</h2>
                                            <p class="text-xs font-bold">High</p>
                                        </div>
                                    </div>
                                    <h1>Set Level FT</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">99<span class="text-sm absolute"></span></h2>
                                    <h1>Lampu UV</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">395<span class="text-sm absolute">volt</span></h2>
                                    <h1>Voltase</h1>
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-3xl">0,8<span class="text-sm absolute">A</span></h2>
                                    <h1>Ampere</h1>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
