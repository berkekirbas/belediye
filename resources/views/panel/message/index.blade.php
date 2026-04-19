@extends('layouts.app.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Mesajlar</h5>
        </div>
        <div class="card-body">
            <table id="messageTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Ad & Soyad</th>
                        <th>Konu</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    {{-- yajra ile datatable --}}

    <script>
        $(document).ready(function() {
            $('#messageTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('message') }}',
                columns: [{
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'is_read',
                        name: 'is_read',
                        render: function (data, type, row) {
                            return data == 1 ? '<span class="badge bg-success">Okundu</span>' : '<span class="badge bg-warning"> &#9679; Okunmadı</span>';
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            })


            $(document).on('click', '.btn-read', function () {

            let id = $(this).data('id');
            // mesajı çek
            $.ajax({
                url: '/panel/message/message/' + id,
                type: 'GET',
                success: function (res) {

                    Swal.fire({
                        title: res.title,
                        width: '600px',
                        html: `
                            <p><b>Gönderen:</b> ${res.fullname}</p>
                            <p><b>Email:</b> ${res.email ?? '-'}</p>
                            <hr>
                            <p>${res.content}</p>
                        `,
                        showCancelButton: true,
                        showConfirmButton: res.is_read == 0,
                        confirmButtonText: 'Okundu İşaretle',
                        cancelButtonText: 'Kapat',
                        confirmButtonColor: '#28a745'
                    }).then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: '/panel/message/read/' + id,
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function () {

                                    Swal.fire('Başarılı', 'Mesaj okundu olarak işaretlendi', 'success');
                                    $('#messageTable').DataTable().ajax.reload();

                                }
                            });

                        }

                    });

                }
            });

        });




        });
    </script>
@endsection
