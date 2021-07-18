@extends('layouts/main')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Product Name:</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') ? : $product->name }}" required/>
          </div>
          <div class="form-group"> 
              <label for="cases">Product Price :</label>
              <input type="number" class="form-control" name="price" value="{{ old('pirce') ? : $product->price }}" required/>
          </div>
          <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
  </div>
</div>
@endsection