@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Danh sách khuyến mại</h1>
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary mb-3">Tạo Khuyến mại mới</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giảm giá</th>
                <th>Loại giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
            <tr align="center">

            <td>{{ $promotion->title }}</td>
                    <td>{{ $promotion->description }}</td>
                    <td>
                        {{ $promotion->discount_type == 'percentage' ? number_format($promotion->discount, 0) . '%' : number_format($promotion->discount, 3) . 'VND' }}
                    </td>
                    
                    <td>{{ ucfirst($promotion->discount_type) }}</td>
                    <td>{{ \Carbon\Carbon::parse($promotion->start_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($promotion->end_date)->format('d-m-Y') }}</td>
                    <td>
                        {!! $promotion->isActive() ?  '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>'!!}
                    </td>
                   
                    <td>
                        <a href="{{ route('admin.promotions.show', $promotion) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                        <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
