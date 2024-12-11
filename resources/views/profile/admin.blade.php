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
                        <table class="table table-hover table-striped table-bordered zero-configuration">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <x-primary-button class="reset-button" data-id="{{ $user->id }}"><i class="fa-solid fa-key"></i></x-primary-button>
                                            <x-danger-button class="delete-button" data-id="{{ $user->id }}"><i class="fa-solid fa-trash"></i></x-danger-button>
                                        </td>
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

<script src="{{ asset('plugins/common/common.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/gleek.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

<script src="{{ asset('./plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('./plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
    // Tombol Delete dengan SweetAlert dan AJAX
    $('.delete-button').on('click', function () {
        let userId = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "Apakah Anda yakin ingin menghapus akun ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/user/${userId}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "Gagal menghapus user.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    // Tombol Reset Password dengan SweetAlert dan AJAX
    $('.reset-button').on('click', function () {
        let userId = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "Apakah Anda yakin ingin mereset password akun ini." + userId,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, reset it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/${userId}/reset`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Password Reset!",
                            text: `The new password is: ${response.newPassword}`,
                            icon: "success"
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: "Error!",
                            text: "Gagal mereset password.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>

