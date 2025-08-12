<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="container">
        <div class="mb-3 row">
            <div class="col">
                <div class="card  bg-dashboard-card">
                    <div class="card-body">
                        <div>Produk Terjual</div>
                        <h1 class="fw-bold">{{ number_format($productsSold) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dashboard-card">
                    <div class="card-body">
                        <div>Pendapatan</div>
                        <h1 class="fw-bold">{{ number_format($revenue) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dashboard-card">
                    <div class="card-body">
                        <div>Total Order</div>
                        <h1 class="fw-bold">{{ number_format($ordersCount) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dashboard-card">
                    <div class="card-body">
                        <div>Jumlah Produk</div>
                        <h1 class="fw-bold">{{ number_format($productsCount) }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div># {{ count($recentOrders) }} Order Terbaru</div>

        <div class="card mb-2 overflow-hidden">
            <table class="table m-0">
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Kostumer</th>
                        <th>Pembayaran</th>
                        <th>Total</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @forelse ($recentOrders as $order)
                        <tr>
                            <td>Order #{{ $order->id }}</td>
                            <td>{{ $order->customer }}</td>
                            <td>{{ number_format($order->payment) }}</td>
                            <td>{{ number_format($order->total) }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->formatted_created_at }}</td>
                            <td>
                                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                    class="btn btn-sm btn-success">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada Order</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
