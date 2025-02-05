@extends('layouts.app')

@section('title')
    Order Details
@endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Order Details</h1>
        <img class="banner__img" src="{{ asset('images/banner/banner3.jpg') }}" alt="{{ __('Community Forum') }}">
    </div>
@endsection

@section('content')
    <section class="segment-margin">
        <div class="container">
            <div class="invoice">
                <div class="invoice-print" id="content_invoice">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Appoinment Id-{{ $data->id }} </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Appointment Booking id</strong><br>
                                        Name:- {{ $data->patient->name }}<br>
                                        email:- {{ $data->patient->email }}<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Customer details</strong><br>
                                        Name: {{ $data->patient_name }}<br>
                                        Email: {{ $data->email }}<br>
                                        Phone: {{ $data->phone }} <br>
                                        Age: {{ $data->age }} <br>
                                        Address: {{ $data->address }}<br>
                                        Patient Problem: {{ $data->patient_problem }}<br>
                                        Short Note description: {{ $data->description }}<br>
                                        <br>

                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Payment Details</strong><br>
                                        Payment Method: {{ $data->payment_method }}<br>
                                        Total Cost: &#2547;{{ $data->fee }} <br>
                                        Payment Status: {{ $data->payment_status }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Appointment details:</strong><br>
                                        Date: {{ $data->appointment_date }}<br>
                                        Time:{{ $data->time }}<br>
                                        Category: {{ $data->department }}<br>
                                        Map Link: {{ $data->meeting_link }}<br>

                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Payment Method</div>
                                    <p class="section-lead">The payment method that we provide is to make it easier for you
                                        to pay
                                        invoices.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">

                    </div>
                    <button onclick="printContent()" class="btn btn-warning btn-icon icon-left"><i class="fa fa-print"></i>
                        Print</button>
                </div>
            </div>
        </div>
        <section>
        @endsection

        <script>
            function printContent() {
                // Open a new window with only the content to be printed
                var printWindow = window.open('', '_blank');

                // Get the HTML content to be printed
                var contentToPrint = document.getElementById('content_invoice').outerHTML;

                // Write the content to the new window
                printWindow.document.write(
                    '<html><head><title>Print Content</title><link rel="stylesheet" type="text/css" href="print.css" media="print"></head><body>' +
                    contentToPrint + '</body></html>');

                // Close the document stream
                printWindow.document.close();

                // Trigger the print dialog
                printWindow.print();
            }
        </script>
