@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Mã giảm giá</h1>
    <a href="{{ route('coupons.create') }}" class="btn btn-primary">Tạo Mã giảm giá mới</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã</th>
                <th>Số tiền giảm</th>
                <th>Phần trăm giảm</th>
                <th>Giới hạn sử dụng</th>
                <th>Đã sử dụng</th>
                <th>Ngày hết hạn</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->discount_amount }}</td>
                <td>{{ $coupon->discount_percent }}%</td>
                <td>{{ $coupon->usage_limit }}</td>
                <td>{{ $coupon->used_count }}</td>
                <td>{{ $coupon->expires_at ? $coupon->expires_at->format('d/m/Y') : 'Không' }}</td>
                <td>
                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">Chỉnh sửa</a>
                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
