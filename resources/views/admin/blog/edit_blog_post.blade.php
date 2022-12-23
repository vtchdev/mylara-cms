@include('admin.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('admin.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('admin.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
           <!-- Content -->
           <div class="container-xxl flex-grow-1 container-p-y">


  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">სტატიის დამატება</h5>
          <small class="text-muted float-end">ბლოგი</small>
        </div>
     @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">  </button>
        {{ session()->get('message') }}
        </div>
    @endif

        <div class="card-body">
          <form action="{{ url('edit_blog_post_confirm' , $article->id) }}" method="POST" >
@csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">სტატიის დასახელება</label>
              <input type="text" name="title" class="form-control" id="basic-default-fullname" value="{{ $article->title }}"/>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1" class="form-label">კატეგორია</label>
              <select class="form-select" name="category" id="exampleFormControlSelect1" >

                @foreach ($blog_category as $blog_category)

                <selected-option>{{ $article->category }}</selected-option>
                <option value="{{ $blog_category->name }}">{{ $blog_category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-message">სტატიის აღწერა</label>
                <textarea
                  name="body"
                  id="basic-default-message"
                  class="form-control"

                > {{ $article->body }}</textarea>
              </div>


              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">SEO დასახელება</label>
                <input type="text" name="seoname" class="form-control" id="basic-default-fullname" value="{{ $article->seoname }}" />
              </div>


            <div class="mb-3">
              <label  class="form-label" for="basic-default-message">META აღწერა</label>
              <textarea
                name="metabody"
                id="basic-default-message"
                class="form-control"

              >{{ $article->metabody }}</textarea>
            </div>

            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">სურათის ატვირთვა</label>
              <input class="form-control" name="image"  type="file" id="formFileMultiple" multiple />
            </div>


            <img src="{{ url('articleassets' , $article->image) }}" width="250px" >
            <br><br>

            <button type="submit" class="btn btn-primary">დამატება</button>
          </form>


        </div>
      </div>
    </div>


</div>
<!-- / Content -->

           </div>
          @include('admin.footer')
  </body>
</html>