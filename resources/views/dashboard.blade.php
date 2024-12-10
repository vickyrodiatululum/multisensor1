<x-app-layout>
    <div class="container" style="text-align: center; margin-top:50px">
        <h2 class="font-bold text-3xl">Monitoring Intensitas Lampu UV <br> Secara Real Time</h2>
        <div class="grid grid-cols-4 gap-3 text my-4">
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    Train 1
                </div>
                <div class="card-body">
                    <h1 class="font-bold text-3xl"><span id = "train1">{{ $latesTrain1 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    Train 2
                </div>
                <div class="card-body">
                    <h1 class="font-bold text-3xl"><span id = "train2">{{ $latesTrain2 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    Train 3
                </div>
                <div class="card-body">
                    <h1 class="font-bold text-3xl"><span id = "train3">{{ $latesTrain3 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    Train 4
                </div>
                <div class="card-body">
                    <h1 class="font-bold text-3xl"><span id = "train4">{{ $latesTrain4 }}</span> </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            // Ambil data train1
            $.get('/get-train/1', function(response) {
                $('#train1').text(response.train);
            });

            // Ambil data train2
            $.get('/get-train/2', function(response) {
                $('#train2').text(response.train);
            });

            // Ambil data train3
            $.get('/get-train/3', function(response) {
                $('#train3').text(response.train);
            });

            // Ambil data train3
            $.get('/get-train/4', function(response) {
                $('#train4').text(response.train);
            });
        }, 1000); // Refresh setiap 1 detik
    });
</script>
