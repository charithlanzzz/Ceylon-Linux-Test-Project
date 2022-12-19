<tr>
    <td># <input type="hidden" name="products[]" value="{{$product->id}}"></td>
    <td>{{$product->product_name}}</td>
    <td>{{$product->product_code}}</td>
    <td>{{$product->price}}</td>
    <td><input type="text" style="width:70px;" name="qtys[]" onkeyup="calculateTotal($(this).val(), '{{$product->price}}', '{{$product->id}}')" class="form-control"></td>
    <td ></td>
    <td id="tot_{{$product->id}}"></td>
</tr>
