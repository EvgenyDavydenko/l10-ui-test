@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                <div class="col-9 px-4 mt-2">
                    <div class="form-group">
                        <table class="border-0" style="border-collapse:separate; border-spacing: 10px;">
                            <tr>
                                <td class="pe-3">Артикул</td>
                                <td>{{ $product->article }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Название</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Статус</td>
                                <td>{{ $product->status }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Аттрибуты</td>
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
                            </tr>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
