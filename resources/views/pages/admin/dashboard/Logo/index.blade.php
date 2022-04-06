@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>الشعارات</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="#">إعدادات الموقع</a></li>
            <li><a href="{{ route('logo.index') }}">الشعارات</a></li>
        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <a class="btn btn-primary mb-2" href="{{
                            route('logo.create') }}"> إنشاء منتج جديد</a>
                        <div class="table-responsive medical-datatable">
                            <table class="display" style="width:100%"
                                id="basic-2">
                                <thead>
                                    <tr>
                                        <th>صورة</th>
                                        <th>صورة1</th>
                                        <th>صورة2</th>
                                        <th>صورة3</th>
                                        <th>صورة4</th>
                                        <th>صورة5</th>
                                        <th>صورة6</th>
                                        <th>صورة7</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach ($logos as $logo)
                                <tr>

                                    <td><img src="{{ asset( $logo->logo1)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo2)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo3)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo4)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo5)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo6)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo7)
                                        }}" style="height:60px;width:60px;">
                                    </td>
                                    <td><img src="{{ asset( $logo->logo8)
                                        }}" style="height:60px;width:60px;">
                                    </td>



                                    <td>
                                        <form action="{{ route('logo.destroy',
                                            $logo->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{
                                                route('logo.edit', $logo->id)
                                                }}">يحرر</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn
                                                btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>        
@endsection
