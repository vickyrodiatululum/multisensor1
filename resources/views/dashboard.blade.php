<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" style="text-align: center; margin-top: 50px">
        <h2 class="font-bold text-3xl">Monitoring Intensitas Lampu UV <br> Secara Real Time</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text my-4">
            @foreach ($trainData as $train => $data)
                <div class="card min-w-40 max-w-68">
                    <div class="flex justify-between p-2.5 font-semibold text-xl flex-wrap">
                        <h1>Train {{ $train }}</h1>
                        <input type="checkbox" id="checkboxTrain{{ $train }}"
                            {{ $data['status'] == 1 ? 'checked' : '' }}>
                        <label for="checkboxTrain{{ $train }}" class="toggleSwitch"></label>
                    </div>
                    <div class="card-body">
                        <h1 class="font-bold text-5xl">
                            <span id="train{{ $train }}">{{ $data['latest'] }}</span>
                        </h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<!-- Script untuk mengambil data secara real-time -->
<script type="text/javascript">
    $(document).ready(function() {
        function fetchTrainData(trainId) {
            $.get(`/get-train/${trainId}`, function(response) {
                $(`#train${trainId}`).text(response.train);
            }).fail(function() {
                console.error(`Gagal mengambil data Train ${trainId}`);
            });
        }

        // Mengambil data secara real-time setiap 1 detik
        setInterval(function() {
            [1, 2, 3, 4].forEach(fetchTrainData);
        }, 5000);
    });
</script>

<!-- Script untuk menangani perubahan checkbox -->
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            let trainId = $(this).attr('id').replace('checkboxTrain',
            ''); // Ambil nomor train dari ID checkbox
            let status = $(this).is(':checked'); // Status checkbox (true jika dicentang)

            // Kirim data menggunakan AJAX
            $.ajax({
                url: '/update-train-status',
                method: 'POST',
                data: {
                    train: trainId,
                    status: status,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Data berhasil dikirim:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengirim data:', xhr.responseText);
                }
            });
        });
    });
</script>
