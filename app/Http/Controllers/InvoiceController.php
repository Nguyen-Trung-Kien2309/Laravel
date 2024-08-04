<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    // Hiển thị danh sách hóa đơn
    public function index()
    {
        $invoices = Order::latest()->paginate(10);

        return view('admin.invoices.index', compact('invoices'));
    }

    // Hiển thị chi tiết hóa đơn
    public function show($id)
    {
        $invoice = Order::with('orderItems')->findOrFail($id);

        return view('admin.invoices.show', compact('invoice'));
    }

    // In hóa đơn dưới dạng PDF
    public function print($id)
    {
        $invoice = Order::with('orderItems')->findOrFail($id);

        $pdf = Pdf::loadView('admin.invoices.pdf', compact('invoice'));

        return $pdf->download('invoice_'.$invoice->id.'.pdf');
    }
}
