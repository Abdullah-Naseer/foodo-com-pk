@extends('layouts.guest')

@section('title', 'Order Details')

@section('content')
    <main class="content p-0">
        <div class="container">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Meal Plan Overview</h4>
                        <button class="btn btn-danger" id="downloadPdf">Download</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="mb-2"><strong>Meal Plan ID:</strong> {{ $mealPlan->id }}</div>
                            <div class="mb-2"><strong>Customer Name:</strong> {{ $mealPlan->customer->name }}</div>
                            <div class="mb-2"><strong>Company:</strong> {{ $mealPlan->company ?? 'N/A' }}</div>
                            <div><strong>Phone:</strong> {{ $mealPlan->phone }}</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2"><strong>Delivery Address:</strong> {{ $mealPlan->delivery_address }}</div>
                            <div class="mb-2"><strong>Number of Persons:</strong> {{ $mealPlan->persons }}</div>
                            <div class="mb-2"><strong>Start Date:</strong> {{ $mealPlan->start_date }}</div>
                            <div>
                                <strong>Status:</strong>
                                <span class="badge bg-{{ $mealPlan->status == 'completed' ? 'success' : 'primary' }}">
                                    {{ ucfirst($mealPlan->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meal Plan Menu Details -->
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Meal Plan Menu Details</h5>
                </div>
                <div class="card-body">
                    @if ($mealPlan->menuItems->isEmpty())
                        <div class="text-center">
                            No menu items available for this meal plan.
                        </div>
                    @else
                        <div class="table-responsive">
                            @php
                                $groupedMenuItems = $mealPlan->menuItems->groupBy('week');
                            @endphp

                            @foreach ($groupedMenuItems as $week => $items)
                                <h6 class="text-primary mb-3">Week {{ $week }}</h6>
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Day</th>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $menuItem)
                                            <tr>
                                                <td>{{ ucfirst($menuItem->day) }}</td>
                                                <td>{{ $menuItem->menu->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

    <script>
        document.getElementById('downloadPdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();
            let yOffset = 15;

            doc.setFontSize(16);
            doc.setFont("helvetica", "bold");
            let title = "Order Details";
            let titleWidth = doc.getTextWidth(title);
            let pageWidth = doc.internal.pageSize.width;
            doc.text(title, (pageWidth - titleWidth) / 2, yOffset);

            doc.setFont("helvetica", "normal");
            yOffset += 10;

            let menuItems = @json($mealPlan->menuItems->groupBy('week'));

            Object.keys(menuItems).forEach(week => {
                yOffset += 10;
                doc.setFontSize(14);
                doc.text(`Week ${week}`, 10, yOffset);

                let tableData = menuItems[week].map(item => [
                    item.day.charAt(0).toUpperCase() + item.day.slice(1),
                    item.menu.name
                ]);

                doc.autoTable({
                    startY: yOffset + 5,
                    head: [
                        ["Day", "Menu"]
                    ],
                    body: tableData,
                    theme: 'grid',
                    headStyles: {
                        fillColor: [220, 53, 69],
                        textColor: 255,
                        fontStyle: 'bold'
                    },
                    margin: {
                        top: 10
                    }
                });

                yOffset = doc.lastAutoTable.finalY + 10;
            });

            let randomNum = Math.floor(1000 + Math.random() * 9000);

            doc.save(`order_details_${randomNum}.pdf`);
        });
    </script>
@endpush
