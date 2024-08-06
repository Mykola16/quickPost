@section('title')
    USER
@endsection

<div>
    <div style="display: flex">
        <div>
            <h1 class="profile_page_name" >Ваші оголошення</h1>
        </div>

        <button class="create_btn" >
            <a href="{{route('Create')}}"><p>Створити оголошення</p></a>
        </button>

    </div>

    <div style="display: flex">
        <div class="advertisement_menu_item">
            <a href="#"><p>Активні</p></a>
        </div>

        <div class="advertisement_menu_item">
            <a href="#"><p>Очікующі</p></a>
        </div>

        <div class="advertisement_menu_item">
            <a href="#"><p>Неактивні</p></a>
        </div>
    </div>

    <div class="My_product">

    </div>


</div>


