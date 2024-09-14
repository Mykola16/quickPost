@section('title')
    Історія замовлень
@endsection

<div>
    <h1 class="profile_page_name" >Історія замовлень</h1>

    <div style="margin-top: 35px">
        <table>
            <tr>
                <th>Номер замовлення</th>
                <th>Спосіб оплати</th>
                <th>Дата</th>
                <th>Статус</th>
            </tr>
            @foreach($orders as $item)
                <tr>
                    <td>{{ $item->tracking_no }}</td>
                    <td>{{ $item->Method_of_payment }}</td>
                    <td>{{ $item->created_at->format('d.m.y') }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
