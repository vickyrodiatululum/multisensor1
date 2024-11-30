<x-app-layout>
    <div class="container" style="text-align: center; margin-top:50px">
        <h2>Monitoring Intensitas Lampu UV <br> secara real time</h2>
        <div class="grid grid-cols-3 gap-3">
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 1
                </div>
                <div class="card-body">
                    <h1><span id = "cektrain1">0</span> </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 2
                </div>
                <div class="card-body">
                    <h1><span id = "cektrain2">0</span> </h1>
                </div>
            </div>
            <div class="card>
                <div class="card-header" style="font: size 30px;font-weight:bold">
                    train 3
                </div>
                <div class="card-body">
                    <h1><span id = "cektrain3">0</span> </h1>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            setInterval(function() {
                $("#cektrain1").load("cektrain1.php");
                $("#cektrain2").load("cektrain2.php");
                $("#cektrain3").load("cektrain3.php");
            }, 1000);
        });
    </script>
</x-app-layout>
