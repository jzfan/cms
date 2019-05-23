        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Number</th>
                    <th scope="col">
                        <div class="row">
                                <span class="col-4">
                                    food
                                </span>
                                <span class="col-3">
                                    price
                                </span>
                                <span class="col-2">
                                    qty
                                </span>
                                <span class="col-3">
                                    subtotal
                                </span>
                        </div>
                    </th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr data-url='/admin/orders/{{ $order->id }}'>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->number }}</td>
                    <td>
                        @foreach ($order->items as $item)
                        <div class="row">
                                <span class="col-4">
                                    {{ $item['abbr'] }}
                                </span>
                                <span class="col-3">
                                    $ {{ $item['price'] }}
                                </span>
                                <span class="col-2">
                                    {{ $item['qty'] }}
                                </span>
                                <span class="col-3">
                                    $ {{ $item['subtotal'] }}
                                </span>
                                
                        </div>
                        @endforeach
                    </td>
                    <td>$ {{ $order->total }}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>