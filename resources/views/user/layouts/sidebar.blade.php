<div class="w-1/4 my-4 mx-2 ">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="p-6">
            <p class="mb-4">Category</p>
            @foreach ($categories as $cat)
            <div class="my-2">
                <a href="#">{{$cat->category_name}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>