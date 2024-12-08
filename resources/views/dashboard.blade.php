<x-app-layout>
    <div class="container" style="text-align: center; margin-top:50px">
        <h2>Monitoring Intensitas Lampu UV <br> secara real time</h2>
        <div class="grid grid-cols-4 gap-3">
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 1
                </div>
                <div class="card-body">
                    <h1><span id = "train1">{{ $latesTrain1 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 2
                </div>
                <div class="card-body">
                    <h1><span id = "train2">{{ $latesTrain2 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 3
                </div>
                <div class="card-body">
                    <h1><span id = "train3">{{ $latesTrain3 }}</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 4
                </div>
                <div class="card-body">
                    <h1><span id = "train4">{{ $latesTrain4 }}</span> </h1>
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
