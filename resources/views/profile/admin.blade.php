<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.create-account')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">Daftar User</h2>

                    <!-- Table -->
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered zero-configuration" >
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    <script src="{{ asset("plugins/common/common.min.js") }}"></script>
    <script src="{{ asset("js/custom.min.js") }}"></script>
    <script src="{{ asset("js/settings.js") }}"></script>
    <script src="{{ asset("js/gleek.js") }}"></script>
    <script src="{{ asset("js/styleSwitcher.js") }}"></script>

    <script src="{{ asset("./plugins/tables/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("./plugins/tables/js/datatable/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("./plugins/tables/js/datatable-init/datatable-basic.min.js") }}"></script>

