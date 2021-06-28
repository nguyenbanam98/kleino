@extends('shop.layouts.master')
@section('content')
<div class="account">
    <div class="row">
        <div class="col l-12 m-12 c-12">
            <div class="account__title">
                <h1>
                    Tài khoản của bạn
                </h1>
            </div>
        </div>
    </div>
    <div class="account__content">
        <div class="row">
            <div class="col l-3 m-4 c-12">
                <div class="account__sidebar">
                    <div class="account__sidebar-title">
                        <h3>Tài khoản</h3>
                    </div>
                    <ul class="account__sidebar-list">
                        <li>
                            <a href="/account">
                                Thông tin tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="/dang-xuat">
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col l-9 m-8 c-12">
                <div class="account__info">
                    <div class="title">
                        <h4>Thông tin tài khoản</h4>
                    </div>
                    <div class="account__name">
                        <p>{{ $user->name ?? 'user' }}</p>
                    </div>
                    <div class="account__email">
                        <p>{{ $user->email ?? '' }}</p>
                    </div>
{{--                    <div class="account__address-link">--}}
{{--                        <a href="">Xem địa chỉ</a>--}}
{{--                    </div>--}}
                </div>
                <div class="account__order">
                    <div class="table">
                        <p>Bạn chưa đặt mua sản phẩm nào</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('.collection__heading-sort').on('click', function() {
            $(this).toggleClass('active');
        })
    </script>
@endpush
