@extends('layouts.app.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Talepler & Öneriler</h5>
        </div>
        <div class="card-body">
            <table id="suggestionTable" class="table-responsive table">
                <thead>
                    <tr>
                        <th>Ad & Soyad</th>
                        <th>E-Mail</th>
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
            $('#suggestionTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('suggestion') }}',
                columns: [{
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
            // Talebi çek
            $.ajax({
                url: '/panel/suggestion/suggestion/' + id,
                type: 'GET',
                success: function (res) {

                    Swal.fire({
                        title: 'Gönderilme Tarihi: ' + new Date(res.created_at).toLocaleString(),
                        width: '800px',
                        html: `
                            <hr>
                            <p><b>Gönderen:</b> ${res.fullname}</p>
                            <p><b>TC no:</b> ${res.tc}  -  <b>Email:</b> ${res.email}</p>
                            <p><b>Cinsiyet:</b> ${res.gender}  -  <b>Doğum Tarihi:</b> ${new Date(res.birthdate).toLocaleDateString()}</p>
                            <p><b>Engellilik Durumu:</b> ${res.disability_status == 1 ? 'Engelli' : 'Yok'}  -  <b>Eğitim Durumu:</b> ${res.education_status}</p>
                            <p><b>Mesleği:</b> ${res.job}  -  <b>Cevap Tipi:</b> ${res.answer_type}</p>
                            <p><b>Adres:</b> ${res.address}</p>
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
                                url: '/panel/suggestion/read/' + id,
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function () {

                                    Swal.fire('Başarılı', 'Talep okundu olarak işaretlendi', 'success');
                                    $('#suggestionTable').DataTable().ajax.reload();

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
