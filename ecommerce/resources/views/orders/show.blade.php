<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order #{{ $order->id }} Details
            </h2>
            <a href="{{ route('orders.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to My Orders</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 {{ $order->status == 'completed' ? 'border-green-500' : 'border-yellow-500' }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-bold">Status</p>
                        <p class="text-lg font-semibold">{{ strtoupper($order->status) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-bold">Date Placed</p>
                        <p class="text-lg font-semibold">{{ $order->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-bold">Total Amount</p>
                        <p class="text-lg font-bold text-indigo-600">${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Shipping Address</h3>
                <p class="text-gray-700 whitespace-pre-line">{{ $order->address }}</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Items Purchased</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-500 text-sm">
                            <th class="py-2">Product</th>
                            <th class="py-2 text-center">Quantity</th>
                            <th class="py-2 text-right">Unit Price</th>
                            <th class="py-2 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr class="border-b last:border-0">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="w-12 h-12 object-cover rounded mr-4">
                                    <span class="font-medium text-gray-900">{{ $item->product->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-center">{{ $item->quantity }}</td>
                            <td class="py-4 text-right">${{ number_format($item->price, 2) }}</td>
                            <td class="py-4 text-right font-bold">${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>