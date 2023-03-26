@extends('layouts.default')

@section('content')
    <div class="user-account-wrapper">
        <h3>Your Account</h3>

        <div class="account-dropdown-menus">
            <div class="user-menu home-menu">
                <div class="header">
                    <div class="title">
                        1. Home
                    </div>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <div class="menu-main">
                    <h4>Welcome to your account</h4>
                    <div class="details-box">
                        <div class="user-details-grid">
                            <div class="grid-item">
                                <i class="bi bi-at"></i>
                                Your Current email is: {{ $user->email }}
                            </div>
                            <div class="grid-item">
                                <i class="bi bi-x"></i>
                                <p>You are currently not signed up to our newsletter. You can opt in <a
                                        href="#">here.</a></p>
                            </div>
                            <div class="grid-item">
                                <i class="bi bi-house-fill"></i>
                                <div class="address-box">
                                    {{ $user->address_1 }}
                                    {{ $user->address_2 }}
                                    {{ $user->address_postcode}},
                                    {{ $user->country }}
                                    <a href="#">Add Additional Address</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-menu personal-details-menu">
                <div class="header">
                    <div class="title">
                        2. Personal Information
                    </div>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <div class="menu-main">
                    <div class="menu-flex">
                        <form action="/update_user" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{ $user->email }}">
                            </div>
                            <div>
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender">
                                    <option>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="dob">
                            </div>
                            <div>
                                <label for="address1">Address Line 1</label>
                                <input type="text" name="address_1" id="address1" value="{{ $user->address_1 }}">
                            </div>
                            <div>
                                <label for="address2">Address Line 2</label>
                                <input type="text" name="address_2" id="address2" value="{{ $user->address_2 }}">
                            </div>
                            <div>
                                <label for="address_postcode">Postcode</label>
                                <input type="text" name="address_postcode" id="address_postcode"
                                    value="{{ $user->address_postcode }}">
                            </div>
                            <div>
                                <label for="country">Country</label>
                                <select name="country" id="country">
                                    <option value="{{ $user->country }}">{{ $user->country }}</option>
                                    @include('includes.country-select')
                                </select>
                            </div>
                            <div>
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="buttons">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        <div class="need-help-box">
                            <h3>Need help?</h3>
                            <ul>
                                <li>
                                    <i class="bi bi-clock"></i>
                                    <span>Customer service opening hours: 8am-5pm | Mon - Fri</span>
                                </li>
                                <li>
                                    <i class="bi bi-phone"></i>
                                    <span>0000-000-000</span>
                                </li>
                                <li>
                                    <i class="bi bi-at"></i>
                                    <span>customer.service@MyStore.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-menu password-change-menu">
                <div class="header">
                    <div class="title">
                        3. Change Password
                    </div>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <div class="menu-main">
                    <form action="/change_password" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="password">Current Password</label>
                            <div class="input-flex">
                                <input type="password" name="password" id="password">
                                <i class="bi bi-eye" id="password_1_reveal"></i>
                            </div>
                        </div>
                        <div>
                            <label for="password2">New Password</label>
                            <div class="input-flex">
                                <input type="password" name="password_new" id="password2">
                                <i class="bi bi-eye" id="password_2_reveal"></i>
                            </div>
                        </div>
                        <div>
                            <label for="password3">Repeat New Password</label>
                            <div class="input-flex">
                                <input type="password" name="password_new_confirmation" id="password3">
                                <i class="bi bi-eye" id="password_3_reveal"></i>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="user-menu recent-orders-menu">
                <div class="header">
                    <div class="title">
                        4. Your Recent Orders
                    </div>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <div class="menu-main">
                    <table>
                        <thead>
                            <th>Date</th>
                            <th>Order No.</th>
                            <th>Sub Total</th>
                            <th>Delivery</th>
                            <th>Total</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($user->purchases as $purchase)
                                <tr>
                                    <td>
                                        {{date('d/m/Y', strtotime($purchase->created_at))}}
                                    </td>
                                    <td>
                                        0000000
                                    </td>
                                    <td>
                                        £{{number_format($purchase->price, 2, '.', ',')}}
                                    </td>
                                    <td>
                                        $4.99 - Roya Mail 48
                                    </td>
                                    <td>
                                        @php
                                            $total = ($purchase->price + 4.99);
                                        @endphp
                                        £{{number_format($total, 2, '.', ',')}}
                                    </td>
                                    <td>
                                        Completed
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="footer">
                        <a class="btn btn-primary" href="#">View All Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
