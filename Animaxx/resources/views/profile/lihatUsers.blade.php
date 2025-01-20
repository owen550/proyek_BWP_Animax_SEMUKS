@extends('profile/layout')

@section('additionalButton')
<div class="container">
    <h1>Detail Users</h1>

    <!-- CSS Inline untuk pengguliran -->
    <style>
        .table-container {
            max-height: 400px; /* Sesuaikan dengan kebutuhan */
            overflow-y: auto; /* Tambahkan scroll vertikal jika konten melampaui tinggi */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>

    <!-- Wrapper tabel -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            @if ($user->status == 0)
                                <button class="btn btn-success btn-sm update-status" data-id="{{ $user->id }}" data-status="1">
                                    Recovery
                                </button>
                            @else
                                <button class="btn btn-danger btn-sm update-status" data-id="{{ $user->id }}" data-status="0">
                                    Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.update-status').click(function() {
            const userId = $(this).data('id');
            const currentStatus = $(this).data('status');

            $.ajax({
                url: `/update-user-status/${userId}`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        const button = $(`button[data-id="${userId}"]`);
                        button.toggleClass('btn-success btn-danger');
                        button.text(currentStatus == 1 ? 'Delete' : 'Recovery');
                        button.data('status', currentStatus == 1 ? 0 : 1);
                        alert('Status updated successfully!');
                    }
                },
                error: function(error) {
                    alert('Failed to update status!');
                }
            });
        });
    });
</script>
@endsection
