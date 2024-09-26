@extends('admin.layouts.admin-header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <!-- <h4 class="card-title">Striped Table</h4>
            <p class="card-description"> Add class <code>.table-striped</code>
            </p> -->
            <table class="table table-bordered" id="hotels-table">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
            </div>
        </div>
    </div>
</div>
@endSection
@section('scripts')
<script>
        $(function() {
            $('#hotels-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10, 
                ajax: {
                    url: '{{ route('hotelData') }}',
                    data: function (d) {
                        d.column = d.order[0].column;
                        d.dir = d.order[0].dir;
                        d.search = d.search.value;
                    }
                },
                columns: [
                    { data: 'id', name: 'id' , orderable: false, searchable: false},
                    { data: 'name', name: 'name' , orderable: false, searchable: false},
                    { data: 'location', name: 'location' , orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

        });
    </script>
@endSection