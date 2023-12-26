@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">category sales matrial type</h3>
                                <input type="hidden" id="token_search" value="{{ csrf_token() }}" />
                                {{-- <input type="hidden" id="ajax_search_url" value="{{ route('treasurie.ajax_search') }}" /> --}}
                                <a href="{{ route('admin-view.create') }}" class="btn btn-danger">+ Add
                                    new</a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-4">
                                    <input type="search" id="searchBytext" class="form-control"
                                        placeholder="search by name" />
                                    <br />
                                </div>
                                <div id="ajax_response_searchDiv">
                                    @if (@isset($admins) && !@empty($admins))
                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>
                                                <tr style="background-color:#007bff;">
                                                    <th></th>
                                                    <th>name</th>

                                                    <th>email</th>
                                                    <th>image </th>
                                                    <th>controllers</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if ($admins->count() > 0)
                                                    <?php $i = 0; ?>
                                                    @foreach ($admins as $admin)
                                                        <?php $i++; ?>

                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $admin->name }}</td>
                                                            <td>{{ $admin->email }}</td>

                                                            <td>
                                             <img src="{{asset('backend/assets/uploads/'. $admin->image)}}" alt = "{{$admin->name}}"style="height:50px;width: 50px;">
                                                            </td>




                                                            <td>
                                                                <a class="btn btn-sm btn-primary"
                                                                    href="{{ route('admin-view.edit', $admin->id) }}">edit</a>

                                                                <a href="javascript;" data-toggle="modal"
                                                                    data-target="#productID{{ $admin->id }}"
                                                                    data-placement="button"
                                                                    class="float-left btn btn-sm btn-outline-danger">delete</a>
                                                            </td>



                                                            <div class="modal fade" id="productID{{ $admin->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <form action="{{ route('admin-view.destroy', $admin->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="modal-dialog">
                                                                        @php
                                                                            $admin = \App\Models\Admin::where('id', $admin->id)->first();
                                                                        @endphp
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Default Modal</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>{{ $admin->name }}</p>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">
                                                                                    delete</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                </form>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>

                                        </table>
                                        <br>

                                </div>
                                <div class="col-md-12" id="ajax_pagination_search">
                                    {{ $admins->links() }}
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    عفوا لاتوجد بيانات لعرضها !!
                                </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
