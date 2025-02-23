@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Добавить продукт') }}</div>

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

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-6 px-4">
                                <div class="form-group">
                                    Артикул
                                    @if($admin)
                                        <input type="text" name="article" value="{{ $product->article }}" class="form-control">
                                    @else
                                        <input type="text" name="article" value="{{ $product->article }}" class="form-control" readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="col-9 px-4 mt-2">
                                <div class="form-group">
                                    Название
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-4 px-4 mt-2">
                                <div class="form-group">
                                    Статус
                                    <select name="status" selected="{{ $product->status }}" class="form-control">
                                        <option value="available">Доступен</option>
                                        <option value="unavailable">Не доступен</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-9 px-4 mt-2">
                                <div class="form-group">
                                    <table class="border-0" id="attributesTable">
                                        <tr>
                                            <td class="pe-3">Цвет</td>
                                            <td>Размер</td>
                                            <td>
                                                <button type="button" onclick="addAttributeRow()">Добавить атрибут</button>
                                            </td>
                                        </tr>
                                        @foreach ($product->properties['color'] ?? [] as $key => $color)
                                            <tr>
                                                <td class="pe-3">
                                                    <input type="text" name="color[]" class="form-control" value="{{ old('color.'.$key, $color) }}">
                                                </td>
                                                <td>
                                                    <input type="text" name="size[]" class="form-control" value="{{ old('size.'.$key, $product->properties['size'][$key] ?? '') }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                            <!-- ... (existing form fields) ... -->

                            <div class="col-12 px-4 mt-4">
                                <button type="submit" class="btn btn-primary bg-lucky px-5">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function addAttributeRow() {
            var table = document.getElementById('attributesTable');
            var newRow = table.insertRow(table.rows.length - 1); // Insert before the last row (add attribute button row)
    
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
    
            cell1.innerHTML = '<input type="text" name="color[]" class="form-control" value="{{ old('color', '') }}">';
            cell2.innerHTML = '<input type="text" name="size[]" class="form-control" value="{{ old('size', '') }}">';
            cell3.innerHTML = '<button type="button" onclick="removeAttributeRow(this)">Remove</button>';
        }
    
        function removeAttributeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
@endsection
