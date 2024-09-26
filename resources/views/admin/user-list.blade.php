@extends('admin.layouts.admin-header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <!-- <h4 class="card-title">Striped Table</h4>
            <p class="card-description"> Add class <code>.table-striped</code>
            </p> -->
            <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10, 
                ajax: {
                    url: '{{ route('userData') }}',
                    data: function (d) {
                        d.column = d.order[0].column;
                        d.dir = d.order[0].dir;
                        d.search = d.search.value;
                    }
                },
                columns: [
                    { data: 'id', name: 'id' , orderable: false, searchable: false},
                    { data: 'name', name: 'name' , orderable: false, searchable: false},
                    { data: 'email', name: 'email' , orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

        });
    </script>
@endSection