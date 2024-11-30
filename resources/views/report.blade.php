<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container m-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Report Proses Ozon di ruang
                        ozonator</h2>
                    <div class="grid md:grid md:grid-cols-2 lg:grid-cols-4  gap-4">
                     <div class="card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 1</div>
                                    <input type="checkbox">
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
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 2</div>
                                    <input type="checkbox">
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
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 3</div>
                                    <input type="checkbox">
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
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <div>train 4</div>
                                    <input type="checkbox">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
