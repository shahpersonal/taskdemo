<select class="form-control" name="city_id" id="city_id" style="width: 223px;">
    @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->ctName}}</option>
    @endforeach
</select>