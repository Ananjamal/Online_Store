<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="pt-3 text-center row">
            <div class="m-auto col-lg-6">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="p-5 mt-3 col-12 col-md-4">
                    <a href="#"><img src="{{ Storage::url($category->image) }}"
                            class="border rounded-circle img-fluid"
                            style="height: 300px; width: 100%; object-fit: fill  ;"></a>
                    <h5 class="mt-3 mb-3 text-center">{{ $category->name }}</h5>
                    <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Go Shop</a></p>
                </div>
            @endforeach

        </div>
    </section>
    <!-- End Categories of The Month -->

</div>
