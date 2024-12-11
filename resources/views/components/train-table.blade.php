<div class="card-body">
    <div class="card-title">
        <h4>History Lampu UV - {{ $trainName }}</h4>
    </div>
    <div class="table-responsive w-full">
        <table class="table table-hover table-striped table-bordered zero-configuration">
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

<script src="{{ asset('plugins/common/common.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/gleek.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

<script src="{{ asset('./plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>