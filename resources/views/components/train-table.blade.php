<div class="card-body">
    <div class="card-title">
        <h4>History Lampu UV - {{ $trainName }}</h4>
    </div>
    <div class="table-responsive w-full">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Lampu UV</th>
                    <th>Tanggal Pergantian</th>
                    <th>Masa Penggunaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainData as $train)
                    <tr>
                        <th>{{ $train->slot }}</th>
                        <td>{{ $train->jenis_lampu }}</td>
                        <td>{{ $train->pergantian }}</td>
                        <td>{{ $train->usia ? $train->usia . ' Hari' : '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
