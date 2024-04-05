@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Продукты') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered text-sadness">
                        <tr>
                            <th>АРТИКУЛ</th>
                            <th>НАЗВАНИЕ</th>
                            <th>СТАТУС</th>
                            <th>АТРИБУТЫ</th>
                            <th><a class="btn btn-success bg-lucky px-4" href="{{ route('products.create') }}">Добавить</a></th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->article }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    @if(is_array($product->properties['color']))
                                        Цвет: {{ implode(', ', $product->properties['color']) }}
                                    @else
                                        Цвет: {{ $product->properties['color'] }}
                                    @endif
                                    <br>
                                    @if(is_array($product->properties['size']))
                                        Размер: {{ implode(', ', $product->properties['size']) }}
                                    @else
                                        Размер: {{ $product->properties['size'] }}
                                    @endif
                                </td>
                                
                                <td>
                                    <a class="btn btn-warning bg-lucky px-3" href="{{ route('products.show', ['id'=>$product->id]) }}">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('products.edit', ['id'=>$product->id]) }}">Edit</a>
                                    <form action="{{ route('products.destroy', ['id'=>$product->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection
