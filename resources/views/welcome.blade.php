@include('layout.header')

<!-- .page-inner -->
<div class="page-inner">
    <!-- .page-section -->
    <div class="page-section">
        <!-- .card -->
        <div class="card card-fluid">

            <div class="card-body">

                <!-- .table-responsive -->
                <div class="table-responsive">
                    <!-- .table -->
                    <table id="datatable" class="table w3-hoverable">
                        <!-- thead -->
                        <thead>
                            <tr class="bg-infohead">
                                <th class="align-middle" style="width:15%"> ลำดับ </th>
                                <th class="align-middle" style="width:50%"> ชื่อหมวด (ไทย) </th>
                                <th class="align-middle" style="width:15%"> สถานะ </th>
                                <th class="align-middle" style="width:10%"> กระทำ </th>
                                <th class="align-middle" style="width:10%"> Table </th>

                            </tr>
                        </thead><!-- /thead -->

                        <script>
                            $(document).ready(function() {
                                $('#datatable').DataTable({
                                    ajax: {
                                        url: '{{ route('pagedatajson') }}',
                                        dataSrc: 'page'
                                    },
                                    columns: [{
                                            data: 'page_id'
                                        },
                                        {
                                            data: 'page_name'
                                        },
                                        {
                                            data: 'page_path'
                                        },
                                        {
                                            data: 'page_status',
                                            render: function(data, type, row) {
                                                // สร้าง HTML สำหรับสวิทช์ ON/OFF โดยใช้ข้อมูล 'page_status'
                                                var switcherHtml =
                                                    '<td class="align-middle"><label class="switcher-control switcher-control-success switcher-control-lg">' +
                                                    '<input type="checkbox" class="switcher-input switcher-edit" ' + (
                                                        data == 1 ? 'checked' : '') +
                                                    ' data-page_id="' + row.page_id + '" data-page_status="' + data +
                                                    '">' +
                                                    '<span class="switcher-indicator"></span>' +
                                                    '<span class="switcher-label-on">ON</span>' +
                                                    '<span class="switcher-label-off text-red">OFF</span>' +
                                                    '</label></td>';

                                                return switcherHtml;

                                            },


                                        },
                                        {
                                            data: null,
                                            render: function(data, type, row) {
                                                var editUrl = "{{ route('editpage', ':page_id') }}".replace(
                                                    ':page_id',
                                                    row.page_id);

                                                return '<a href="' + editUrl + '">Edit</a>';
                                            }
                                        }

                                    ],
                                    lengthChange: false,
                                    responsive: true,
                                    info: true,
                                    pageLength: 50,
                                    language: {
                                        info: "ลำดับที่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                                        infoEmpty: "ไม่พบรายการ",
                                        infoFiltered: "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                                        paginate: {
                                            first: "หน้าแรก",
                                            last: "หน้าสุดท้าย",
                                            previous: "ก่อนหน้า",

                                            next: "ถัดไป"
                                        }
                                    },
                                    scrollY: '100%',

                                });


                            });
                            $(document).on('change', '.switcher-input', function() {
                                var page_id = $(this).data('page_id');
                                var page_status = $(this).data('page_status');
                                var changeStatusUrl = '{{ route('changeStatusPage', ['page_id' => ':page_id']) }}';
                                changeStatusUrl = changeStatusUrl.replace(':page_id', page_id);
                                $.get(changeStatusUrl, function(response) {
                                    if (response.message) {
                                        console.log(response.message);
                                    }
                                });
                            });

                        </script>

                        <script></script>
                    </table><!-- /.table -->
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.page-section -->

    <style>
        .loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
        }

        .loader-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        /* Add your CSS animation here if needed */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .spinner-border {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            border: 0.25em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
    </style>
    <!-- .page-title-bar -->
    <header class="page-title-bar">
        <!-- floating action -->

        <button type="button" onclick="window.location='{{ route('pageadd') }}'"
            class="btn btn-success btn-floated btn-addwms" data-toggle="tooltip" title="เพิ่ม"><span
                class="fas fa-plus"></span></button>
        <!-- /floating action -->
    </header><!-- /.page-title-bar -->
</div><!-- /.page-inner -->
