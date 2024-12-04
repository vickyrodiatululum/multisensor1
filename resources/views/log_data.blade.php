<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Data') }}
        </h2>
    </x-slot>
    <div class="bg-white rounded max-w-7xl mx-auto p-2 mt-2">
        <div id="chart" class="max-w-md"></div>
    </div>
</x-app-layout>

<script>
var options = {
  chart: {
    type: 'area'
  },
  series: [{
    name: 'sales',
    data: [30,40,45,50,49,60,70,91,125]
  },{
    name: 'buy',
    data: [30,40,45,50,49,70,90,80,145]
  },
],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
