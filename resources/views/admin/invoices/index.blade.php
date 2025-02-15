@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Danh sách Hóa đơn</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người đặt</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->user_name }}</td>
                <td>{{ $invoice->user_email }}</td>
                <td>{{ $invoice->user_phone }}</td>
                <td>{{ $invoice->user_address }}</td>
                <td>{{ number_format($invoice->total_price) }} VND</td>
                <td>{{ $invoice->created_at->format('d-m-Y H:i') }}</td>
                <td class="">
                    <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('admin.invoices.print', $invoice->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white"></i> </a>
                    {{-- <a href="{{ route('admin.invoices.print', $invoice->id) }}" class="btn btn-primary btn-sm">In</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $invoices->links() }}
</div>
@endsection
