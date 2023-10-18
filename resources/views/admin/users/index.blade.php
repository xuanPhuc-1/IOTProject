<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('users.destroy') }}" method="post">
                @csrf
                <input type="hidden" name="user_delete_id" id = "user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                </div>
                <div class="modal-body">
                    <h5>Bạn có chắc chắn muốn xoá người dùng này không?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ config('apps.user.title') }}</h2>
        </h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active"><strong>Quản lý người dùng</strong></li>
        </ol>
    </div>
</div>
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.user.tableHead') }}</h5>
                <div class="ibox-tools">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên người dùng">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- Thêm nút "Thêm người dùng" -->
                    <a class="btn btn-primary btn-primary" href="{{ route('users.create') }}">Thêm người dùng</a>
                    <!-- Thêm nút "Xoá theo lựa chọn" -->
                    <a class="btn btn-primary btn-danger" href="{{ route('users.destroy') }}">Xoá các mục đã chọn</a>
                </div>

            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox">
                            <th>{{ config('apps.user.Name') }}</th>
                            <th>{{ config('apps.user.Email') }}</th>
                            <th>Avatar</th>
                            <th>Vai trò</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>

                            <div class="col">
                                <td>
                                    <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                                </td>
                                {{-- i want when click on user name, go to route('users.show') with user id --}}
                                <td><a
                                        href="{{ route('users.showLocation', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="{{ $user->photo }}" alt="Avatar" class="avatar">
                                </td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-success"
                                        href="{{ route('users.edit', ['id' => $user->id]) }}">Sửa</a>
                                    <button class="btn btn-primary btn-danger deleteUserBtn" type="button"
                                        value="{{ $user->id }}">
                                        Xoá
                                    </button>
                                </td>
                            </div>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
